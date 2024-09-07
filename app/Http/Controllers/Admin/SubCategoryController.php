<?php

namespace App\Http\Controllers\Admin;

use App\Models\PermitModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\StatusColorModel;
use App\Models\SubCategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = 'Sub Category';
        return view('admin.subcategory.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['header_title'] = 'Add New Sub Category';
        return view('admin.subcategory.add', $data);
    }

    public function insert(Request $request)
    {
        $subcategory = new SubCategoryModel;
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->status_color_id = trim($request->status_color_id);
        $subcategory->status = trim($request->status);
        $subcategory->created_by = Auth::user()->id;
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub Category Successfully Created");
    }

    public function edit($id)
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['getRecord'] = SubCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.subcategory.edit', $data);
    }

    public function update($id, Request $request)
    {
        $subcategory = SubCategoryModel::getSingle($id);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->status_color_id = trim($request->status_color_id);
        $subcategory->status = trim($request->status);
        $subcategory->created_by = Auth::user()->id;
        $subcategory->save();

        return redirect('admin/sub_category/list')->with('success', "Sub Category Successfully Updated");
    }

    public function delete($id)
    {
        $subcategory = SubCategoryModel::getSingle($id);
        $subcategory->is_delete = 1;
        $subcategory->save();

        return redirect()->back()->with('success', "Sub Category Successfully Deleted");
    }

    public function get_sub_category(Request $request)
    {
        $category_id = $request->category_id;
        $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
        $output = '';
        // $output .= '<option value="">Select Status</option>';
        foreach ($get_sub_category as $value)
        {
            $output .= '<option class="text-white" style="background-color:'.$value->status_color_name.';" value="'.$value->id.'">'.$value->name.'</option>';
        }
        $json['output'] = $output;
        // return response()->json($output);
        return $output;
    }

    public function get_edit_sub_category(Request $request)
    {
        $category_id = $request->id;
        $get_sub_category = SubCategoryModel::getRecordSubCategory($category_id);
        $html = '';
        $html .= '<option value="">Select Status</option>';
        foreach ($get_sub_category as $value)
        {
            $html .= '<option class="text-white" selected value="'.$value->id.'" style="background-color:'.$value->status_color_name.';">'.$value->name.'</option>';
        }
        $json['html'] = $html;
        echo json_encode($json);
    }
}
