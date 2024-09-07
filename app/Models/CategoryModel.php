<?php

namespace App\Models;

use App\Models\SubCategoryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';

    static public function getRecord()
    {
        return self::select('category.*', 'users.name as created_by_name')
                ->join('users', 'users.id', '=', 'category.created_by')
                ->where('category.is_delete', '=', 0)
                ->orderBy('category.id', 'asc')
                ->paginate(5);
    }

    static public function getRecordActive()
    {
        return self::select('category.*', 'category.name as category_name')
                ->join('users', 'users.id', '=', 'category.created_by')
                ->where('category.is_delete', '=', 0)
                ->where('category.status', '=', 0)
                ->orderBy('category.name', 'asc')
                ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getSubCategory()
    {
        return $this->hasMany(SubCategoryModel::class, "category_id", 'id');
    }
}
