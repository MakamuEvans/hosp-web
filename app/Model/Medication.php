<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medication extends Model
{
    use SoftDeletes;

    protected $fillable = ['check_in_id', 'drug_id', 'chemist_id', 'remarks'];

    //appends
    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }

    protected $appends = ['formatted_date'];

    public function drug(){
        return $this->belongsTo('App\Model\Drug', 'drug_id');
    }

    public function technician(){
        return $this->belongsTo('App\User', 'chemist_id');
    }

}
