<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RadiologyDiagnosis extends Model
{
    use SoftDeletes;

    protected $fillable = ['check_in_id', 'test_id', 'technician_id', 'remarks'];
}
