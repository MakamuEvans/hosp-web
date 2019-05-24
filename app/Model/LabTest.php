<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabTest extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'rate', 'status', 'remarks'];

    protected $casts = [
        'status'=>'boolean'
    ];
}
