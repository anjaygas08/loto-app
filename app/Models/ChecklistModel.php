<?php

namespace App\Models;

use App\Models\StatusColorModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChecklistModel extends Model
{
    use HasFactory;
    protected $table = 'checklist';

    static public function getRecord()
    {
        return self::select('checklist.*', 'users.name as created_by_name')
                ->join('users', 'users.id', '=', 'checklist.created_by')
                ->where('checklist.is_delete', '=', 0)
                ->orderBy('checklist.id', 'asc')
                ->get();
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    public function getStatusColor()
    {
        return $this->belongsTo(StatusColorModel::class, 'id');
    }
}
