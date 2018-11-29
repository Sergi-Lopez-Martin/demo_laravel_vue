<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
      $posts = $category->posts()->published()->paginate(1);

      if(request()->wantsJson())
      {
        return $posts;
      }

      $posts =  $category->posts;
      return view('pages.home', [
        'title' => "{$category->name}",
        'posts' => $posts
      ]);
    }
}
