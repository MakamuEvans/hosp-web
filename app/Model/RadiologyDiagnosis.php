<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RadiologyDiagnosis extends Model
{
    use SoftDeletes;

    protected $fillable = ['check_in_id', 'test_id', 'technician_id', 'remarks'];

    //appends
    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }

    protected $appends = ['formatted_date'];

    public function test(){
        return $this->belongsTo('App\Model\RadiologyTest', 'test_id');
    }

    public function technician(){
        return $this->belongsTo('App\User', 'technician_id');
    }
}
