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

    protected $fillable = ['title', 'description' , 'done' , 'change_at'];
    // protected $appends = ['project_employees' , 'completed_tasks' , 'un_completed_tasks' , 'percentage_completed_tasks'];
    // protected $hidden = ['created_at', 'updated_at', 'delete_at'];


    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function employees()
    {
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

    public function labels()
    {
        return $this->morphMany(Label::class, 'labelable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }


    /****************************************************/
    /******************* END RELATIONSHIPS **************/
    /****************************************************/

    protected function completedTasks(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->tasks()->where('state', 3)->count();
            },
        );
    }

    protected function unCompletedTasks(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->tasks()->whereIn('state', [1,2])->count();
            },
        );
    }

    protected function percentageCompletedTasks(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->tasks()->count() ? intval($this->completed_tasks / $this->tasks()->count() * 100) : 0;
            },
        );
    }

    protected function projectEmployees(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->employees()->get(['id' , 'name']);
            },
        );
    }


    public function comment($body)
    {
        $comment = new Comment;
        $comment->body = $body;
        $comment->user_id = auth()->id();
        $this->comments()->save($comment);
    }
}
