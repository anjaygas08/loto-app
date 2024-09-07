<?php

namespace App\Models;

use App\Models\PermitModel;
use App\Models\CategoryModel;
use App\Models\TagColorModel;
use App\Models\SubCategoryModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubListModel extends Model
{
    use HasFactory;

    protected $table = 'permit_sublist';

    static public function DeleteRecord($permit_id)
    {
        self::where('permit_id','=',$permit_id)->delete();
    }
    static public function UpdateRecord($permit_id)
    {
        self::where('permit_id','=',$permit_id)->update();
    }
    static public function DeleteChecklist($checklist_status)
    {
        self::where('checklist_status','=',$checklist_status)->delete();
    }
    static public function DeleteTagColor($tag_color)
    {
        self::where('tag_color','=',$tag_color)->delete();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getTagColor($id)
    {
        return $this->hasMany(TagColorModel::class, "id")
                    ->where('tag_color', '=', $id)
                    ->get();
    }

    public function getSubCategory($id)
    {
        return $this->hasMany(SubCategoryModel::class, "id")
                    ->where('sub_category_id', '=', $id)
                    ->get();
    }

    public function getPermit()
    {
        return $this->belongsTo(PermitModel::class, 'id');
    }
    public function getCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'id');
    }
}
