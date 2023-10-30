<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workings extends Model
{
    protected $fillable = ['users_id', 'start_time', 'end_time'];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}