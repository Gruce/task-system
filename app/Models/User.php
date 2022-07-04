<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use SoftDeletes;
    use HelperTrait;



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'gender',
        'email',
        'password',
        'phonenumber',
        'is_admin',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }


    protected function profilePhoto(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->profile_photo_path)
                    return asset('storage/users/' . $this->id . '/profile_photo/' . $this->profile_photo_path);
                elseif ($this->gender == 1)
                    return 'https://cdn2.iconfinder.com/data/icons/people-groups/512/Man_Avatar-512.png';
                else return 'https://cdn2.iconfinder.com/data/icons/people-groups/512/Woman_Avatar-512.png';
            },
        );
    }
}
