<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collection\CategoryCollection;
use App\Http\Resources\Collection\SubcategoriesCollection;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoriesController
 * @package App\Http\Controllers\Api
 */
class CategoriesController extends Controller
{
    use ApiResponse;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        $categories = Category::where('is_ban',0)
            ->when(($request->has('q')&& $request['q']!=null),function ($q)use($request){
                $q->where('ar_name','like','%'.$request['q'].'%')
                    ->orWhere('en_name','like','%'.$request['q'].'%');
            })->paginate(8);
        $categories = new CategoryCollection($categories);
        return $this->apiResponse($categories);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function subCategory(Request $request, Category $category){
        $subcategories = $category->subcategories()
            ->where('is_ban',0)
            ->when(($request->has('q')&& $request['q']!=null),function ($q)use($request){
                $q->where('ar_name','like','%'.$request['q'].'%')
                    ->orWhere('en_name','like','%'.$request['q'].'%');
            })->paginate(8);
        $subcategories = new SubcategoriesCollection($subcategories);
        return $this->apiResponse($subcategories);
    }
}
