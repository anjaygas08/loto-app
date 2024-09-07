<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\PermitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getRecord();
        $data['header_title'] = 'Category';
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Category';
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $category = new CategoryModel;
        $category->name = trim($request->name);
        $category->status = trim($request->status);
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category/list')->with('success', "Category Successfully Created");
    }

    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Category';
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $user = CategoryModel::getSingle($id);
        $user->name = trim($request->name);
        $user->status = trim($request->status);
        $user->save();

        return redirect('admin/category/list')->with('success', "Category Successfully Updated");
    }

    public function delete($id)
    {
        $category = CategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();

        return redirect()->back()->with('success', "Category Successfully Deleted");
    }
}
