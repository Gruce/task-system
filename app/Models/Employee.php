<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'gender', 'state', 'job', 'profile_photo'];

    protected $appends = ['created_time', 'updated_time', 'delete_time'];
    protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
