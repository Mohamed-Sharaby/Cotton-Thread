<?php

use App\Models\Setting;


/**
 * @param $item
 * @return string
 */
function fix_null_string($item)
{
    return blank($item) ? '' : $item;
}

/**
 * @param $item
 * @return int
 */
function fix_null($item)
{
    return blank($item) ? 0 : $item;
}

/**
 * @param $item
 * @return float|int
 */
function fix_null_double($item)
{
    return blank($item) ? 0 : floatval(round($item, 2));
}

/**
 * @param $filename
 * @return null|string
 */
function getImg($filename)
{
    if (!empty($filename)) {
        $base_url = url('/');
        return $base_url . '/storage/' . $filename;
    } else {
        return null;
    }
}

/**
 * @param $folder
 * @return string
 */
function uploadPath($folder)
{
    return 'photos/' . $folder;
}

/**
 * @param $img_name
 * @param $folder_name
 * @return bool
 */
function deleteImgWithPath($img_name, $folder_name)
{
    \Storage::disk('public')->delete(uploadPath($folder_name), $img_name);
    return True;
}

/**
 * @param $file
 * @param string $folder
 * @return mixed
 */
function uploader($file, $folder = '')
{
    $path = \Storage::disk('public')->putFile(uploadPath($folder), $file);
    return $path;
}

/**
 * @param $request
 * @param $img_name
 * @param $model
 * @param null $onIdObject
 * @return bool
 */
function multiUploader($request, $img_name, $model, $onIdObject = null)
{
    foreach ($request[$img_name] as $image) {
        $filename = rand(99999, 99999999) . $image->getClientOriginalName();
        $path = \Storage::disk('public')->putFileAs($onIdObject->path, $image, $filename);
        $model->create(['file_type' => $onIdObject->getMorphClass(), 'file_id' => $onIdObject->id, 'type' => 'image', 'file' => $path]);
    }
    return true;
}

/**
 * @param $name
 * @return string
 */
function getSetting($name)
{
    $setting = Setting::where('name', $name)->first();
    if (!$setting) return "";
    return $setting->value;
}

/**
 * @param $targetUrl
 * @param null $query
 * @return string
 */
function handelQueryInPagination($targetUrl, $query = null)
{
    if ($query && $targetUrl)
        return $targetUrl . '&' . http_build_query($query, '', '&amp;');
    elseif ($targetUrl)
        return $targetUrl;
    else
        return '';
}

////////////////////////////////////////////
//function uploadImage($file, $img)
//{
//    return \Storage::disk('public')->putFile($file, $img);
//}

if (!function_exists('deleteImage')) {
    function deleteImage($file, $img)
    {
        \Storage::disk('public')->delete($file, $img);
        return true;
    }
}

if (!function_exists('getImgPath')) {
    function getImgPath($img)
    {
        if (is_null($img)) {
            return '';
        }
        return url('/') . '/storage/' . $img;
    }
}

if (!function_exists('cart_status')) {
    function cart_status()
    {
        $status =  [
            'open' => 'في انتظار تأكيد العميل',
            'confirmed' => 'تم تأكيد الطلب',
            'finished' => 'تم التوصيل',
            'refused' => 'تم رفض الطلب',
            'canceled' => 'تم الالغاء',
        ];
        return $status;
    }
}

if (!function_exists('payment_types')) {
    function payment_types()
    {
        return [
            'COD' => 'الدفع عند الاستلام',
            'wallet' => 'المحفظة',
            'bank_transaction' => 'تحويل بنكى',
            'credit' => ' بطاقة ائتمان',
        ];
    }
}


if (!function_exists('checkFav')) {
    function checkFav($product_id)
    {
        $favourites = \App\Models\Favourite::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
        if ($favourites) {
            return true;
        }
        return false;
    }
}


function handleArrayKeyNotExists($array, $key)
{
    if (array_key_exists($key, $array))
        return $array[$key];
    else
        return '';
}

if (!function_exists('cart')) {
    function cart()
    {
        if (auth()->guest()) return 0;
        $cart = auth()->user()->carts()->firstWhere('status', 'open');
        if (!$cart) return 0;
        return $cart->cartItems()->count();
    }
}

if (!function_exists('cartItems')) {
    function cartItems()
    {
        if (auth()->guest()) return null;
        $cart = auth()->user()->carts()->firstWhere('status', 'open');
        if (!$cart) return null;
        return $cart->cartItems;
    }
}


if (!function_exists('getSetting')) {
    function getSetting($name)
    {
        $setting = \App\Models\Setting::where('name', $name)->first();
        if (!$setting) {
            return "";
        }
        return $setting->value;
    }
}


if (!function_exists('price_after_coupon_discount')) {
    function price_after_coupon_discount($coupon, $price)
    {
        if (!$coupon) {
            return $price;
        }
        $price = round(($price * $coupon->discount / 100), 2);
        return $price;
    }
}

function getLangMessage($key, $lang)
{
    $data = [
        'ar' => [
            'order_refused' => 'تم رفض الطلب',
            'order_refused_body' => 'تم رفض الطلب الخاص بك من قبل الادارة',
            'order_confirmed' => 'تم تأكيد الطلب',
            'order_confirmed_body' => 'تم تأكيد الطلب الخاص بك من قبل الادارة وجاري تجهيزه',
            'order_cancelled' => 'تم إلغاء الطلب',
            'order_cancelled_body' => 'تم إلغاء الطلب الخاص بك',
            'order_finished' => 'تم تسليم الطلب',
            'order_finished_body' => 'تم تسليم الطلب الخاص بك شكرا لاستخدامك متجرنا',
            'order_new' => 'طلب جديد',
            'order_new_body' => 'يوجد طلب جديد',
        ],
        'en' => [
            'order_refused' => 'Order Refused',
            'order_refused_body' => 'Admin refuse your order',
            'order_confirmed' => 'Order Confirmed',
            'order_confirmed_body' => 'Your order confirmed and on processing',
            'order_cancelled' => 'Order Cancelled',
            'order_cancelled_body' => 'Your order was cancelled by admin',
            'order_finished' => 'Order delivered',
            'order_finished_body' => 'Your order delivered thanks for shopping from our store',
            'order_new' => 'New Order',
            'order_new_body' => 'You have New Order',
        ],
    ];
    return $data[$lang][$key];
}

