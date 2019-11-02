<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function answer()
    {
        $this->hasMany(Answer::class);
    }



}
