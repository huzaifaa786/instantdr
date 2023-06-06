<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Traits\UserMethods;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Doctor extends Authenticatable
{
    use HasFactory, UserMethods;
    protected $fillable = ['name', 'email', 'password', 'gender', 'dob', 'phone', 'address', 'qualification', 'image', 'start_time', 'end_time', 'days', 'api_token'];
    protected $casts = [
        'days' => 'array',
    ];
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = ImageHelper::saveImage($value, 'image');
    }
    public function getImageAttribute($value)
    {
        return asset($value);
    }
}
