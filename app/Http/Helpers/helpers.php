<?php
use App\Models\Setting;


/**
 * @param $item
 * @return string
 */
function fix_null_string($item){
    return blank($item) ? '' : $item;
}

/**
 * @param $item
 * @return int
 */
function fix_null($item){
    return blank($item) ? 0 : $item;
}

/**
 * @param $item
 * @return float|int
 */
function fix_null_double($item){
    return blank($item) ? 0 : floatval(round($item,2));
}

/**
 * @param $filename
 * @return null|string
 */
function getImg($filename){
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
function uploadPath($folder){
    return 'photos/'.$folder;
}

/**
 * @param $img_name
 * @param $folder_name
 * @return bool
 */
function deleteImgWithPath($img_name, $folder_name){
    \Storage::disk('public')->delete(uploadPath($folder_name), $img_name);
    return True;
}

/**
 * @param $file
 * @param string $folder
 * @return mixed
 */
function uploader($file, $folder=''){
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
function multiUploader($request, $img_name, $model, $onIdObject = null){
    foreach ($request[$img_name] as $image) {
        $filename = rand(99999, 99999999).$image->getClientOriginalName();
        $path = \Storage::disk('public')->putFileAs($onIdObject->path, $image,$filename);
        $model->create(['file_type'=>$onIdObject->getMorphClass(), 'file_id'=>$onIdObject->id,'type'=>'image','file'=>$path]);
    }
    return true;
}

/**
 * @param $name
 * @return string
 */
function getSetting($name){
    $setting= Setting::where('name',$name)->first();
    if (!$setting) return "";
    return $setting->value;
}
////////////////////////////////////////////
//function uploadImage($file, $img)
//{
//    return \Storage::disk('public')->putFile($file, $img);
//}
//
//function deleteImage($file, $img)
//{
//    \Storage::disk('public')->delete($file, $img);
//    return true;
//}
//
//
//function getImgPath($img)
//{
//    if (is_null($img)) {
//        return '';
//    }
//    return url('/').'/storage/'.$img;
//}
