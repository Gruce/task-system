<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Employee extends Model
{
    use HasFactory, SoftDeletes;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;


    protected $fillable = ['user_id', 'department_id',  'state', 'job'];

    // protected $appends = ['photo'];
    // protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class)->withTimestamps();
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function notifications()
    {
        return $this->belongsToMany(Notification::class)->withTimestamps()->withPivot(['read'])->orderByDesc('id');
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





    /****************************************************/
    /************** ACCESSORS & MUTATORS ****************/
    /****************************************************/
    protected function name(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->user->name;
            },
        );
    }

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->user->profile_photo;
            },
        );
    }



    protected function percentageCompletedProjects(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->projects()->count() ? intval($this->projects()->where('done', 1)->count() / $this->projects()->count() * 100) : 0;
            },
        );
    }

    protected function percentageNotCompletedProjects(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->projects()->count() ? intval($this->projects()->where('done', 0)->count() / $this->projects()->count() * 100) : 0;
            },
        );
    }
}
