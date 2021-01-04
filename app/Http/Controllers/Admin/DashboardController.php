<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.layouts.main');
    }


    public function active($id, $className)
    {
        $baseClass = 'App\Models\\' . $className;
        $model = $baseClass::findOrFail($id);
        $model->update(['is_ban' => !$model->is_ban]);

        if ($className == 'Category') {
            $model->subcategories()->update(['is_ban' => $model->is_ban]);
        }
        if ($className == 'SubCategory') {
            $model->products()->update(['is_ban' => $model->is_ban]);
        }

        return back()->with('success', __('تم التحديث بنجاح'));
    }
}
