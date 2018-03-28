<?php

namespace App\Http\Controllers;

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
}
