<?php

namespace App\Http\Controllers\Admin;

use App\Models\PermitModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $data['getRecord'] = PermitModel::getRecord();
        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }

    public function user_dashboard(Request $request)
    {
        $data['getRecord'] = new PermitModel;
        if($request->get('search'))
        {
            $data['getRecord'] = $data['getRecord']
                // ->where('wo_number','LIKE','%'.$request->get('search').'%')
                // ->orWhere('tag_number','LIKE','%'.$request->get('search').'%')
                ->orWhere('created_by','LIKE','%'.$request->get('search').'%')
                // ->orWhere('description','LIKE','%'.$request->get('search').'%')
                // ->orWhere('lokasi','LIKE','%'.$request->get('search').'%')
                ->orWhere('status','LIKE','%'.$request->get('search').'%');
                // ->orWhere('name','LIKE','%'.$request->get('search').'%');
        }
        $data['getRecord'] = $data['getRecord']->get();

        $data['header_title'] = "Dashboard";
        return view('user.dashboard', $data);
    }
}
