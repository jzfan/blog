<?php

namespace App\Http\Controllers;

use App\Paragraph;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    public function index()
    {
        if (request()->has('cid')) {
            return Paragraph::where('category_id', request('cid'))->get();
        }
        return Paragraph::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paragraph  $paragraph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paragraph $paragraph)
    {
        //
    }
}
