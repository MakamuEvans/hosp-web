<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status'=>'boolean'
    ];

    //appends
    public function getDecodedStatusAttribute(){
        return $this->status ? 'Active': 'InActive';
    }
    public function getFormattedDateAttribute(){
        return date_format($this->created_at, "d M, Y");
    }
    public function getDecodedUserTypeAttribute(){
        switch ($this->user_type){
            case 1:
                return "Admin";
                break;
            case 2:
                return "Doctor";
                break;
            case 3:
                return "Nurse";
                break;
            case 4:
                return "Lab Technician";
                break;
            case 5:
                return "Radiology Technician";
                break;
            case 6:
                return "Chemist";
                break;
            case 7:
                return "Receptionist";
                break;
            default:
                return "N/A";
        }
    }

    protected $appends = ['decoded_status', 'formatted_date', 'decoded_user_type'];
}
