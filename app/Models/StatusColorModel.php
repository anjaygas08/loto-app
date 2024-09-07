<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class StatusColorModel extends Model
{
    use HasFactory;
    protected $table = 'status_color';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('status_color.*', 'users.name as created_by_name', 'status_color.code as status_color_code')
                ->join('users', 'users.id', '=', 'status_color.created_by')
                ->where('status_color.is_delete', '=', 0)
                ->orderBy('status_color.id', 'desc')
                ->get();
    }

    public function getChecklist()
    {
        return $this->hasMany(ChecklistModel::class, "status_color_id");
    }
}
