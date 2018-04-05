<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Paragraph;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    public function index()
    {
        if (request()->has('category')) {
            return Paragraph::where('category', request('category'))->get();
        }
        if (request()->has('tag_id')) {
            return Tag::findOrFail(request('tag_id'))->paragraphs;
        }
        return Paragraph::orderBy('updated_at', 'desc')->take(10)->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|min:10',
            'category' => 'required|in:' . join(',', config('category'))
        ]);
        return Paragraph::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function show(Paragraph $paragraph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function edit(Paragraph $paragraph)
    {
        //
    }

    public function update(Request $request, Paragraph $paragraph)
    {
        $paragraph->update($request->all());
        return $paragraph;
    }

    public function destroy(Paragraph $paragraph)
    {
        $paragraph->delete();
        return 'deleted';
    }
}
