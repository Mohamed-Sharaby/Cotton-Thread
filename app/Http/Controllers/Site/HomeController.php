<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        return view('site.home.index',compact('categories'));
    }

    public function categories()
    {
        $categories = Category::active()->get();
        return view('site.categories.categories',compact('categories'));
    }

    public function subCategories($id)
    {
        $subCategories = SubCategory::whereCategoryId($id)->active()->get();
        return view('site.categories.sub-categories',compact('subCategories'));
    }


}
