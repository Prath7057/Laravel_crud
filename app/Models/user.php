<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $table = 'user';
    //
    public function setUserNameAttribute($value)
    {
        $value = ucwords($value);
        $names = explode(' ', $value, 2);
        $this->attributes['user_name'] = $names[0];
        $this->attributes['user_lname'] = $names[1] ?? '';
    }
    //
    public function setUserCityAttribute($value)
    {
        $value = ucwords($value);
        $this->attributes['user_city'] = $value;
    }
    //
    public function getUserGenderAttribute($value)
    {
        switch ($value) {
            case 'Male':
                return 'M';
            case 'Female':
                return 'F';
            case 'Other':
                return 'O';
            default:
                return 'MFO'; 
        }
    }
    //
    public function getUserCityAttribute($value)
    {
        return ucwords($value);
    }
}
