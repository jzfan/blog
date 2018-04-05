<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    private $table;

    public function __construct()
    {
        $this->table = \DB::table('paragraph_tag');
    }

    public function destroy()
    {
        $data = request()->validate([
            'paragraph_id' => 'required',
            'tag_id' => 'required'
        ]);
        return $this->table->where($data)->delete();
    }

    public function store()
    {
        $data = request()->validate([
            'tag' => 'required',
            'pid' => 'required|exists:paragraphs,id'
        ]);
        $tag = Tag::firstOrCreateByName($data['tag']);
        $tag->paragraphs()->attach($data['pid']);
        return response()->json($tag->toArray(), 201);
    }
}
