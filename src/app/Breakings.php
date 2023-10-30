<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breakings extends Model
{
    protected $fillable = ['breakings_id', 'breakings_start_time', 'breakings_end_time'];

    // リレーション: Breakings モデルは Workings モデルに属する
    public function working()
    {
        return $this->belongsTo('App\Workings', 'breakings_id');
    }
}
