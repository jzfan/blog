<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public static function tree()
    {
        return self::where('parent_id', 0)->with('children.children')->get();
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'children' => $this->children
        ];
    }
}
