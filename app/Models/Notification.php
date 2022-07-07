<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentEagerLimit\HasEagerLimit;

    protected $fillable = ['title', 'description'];

    ### RELATIONSHIPS ###

    public function user(){
        return $this->belongsTo(User::class);
    }
    ### END RELATIONSHIPS ###

}
