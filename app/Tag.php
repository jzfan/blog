<?php

namespace App;

use Overtrue\Pinyin\Pinyin;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    protected $withCount = ['paragraphs'];

    protected static function boot()
    {
        parent::boot();
        static::deleted(function ($tag) {
            \DB::table('paragraph_tag')->where('tag_id', $tag->id)->delete();
        });
    }

    public function paragraphs()
    {
        return $this->belongsToMany(Paragraph::class);
    }

    public static function firstOrCreateByName($name)
    {
        $first = self::where('name', $name)->first();
        if ($first == null) {
            return self::createByName($name);
        }
        return $first;
    }

    public static function createByName($name)
    {
        $pinyin = new Pinyin;
        return self::create([
            'name' => $name,
            'pinyin' => $pinyin->permalink($data['name']),
            'abbr' => $pinyin->abbr($data['name'])
        ]);
    }
}
