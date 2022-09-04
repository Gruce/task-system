<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $fillable = ['title', 'project_id', 'description', 'read', 'read_at'];

    ### RELATIONSHIPS ###

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withTimestamps()->withPivot(['read']);
    }
    ### END RELATIONSHIPS ###

}
