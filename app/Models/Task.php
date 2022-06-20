<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Task extends Model
{
    use HasFactory, SoftDeletes, HelperTrait;


    protected $fillable = [
        'project_id', 'title', 'description', 'is_active', 'state',
        'importance', 'start_at', 'end_at'
    ];

    //protected $appends = ['created_time', 'updated_time' , 'delete_time' , 'start_time' , 'end_time'];
    //protected $hidden = ['created_at', 'updated_at', 'delete_at'];



    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function project()
    {
        $this->belongsTo(Project::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/
}
