<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\LOTOStatusModel;
use App\Models\StatusColorModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LOTOStatusController extends Controller
{
    public function list()
    {
        $data['getRecord'] = LOTOStatusModel::getRecord();
        $data['header_title'] = 'LOTO Status';
        return view('admin.loto-status.list', $data);
    }

    public function add()
    {
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['header_title'] = 'Add New LOTO Status';
        return view('admin.loto-status.add', $data);
    }

    public function insert(Request $request)
    {
        $lotostatus = new LOTOStatusModel;
        $lotostatus->status_color_id = trim($request->status_color_id);
        $lotostatus->name = trim($request->name);
        $lotostatus->status = trim($request->status);
        $lotostatus->created_by = Auth::user()->id;
        $lotostatus->save();

        return redirect('admin/loto_status/list')->with('success', "LOTO Status Successfully Created");
    }

    public function edit($id)
    {
        $data['getStatusColor'] = StatusColorModel::getRecord();
        $data['getRecord'] = LOTOStatusModel::getSingle($id);
        $data['header_title'] = 'Edit LOTO Status';
        return view('admin.loto-status.edit', $data);
    }

    public function update($id, Request $request)
    {
        $lotostatus = LOTOStatusModel::getSingle($id);
        $lotostatus->status_color_id = trim($request->status_color_id);
        $lotostatus->name = trim($request->name);
        $lotostatus->status = trim($request->status);
        $lotostatus->created_by = Auth::user()->id;
        $lotostatus->save();

        return redirect('admin/loto_status/list')->with('success', "LOTO Status Successfully Updated");
    }

    public function delete($id)
    {
        $lotostatus = LOTOStatusModel::getSingle($id);
        $lotostatus->is_delete = 1;
        $lotostatus->save();

        return redirect()->back()->with('success', "LOTO Status Successfully Deleted");
    }
}
