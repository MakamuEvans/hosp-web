<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorDiagnosis extends Model
{
    use SoftDeletes;

    protected $fillable = ['check_in_id', 'doctor_id', 'remarks'];
}
