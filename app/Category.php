<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $withCount = ['paragraphs'];

    protected static function boot()
    {
        self::deleting(function ($c) {
            $c->paragraphs()->delete();
            $c->children()->delete();
        });
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function tree()
    {
        return self::whereNull('parent_id')->with('children.children')->orderBy('id', 'desc')->get();
    }

    public function paragraphs()
    {
        return $this->hasMany(Paragraph::class);
    }
}
