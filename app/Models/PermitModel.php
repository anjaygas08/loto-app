<?php

namespace App\Models;

use App\Models\LOTOStatusModel;
use App\Models\SubListModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class PermitModel extends Model
{
    use HasFactory;

    protected $table = 'permit';

    static public function getRecord()
    {
        return self::select('permit.*')
                ->where('permit.is_delete', '=', 0)
                ->orderBy('permit.id', 'desc')
                ->paginate(10);
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])
    //             ->translatedFormat('d-m-Y');
    // }

    public function getStatusStyleAttribute()
    {
        if($this->status == 1){
            return 'warning';
        }
        if($this->status == 2){
            return 'danger';
        }
        if($this->status == 3){
            return 'primary';
        }
        if($this->status == 4){
            return 'success';
        }

        if($this->op_sign == 0){
            return 'warning';
        }
        if($this->op_sign == 1){
            return 'success';
        }

        if($this->safety_sign == 0){
            return 'warning';
        }
        if($this->safety_sign == 1){
            return 'success';
        }
    }

    public function getOpStatusStyleAttribute()
    {
        if($this->op_sign == 0){
            return 'warning';
        }
        if($this->op_sign == 1){
            return 'success';
        }
    }

    public function getSafetyStatusStyleAttribute()
    {
        if($this->safety_sign == 0){
            return 'warning';
        }
        if($this->safety_sign == 1){
            return 'success';
        }
    }

    public function getSubList()
    {
        return $this->hasMany(SubListModel::class, "permit_id");
    }

    public function getLOTOStatus($id)
    {
        return $this->hasMany(LOTOStatusModel::class, 'id')
                    ->where('status', '=', $id)
                    ->get();

    }
}
