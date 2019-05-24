<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    use SoftDeletes;

    protected $fillable = ['check_in_id', 'drug_id', 'chemist_id', 'remarks'];

}
