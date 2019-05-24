<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['names', 'dob', 'phone_number', 'gender', 'blood_type', 'remarks', 'status'];

    protected $casts = [
        'status'=>'boolean'
    ];
}
