<?php

namespace App\Models;

use App\Models\SubListModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    use HasFactory;
    protected $table = 'sub_category';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('sub_category.*', 'users.name as created_by_name', 'category.name as category_name', 'status_color.code as status_color_code')
                ->join('category', 'category.id', '=', 'sub_category.category_id')
                ->join('users', 'users.id', '=', 'sub_category.created_by')
                ->join('status_color', 'status_color.id', '=', 'sub_category.status_color_id')
                ->where('sub_category.is_delete', '=', 0)
                ->orderBy('sub_category.id', 'asc')
                ->get();
    }

    static public function getRecordSubCategory($category_id)
    {
        return self::select('sub_category.*', 'status_color.name as status_color_name')
                ->join('users', 'users.id', '=', 'sub_category.created_by')
                ->join('status_color', 'status_color.id', '=', 'sub_category.status_color_id')
                ->where('sub_category.is_delete', '=', 0)
                ->where('sub_category.status', '=', 0)
                ->where('sub_category.category_id', '=', $category_id)
                ->orderBy('sub_category.id', 'asc')
                ->get();
    }

    public function getSubList()
    {
        return $this->belongsTo(SubListModel::class, "id");
    }
}
