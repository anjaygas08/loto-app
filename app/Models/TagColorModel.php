<?php

namespace App\Models;

use App\Models\SubListModel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TagColorModel extends Model
{
    use HasFactory;
    protected $table = 'tag_color';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('tag_color.*', 'users.name as created_by_name')
                ->join('users', 'users.id', '=', 'tag_color.created_by')
                ->where('tag_color.is_delete', '=', 0)
                ->orderBy('tag_color.id', 'asc')
                ->get();
    }

    public function getSubList()
    {
        return $this->belongsTo(SubListModel::class, 'id');
    }
}
