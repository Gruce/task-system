<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $fillable = ['user_id', 'state', 'job', 'profile_photo'];

    // protected $appends = ['created_time', 'updated_time', 'delete_time'];
    // protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function tasks(){
        return $this->belongsToMany(Task::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function add($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = bcrypt($data['password']);
        $this->is_admin = $data['is_admin'];
        $this->phonenumber = $data['phonenumber'];
        $this->save();
    }
}
