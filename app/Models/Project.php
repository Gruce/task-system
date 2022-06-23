<?php

namespace App\Models;

use App\Traits\HelperTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Comment;

class Project extends Model
{
    use HasFactory, SoftDeletes, HelperTrait;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $fillable = ['title', 'description'];
    protected $appends = ['completed_tasks'];
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

    protected function completedTasks(): Attribute{
        return Attribute::make(
            get: function () {
                return $this->tasks()->where('state' , 1)->count();
            },
        );
    }


    public function comment($body){
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $this->comments()->save($comment);
    }
}
