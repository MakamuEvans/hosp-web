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

    //appends
    public function getDecodedStatusAttribute(){
        return $this->status ? 'Active': 'InActive';
    }
    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }
    public function getFormattedGenderAttribute(){
        return $this->gender == 1 ? 'Male': 'Female';
    }

    protected $appends = ['decoded_status', 'formatted_date', 'formatted_gender'];
}
