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

    protected $appends = ['project_title'];
    //protected $hidden = ['created_at', 'updated_at', 'delete_at'];



    /****************************************************/
    /******************* RELATIONSHIPS ******************/
    /****************************************************/

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function employees(){
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


    protected function projectTitle(): Attribute{
        return Attribute::make(
            get: function () {
                return $this->project->title;
            },
        );
    }
}

