<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\CategoryCollection;
use App\Http\Resources\Collection\CitiesCollection;
use App\Http\Resources\Collection\ColorsCollection;
use App\Http\Resources\Collection\DistrictsCollection;
use App\Http\Resources\Collection\RegionsCollection;
use App\Http\Resources\Collection\SizesCollection;
use App\Http\Resources\Collection\SubcategoriesCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use App\Models\City;
use App\Models\Color;
use App\Models\District;
use App\Models\Region;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Class PickersController
 * @package App\Http\Controllers\Api
 */
class PickersController extends Controller
{
    use ApiResponse;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories(){
        $categories = Category::where('is_ban',0)->get();
        return $this->apiResponse(new CategoryCollection($categories));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subcategories(Request $request){
        $validator = Validator::make($this->arrayFilter($request),[
            'category_id'=>'sometimes|numeric|exists:categories,id'
        ]);
        if ($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $categories = SubCategory::where('is_ban',0)->when(($request['category_id']!=null),function ($q)use($request){
            $q->where('category_id',$request['category_id']);
        })->get();
        return $this->apiResponse(new SubcategoriesCollection($categories));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function cities(){
        $cities = City::all();
        return $this->apiResponse(new CitiesCollection($cities));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function regions(Request $request){
        $validator = Validator::make($this->arrayFilter($request),[
            'city_id'=>'sometimes|numeric|exists:cities,id'
        ]);
        if ($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $regions = Region::when(($request['city_id']!=null),function ($q)use($request){
            $q->where('city_id',$request['city_id']);
        })->get();
        return $this->apiResponse(new RegionsCollection($regions));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function districts(Request $request){
        $validator = Validator::make($this->arrayFilter($request),[
            'region_id'=>'sometimes|numeric|exists:regions,id'
        ]);
        if ($validator->fails())
            return $this->apiResponse($validator->errors()->first(),422);
        $districts = District::when(($request['region_id']!=null),function ($q)use($request){
            $q->where('region_id',$request['region_id']);
        })->get();
        return $this->apiResponse(new DistrictsCollection($districts));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function colors(){
        $colors = Color::all();
        return $this->apiResponse(new ColorsCollection($colors));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function sizes(){
        $sizes = Size::all();
        return $this->apiResponse(new SizesCollection($sizes));
    }

    /**
     * @param Request $request
     * @return array
     */
    private function arrayFilter(Request $request)
    {
        return array_filter($request->all(), function ($var) {
            return ($var !== NULL && $var !== FALSE && $var !== "");
        });
    }

}
