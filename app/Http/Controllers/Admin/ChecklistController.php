<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChecklistModel;
use App\Models\StatusColorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ChecklistModel::getRecord();
        $data['header_title'] = 'Checklist';
        return view('admin.checklist.list', $data);
    }

    public function add()
    {
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['header_title'] = 'Add New Checklist Status';
        return view('admin.checklist.add', $data);
    }

    public function insert(Request $request)
    {
        $checklist = new ChecklistModel;
        $checklist->name = trim($request->name);
        $checklist->code = trim($request->code);
        $checklist->status = trim($request->status);
        $checklist->created_by = Auth::user()->id;
        $checklist->save();

        return redirect('admin/checklist/list')->with('success', "Checklist Status Successfully Created");
    }

    public function edit($id)
    {
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['getRecord'] = ChecklistModel::getSingle($id);
        $data['header_title'] = 'Edit Checklist Status';
        return view('admin.checklist.edit', $data);
    }

    public function update($id, Request $request)
    {
        $checklist = ChecklistModel::getSingle($id);
        $checklist->status_color_id = trim($request->status_color_id);
        $checklist->name = trim($request->name);
        $checklist->status = trim($request->status);
        $checklist->created_by = Auth::user()->id;
        $checklist->save();

        return redirect('admin/checklist/list')->with('success', "Checklist Status Successfully Updated");
    }

    public function delete($id)
    {
        $checklist = ChecklistModel::getSingle($id);
        $checklist->is_delete = 1;
        $checklist->save();

        return redirect()->back()->with('success', "Checklist Status Successfully Deleted");
    }
}
