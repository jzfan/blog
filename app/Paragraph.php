<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $guarded = [];
    protected $with = ['tags'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
