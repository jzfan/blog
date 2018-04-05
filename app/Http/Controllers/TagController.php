<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        if (request()->has('keyword')) {
            $like = '%'.request('keyword').'%';
            return Tag::where('abbr', 'like', $like)->orWhere('name', 'like', $like)->orderBy('abbr')->get();
        }
        return Tag::orderBy('abbr')->get()->groupBy(function ($item, $key) {
            return substr($item['abbr'], 0, 1);
        });

    }

    public function store()
    {
        request()->validate([
            'name' => 'required'
        ]);
        return Tag::createByName(request('name'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    public function update(Tag $tag)
    {
        $data = request()->validate([
                'name' => 'required'
            ]);
        $tag->update($data);
        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json('deleted', 200);
    }
}
