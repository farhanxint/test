<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /** Class UserModel
     * @package App\Models\User
     * @author Shaarif <shaarifsabah5299@gmail.com>
     */
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     * @property string $first_name
     * @property string $last_name
     * @property string $phone_no
     * @property string $language
     * @property string $currency
     * @property string $time_zone
     * @property string $country
     * @property string $city
     * @property string $email
     * @property string $password
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_no',
        'language',
        'currency',
        'time_zone',
        'country',
        'city',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return HasOne
     */
    public function userSettings():HasOne
    {
        return $this->hasOne(UserSetting::class);
    }

}
