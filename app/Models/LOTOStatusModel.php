<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOTOStatusModel extends Model
{
    use HasFactory;
    protected $table = 'loto_status';

    static public function getRecord()
    {
        return self::select('loto_status.*', 'users.name as created_by_name', 'status_color.name as status_color_name', 'status_color.code as status_color_code')
                ->join('status_color', 'status_color.id', '=', 'loto_status.status_color_id')
                ->join('users', 'users.id', '=', 'loto_status.created_by')
                ->join('permit', 'permit.status', '=', 'loto_status.id')
                ->where('loto_status.is_delete', '=', 0)
                ->orderBy('loto_status.id', 'asc')
                ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getLOTOStatus($id)
    {
        return $this->belongsToMany(PermitModel::class, 'permit')
                    ->where('permit.status', '=', $id)
                    ->get();
    }
}
