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

    //appends
    public function getDecodedStatusAttribute(){
        return $this->status ? 'Active': 'InActive';
    }

    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }

    protected $appends = ['decoded_status', 'formatted_date'];
}
