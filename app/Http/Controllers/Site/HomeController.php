<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        $banners = Banner::active()->get();
        $newProducts = Product::whereIsNew(1)->active()->latest()->get()->take(4);
        return view('site.home.index', compact('categories', 'banners', 'newProducts'));
    }

    public function categories()
    {
        $categories = Category::active()->get();
        return view('site.categories.categories', compact('categories'));
    }

    public function subCategories($id)
    {
        $subCategories = SubCategory::whereCategoryId($id)->active()->get();
        return view('site.categories.sub-categories', compact('subCategories'));
    }


    public function about()
    {
        $page = Setting::whereType('long_text')->whereName('about')->first();
        return view('site.static-page', compact('page'));
    }

    public function page($id)
    {
        $page = Setting::whereType('long_text')->findOrFail($id);
        return view('site.static-page', compact('page'));
    }

    public function contact()
    {
        $location = Setting::whereName('address')->first();
        $phone = Setting::whereName('phone')->first();
        $mobile = Setting::whereName('mobile')->first();
        $email = Setting::whereName('email')->first();
        return view('site.contact-us', compact('location', 'phone', 'mobile', 'email'));
    }

    public function PostContact(Request $request)
    {
        $vL = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);
        if ($vL->fails()) return response()->json([
            'status' => false,
            'errors' => $vL->errors()->first()
        ]);
        Contact::create($request->all());

        return response()->json([
            'status' => true,
        ]);
    }
}
