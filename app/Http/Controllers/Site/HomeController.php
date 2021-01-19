<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        $banners = Banner::active()->get();
        $newProducts = Product::whereIsNew(1)->latest()->get()->take(4);
        return view('site.home.index',compact('categories','banners','newProducts'));
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


    public function page($id)
    {
        $page = Setting::whereType('long_text')->findOrFail($id);
        return view('site.static-page', compact('page'));
    }
}
