<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TagColorModel;
use App\Models\StatusColorModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['getRecordTagColor'] = TagColorModel::getRecord();
        $data['getRecordStatusColor'] = StatusColorModel::getRecord();
        $data['header_title'] = 'Color';
        return view('admin.color.list', $data);
    }

    // For Tag Color
    public function add_tagcolor()
    {
        $data['header_title'] = 'Add New Tag Color';
        return view('admin.color.tagcolor.add', $data);
    }

    public function insert_tagcolor(Request $request)
    {
        $tagcolor = new TagColorModel;
        $tagcolor->name = trim($request->name);
        $tagcolor->code = trim($request->code);
        $tagcolor->status = trim($request->status);
        $tagcolor->created_by = Auth::user()->id;
        $tagcolor->save();

        return redirect('admin/color/list')->with('success', "Tag Color Successfully Created");
    }

    public function edit_tagcolor($id)
    {
        $data['getRecordTagColor'] = TagColorModel::getSingle($id);
        $data['header_title'] = 'Edit Tag Color';
        return view('admin.color.tagcolor.edit', $data);
    }

    public function update_tagcolor($id, Request $request)
    {
        $tagcolor = TagColorModel::getSingle($id);
        $tagcolor->name = trim($request->name);
        $tagcolor->code = trim($request->code);
        $tagcolor->status = trim($request->status);
        $tagcolor->created_by = Auth::user()->id;
        $tagcolor->save();

        return redirect('admin/color/list')->with('success', "Tag Color Successfully Updated");
    }

    public function delete_tagcolor($id)
    {
        $tagcolor = TagColorModel::getSingle($id);
        $tagcolor->is_delete = 1;
        $tagcolor->save();

        return redirect()->back()->with('success', "Tag Color Successfully Deleted");
    }

    // For Status Color
    public function add_statuscolor()
    {
        $data['header_title'] = 'Add New Status Color';
        return view('admin.color.statuscolor.add', $data);
    }

    public function insert_statuscolor(Request $request)
    {
        $tagcolor = new StatusColorModel;
        $tagcolor->name = trim($request->name);
        $tagcolor->code = trim($request->code);
        $tagcolor->status = trim($request->status);
        $tagcolor->created_by = Auth::user()->id;
        $tagcolor->save();

        return redirect('admin/color/list')->with('success', "Status Color Successfully Created");
    }

    public function edit_statuscolor($id)
    {
        $data['getRecordStatusColor'] = StatusColorModel::getSingle($id);
        $data['header_title'] = 'Edit Status Color';
        return view('admin.color.statuscolor.edit', $data);
    }

    public function update_statuscolor($id, Request $request)
    {
        $tagcolor = StatusColorModel::getSingle($id);
        $tagcolor->name = trim($request->name);
        $tagcolor->code = trim($request->code);
        $tagcolor->status = trim($request->status);
        $tagcolor->created_by = Auth::user()->id;
        $tagcolor->save();

        return redirect('admin/color/list')->with('success', "Status Color Successfully Updated");
    }

    public function delete_statuscolor($id)
    {
        $tagcolor = StatusColorModel::getSingle($id);
        $tagcolor->is_delete = 1;
        $tagcolor->save();

        return redirect()->back()->with('success', "Status Color Successfully Deleted");
    }
}
