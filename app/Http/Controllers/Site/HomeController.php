<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Color;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        $categoriesCount =  Category::active()->count();
        $banners = Banner::active()->get();
        $newProducts = Product::whereIsNew(1)->active()->latest()->get()->take(4);
        $productOffers = Product::where('discount','>',0)->latest()->get()->take(4);

        return view('site.home.index', compact('categories', 'banners', 'newProducts','productOffers','categoriesCount'));
    }

    public function offers(Request $request)
    {
        //$productOffers = Product::where('discount','>',0)->latest()->paginate(12);
        $productOffers = Product::where('discount','>',0)->active();
        $productOffers = $this->filterData($request,$productOffers);
        $productOffers = $productOffers->paginate(12)->withQueryString();
        return view('site.offers', compact('productOffers'));
    }
    public function filterData( $request,$productOffers)
    {
        $requestColors = $request->color;
        $requestSizes = $request->size;
        $price_from = $request->price_from;
        $price_to = $request->price_to;

        if ($request->has('search') && !is_null($request->search)) {
            $productOffers = $productOffers->where('ar_name', 'like', '%' . $request->search . '%')
                ->orWhere('en_name', 'like', '%' . $request->search . '%');
        }

        if ($request->has('color')  && !is_null($request->color)) {
            $colors = Color::whereIn('id', (array)$requestColors)->pluck('id')->toArray();
            $productOffers = $productOffers->whereHas('product_colors', function ($q) use ($colors) {
                $q->whereIn('color_id', $colors);
            });
        }
        if ($request->has('size') && !is_null($request->size)) {
            $sizes = Size::whereIn('id', (array)$requestSizes)->pluck('id')->toArray();
            $productOffers =$productOffers->whereHas('product_sizes', function ($q) use ($sizes) {
                $q->whereIn('size_id', $sizes);
            });
        }
        if (!is_null($price_from) && !is_null($price_to)) {
            $productOffers = $productOffers->whereBetween('price', [$price_from, $price_to]);
        }

        return $productOffers;
    }

    public function categories()
    {
        $categories = Category::active()->get();
        return view('site.categories.categories', compact('categories'));
    }

    public function subCategories($id)
    {
        $categoryName = Category::whereId($id)->first();
        $subCategories = SubCategory::whereCategoryId($id)->active()->get();
        return view('site.categories.sub-categories', compact('subCategories','categoryName'));
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
