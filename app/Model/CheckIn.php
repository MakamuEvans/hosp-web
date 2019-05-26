<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckIn extends Model
{
    use SoftDeletes;

    protected $fillable = ['client_id', 'receptionist_id', 'weight', 'temperature', 'remarks', 'progress'];

    protected $casts = [
        'progress'=>'boolean'
    ];

    //appends
    public function getDecodedProgressAttribute(){
        return $this->progress ? 'Completed': 'In Progress';
    }
    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }

    protected $appends = ['decoded_progress', 'formatted_date'];

    //relations
    public function client(){
        return $this->belongsTo('App\Model\Client', 'client_id');
    }

    public function receptionist(){
        return $this->belongsTo('App\Model\User', 'receptionist_id');
    }

    public function doctor_diagnosis(){
        return $this->belongsTo('App\Model\DoctorDiagnosis', 'id', 'check_in_id');
    }

    public function lab_diagnosis(){
        return $this->hasMany('App\Model\LabDiagnosis', 'check_in_id');
    }

    public function radiology_diagnosis(){
        return $this->hasMany('App\Model\RadiologyDiagnosis', 'check_in_id');
    }

    public function medication(){
        return $this->hasMany('App\Model\Medication', 'check_in_id');
    }

}
