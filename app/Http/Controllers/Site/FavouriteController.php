<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function addToFavourite($product_id)
    {
        $data = ['product_id'=>$product_id,'user_id'=>auth()->user()->id];
        $favourite = Favourite::where($data)->first();
        if ($favourite)
        {
            $favourite->delete();
            return response()->json(['error'=>'This product is already Added'],400);
        }
        Favourite::create($data);
        if ($favourite) return response()->json('This product is Successfully Added',200);
    }

    public function index()
    {
        $favourites = Favourite::where(['user_id'=>auth()->user()->id])->latest()->get();
        return view('site.products.favourites',compact('favourites'));
    }

    public function destroy($id)
    {
        $favourite = Favourite::findOrFail($id);
        $favourite->delete();
        return 'Done';
    }
}
