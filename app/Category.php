<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $withCount = ['paragraphs'];


    public function paragraphs()
    {
        return $this->hasMany(Paragraph::class, 'category', 'name');
    }
}
