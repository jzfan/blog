<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $guarded = [];
    protected $with = ['tags'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($p) {
            $p->tags()->sync([]);
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
