<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function tree()
   {
       return Category::tree();
   }

   public function show(Category $category)
   {
        return $category->blogs;
   }
}
