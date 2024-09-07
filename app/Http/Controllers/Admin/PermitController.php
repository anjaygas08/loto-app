<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\ChecklistModel;
use App\Models\LOTOStatusModel;
use App\Models\PermitModel;
use App\Models\SubCategoryModel;
use App\Models\SubListModel;
use App\Models\TagColorModel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class PermitController extends Controller
{
    public function list()
    {
        $data['getRecord'] = PermitModel::getRecord();
        $data['header_title'] = 'LOTO List';
        return view('admin.loto-permit.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Form Pengajuan LOTO';
        $id = UniqueIdGenerator::generate(['table' => 'permit', 'length' => 4]);
        $newId = date('ym').'/'.Auth::user()->name.'/'.'TAG-'.$id;

        return view('admin.loto-permit.add', $data, compact('id', 'newId'));
    }

    public function insert(Request $request)
    {
        request()->validate([
            'tag_number' => 'required|unique:permit'
        ]);

        $permit = new PermitModel;
        $permit->tag_number = trim($request->tag_number);
        $permit->wo_number = trim($request->wo_number);
        $permit->name = trim($request->name);
        $permit->description = trim($request->description);
        $permit->lokasi = trim($request->lokasi);
        $permit->created_by = trim($request->created_by);
        $permit->created_at = trim($request->created_at);
        $permit->catatan = trim($request->catatan);
        $permit->save();

        return redirect('admin/loto-permit/list')->with('success', "Form LOTO successfully created. Please wait for Operator & K3 Sign.");
    }

    public function list_permit(Request $request)
    {
        // $data['getRecord'] = PermitModel::getRecord();
        $data['getRecord'] = new PermitModel;
        if($request->get('search'))
        {
            $data['getRecord'] = $data['getRecord']
                ->where('wo_number','LIKE','%'.$request->get('search').'%')
                ->orWhere('tag_number','LIKE','%'.$request->get('search').'%')
                ->orWhere('created_by','LIKE','%'.$request->get('search').'%')
                ->orWhere('description','LIKE','%'.$request->get('search').'%')
                ->orWhere('lokasi','LIKE','%'.$request->get('search').'%')
                ->orWhere('status','LIKE','%'.$request->get('search').'%')
                ->orWhere('name','LIKE','%'.$request->get('search').'%');
        }
        $data['getRecord'] = $data['getRecord']->get();
        $data['header_title'] = 'LOTO List';
        return view('user.loto-permit.list', $data);
    }

    public function add_permit()
    {
        $data['header_title'] = 'Form Pengajuan LOTO';
        $id = UniqueIdGenerator::generate(['table' => 'permit', 'length' => 4]);
        $newId = date('ym').'/'.Auth::user()->name.'/'.'TAG-'.$id;

        return view('user.loto-permit.new', $data, compact('id', 'newId'));
    }

    public function new_permit(Request $request)
    {
        request()->validate([
            'tag_number' => 'required|unique:permit'
        ]);

        $permit = new PermitModel;
        $permit->tag_number = trim($request->tag_number);
        $permit->created_by = trim($request->created_by);
        $permit->is_delete = 1;
        $permit->save();

        return redirect('user/loto-permit/add/'.$permit->id);
    }

    public function insert_permit($permit_id)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $data['permit'] = $permit;
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($permit->category_id);
            $data['getTagColor'] = TagColorModel::getRecord();
            $data['header_title'] = 'Form LOTO';
            return view('user.loto-permit.add', $data);
        }
    }

    public function submit_permit($permit_id, Request $request)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $permit->tag_number = trim($request->tag_number);
            $permit->created_by = trim($request->created_by);
            $permit->wo_number = trim($request->wo_number);
            $permit->name = trim($request->name);
            $permit->description = trim($request->description);
            $permit->lokasi = trim($request->lokasi);
            $permit->created_at = trim($request->created_at);
            $permit->catatan = trim($request->catatan);
            $permit->is_delete = 0;
            $permit->status = 1;
            $permit->save();

            $tag_number = DB::table('permit')->orderBy('tag_number', 'desc')->select('tag_number')->first();
            $tag_number = $permit->tag_number;
            SubListModel::getSingle($permit_id);

            if(!empty($request->sublist))
            {
                foreach($request->sublist as $sublist)
                {
                    if(!empty($sublist['peralatan']))
                    {
                        $saveSublist = new SubListModel;
                        $saveSublist->permit_id = $permit_id;
                        $saveSublist->tag_number = $tag_number;
                        $saveSublist->peralatan = $sublist['peralatan'];
                        $saveSublist->no_peralatan = !empty($sublist['no_peralatan']) ? $sublist['no_peralatan'] : '';
                        $saveSublist->category_id = $sublist['category_id'];
                        $saveSublist->sub_category_id = $sublist['sub_category_id'];
                        $saveSublist->tag_color = $sublist['tag_color'];
                        $saveSublist->checklist_status = 3;
                        $saveSublist->save();
                    }
                }
            }
            return redirect('user/loto-permit/list')->with('success', "LOTO Permit successfully created, Remind Operator & K3L for Sign");
        }
        else
        {
            abort(404);
        }
    }

    public function request_release($permit_id)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $data['permit'] = $permit;
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($permit->category_id);
            $data['getTagColor'] = TagColorModel::getRecord();
            $data['header_title'] = 'Form LOTO';

            return view('user.loto-permit.edit', $data);
        }
    }

    public function submit_release($permit_id, Request $request)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $permit->updated_at = trim($request->updated_at);
            $permit->status = 3;
            $permit->op_sign = 0;
            $permit->safety_sign = 0;
            $permit->save();

            SubListModel::DeleteRecord($permit->id);
            if(!empty($request->sublist))
            {
                foreach($request->sublist as $sublist)
                {
                    if(!empty($sublist['peralatan']))
                    {
                        $saveSublist = new SubListModel;
                        $saveSublist->peralatan = $sublist['peralatan'];
                        $saveSublist->no_peralatan = $sublist['no_peralatan'];
                        $saveSublist->category_id = $sublist['category_id'];
                        $saveSublist->sub_category_id = $sublist['sub_category_id'];
                        $saveSublist->tag_color = $sublist['tag_color'];
                        $saveSublist->tag_number = $permit->tag_number;
                        $saveSublist->permit_id = $permit->id;
                        $saveSublist->checklist_status = 4;
                        $saveSublist->save();
                    }
                }
            }
            return redirect('user/loto-permit/list')->with('success', "LOTO ready to Release, Remind Operator & K3L for Release");
        }
        else
        {
            abort(404);
        }
    }

    public function view_form($permit_id)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $data['permit'] = $permit;
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($permit->category_id);
            $data['getLOTOStatus'] = LOTOStatusModel::getSingle($permit->status);
            $data['getTagColor'] = TagColorModel::getRecord();
            $data['getChecklistStatus'] = ChecklistModel::getRecord();
            $data['header_title'] = 'Formulir Tagging';

        if(!is_null($permit))
        {
            // $data['permit'] = DB::table('permit')->get();
            $data['permitJoin'] = PermitModel::getSingle($permit_id)
                ->join('permit_sublist', 'permit.id', '=', 'permit_sublist.permit_id')
                ->join('category', 'category.id', '=', 'permit_sublist.category_id')
                ->join('sub_category', 'sub_category.id', '=', 'permit_sublist.sub_category_id')
                ->join('status_color', 'status_color.id', '=', 'sub_category.status_color_id')
                ->join('tag_color', 'tag_color.id', '=', 'permit_sublist.tag_color')
                ->join('checklist', 'checklist.id', '=', 'permit_sublist.checklist_status')
                ->select(
                    'permit.*',
                    'permit_sublist.*',
                    'sub_category.*',
                    'tag_color.*',
                    'checklist.*',
                    'category.name as category_name',
                    'tag_color.name as tag_color_name',
                    'tag_color.code as tag_color_code',
                    'checklist.name as checklist_name',
                    'checklist.code as checklist_code',
                    'sub_category.name as sub_category_name',
                    'permit_sublist.id as permit_sublist_id',
                    'status_color.code as status_color_code')
                ->where('permit_id', '=', $permit_id)
                ->get();
        }

            return view('user.loto-permit.view', $data);
        }
    }

    public function tag_sheet($permit_id)
    {
        $permit = PermitModel::getSingle($permit_id);
        if(!empty($permit))
        {
            $data['permit'] = $permit;
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($permit->category_id);
            $data['getLOTOStatus'] = LOTOStatusModel::getSingle($permit_id);
            $data['getTagColor'] = TagColorModel::getRecord();
            $data['getChecklistStatus'] = ChecklistModel::getRecord();
            $data['header_title'] = 'Formulir Tagging';

        if(!is_null($permit))
        {
            // $data['permit'] = DB::table('permit')->get();
            $data['permitJoin'] = PermitModel::getSingle($permit_id)
                ->join('permit_sublist', 'permit.id', '=', 'permit_sublist.permit_id')
                ->join('category', 'category.id', '=', 'permit_sublist.category_id')
                ->join('sub_category', 'sub_category.id', '=', 'permit_sublist.sub_category_id')
                ->join('status_color', 'status_color.id', '=', 'sub_category.status_color_id')
                ->join('tag_color', 'tag_color.id', '=', 'permit_sublist.tag_color')
                ->join('checklist', 'checklist.id', '=', 'permit_sublist.checklist_status')
                ->select(
                    'permit.*',
                    'permit_sublist.*',
                    'sub_category.*',
                    'tag_color.*',
                    'checklist.*',
                    'category.name as category_name',
                    'tag_color.name as tag_color_name',
                    'tag_color.code as tag_color_code',
                    'checklist.name as checklist_name',
                    'checklist.code as checklist_code',
                    'sub_category.name as sub_category_name',
                    'permit_sublist.id as permit_sublist_id',
                    'status_color.code as status_color_code')
                ->where('permit_id', '=', $permit_id)
                ->get();
        }
            return view('user.loto-permit.tag_sheet', $data);
        }
    }

    public function op_sign(Request $request, $id)
    {
        $permit = PermitModel::getSingle($id);
        // $permit = PermitModel::with('getSubList')->find($id);
        if(!empty($permit))
        {
            $permit->op_sign = 1;
            if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
            {
                $permit->status = 2;
            }
            else
            {
                $permit->status = 1;
            }
            $permit->save();
        }

        SubListModel::with('getPermit')->where('permit_id', '=', $id)->update([
            "checklist_status" => 1
        ]);

        return redirect()->back()->with('success', "Form has been signed");
    }

    public function op_sign_release(Request $request, $id)
    {
        $permit = PermitModel::getSingle($id);
        if(!empty($permit))
        {
            $permit->op_sign = 1;
            if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
            {
                $permit->status = 4;
            }
            else
            {
                $permit->status = 3;
            }
            $permit->save();
        }

        SubListModel::with('getPermit')->where('permit_id', '=', $id)->update([
            "checklist_status" => 2,
            "tag_color" => 4
        ]);

        return redirect()->back()->with('success', "LOTO has been RELEASED by Operator");
    }

    public function op_unsign($id)
    {
        $permit = PermitModel::getSingle($id);
        $permit->op_sign = 0;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 2;
        }
        else
        {
            $permit->status = 1;
        }
        $permit->save();

        SubListModel::with('getPermit')->where('permit_id', '=', $id)->update([
            "checklist_status" => 3
        ]);

        return redirect()->back()->with('success', "Form has been unsigned");
    }
    public function op_unsign_release($id)
    {
        $permit = PermitModel::getSingle($id);
        $permit->op_sign = 0;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 4;
        }
        else
        {
            $permit->status = 3;
        }
        $permit->save();

        SubListModel::with('getPermit')->where('permit_id', '=', $id)->update([
            "checklist_status" => 4,
            "tag_color" => 3
        ]);

        return redirect()->back()->with('success', "LOTO cancel for Release");
    }

    public function safety_sign($id, Request $request)
    {
        $permit = PermitModel::getSingle($id);
        $permit->safety_sign = 1;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 2;
        }
        else
        {
            $permit->status = 1;
        }
        $permit->save();

        return redirect()->back()->with('success', "Form has been signed");
    }

    public function safety_sign_release($id, Request $request)
    {
        $permit = PermitModel::getSingle($id);
        $permit->safety_sign = 1;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 4;
        }
        else
        {
            $permit->status = 3;
        }
        $permit->save();

        return redirect()->back()->with('success', "LOTO has been RELEASED by K3L");
    }

    public function safety_unsign($id, Request $request)
    {
        $permit = PermitModel::getSingle($id);
        $permit->safety_sign = 0;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 2;
        }
        else
        {
            $permit->status = 1;
        }
        $permit->save();

        return redirect()->back()->with('success', "Form has been unsigned");
    }
    public function safety_unsign_release($id, Request $request)
    {
        $permit = PermitModel::getSingle($id);
        $permit->safety_sign = 0;
        if(!empty($permit->op_sign == 1 && $permit->safety_sign == 1))
        {
            $permit->status = 4;
        }
        else
        {
            $permit->status = 3;
        }
        $permit->save();

        return redirect()->back()->with('success', "LOTO cancel for Release");
    }

    // public function view_form_sublist($permit_id)
    // {

    // }
}
