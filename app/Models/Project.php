<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Project extends Model
{
    use HasFactory, SoftDeletes, HelperTrait;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $fillable = ['title', 'description'];
    // protected $appends = ['created_time', 'updated_time' , 'delete_time'];
    // protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function employees(){
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
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


    public function comment($body)
    {
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $this->comments()->save($comment);
    }
}
