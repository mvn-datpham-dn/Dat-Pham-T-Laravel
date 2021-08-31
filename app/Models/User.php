<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAge($birthday)
    {
        $now = Carbon::now();
        $age = $now->diff($birthday)->y;
        switch ($age) {
            case $age < 6:
                return 'Mẫu giáo';
            case $age < 12:
                return 'Tiểu học';
            case $age <= 18;
                return 'THPT';
            default:
                return 'ĐH';
        };
        
    }
    public function getGender($gender)
    {
        if($gender == 1){
            return 'male';
        }else return 'female';
    }
}
