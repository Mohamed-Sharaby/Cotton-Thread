<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Database\Reference;
use Kreait\Firebase\Factory;

const DEFAULT_URL = 'https://osraty-a153d.firebaseio.com/';
class FireBase
{
    const fcm_server_key = 'AAAAIcCrYYc:APA91bHbrB7nNcsKxT_9x3xIC8___hD1qCXHWQgE74XA501HwkOcmCUXJQh7gTbWrlR8u25PVSLH48JEgrCJiib3mvUGBGIkn9nhIHzv9KK1WXR6Xn9QvNrjcBt-ol0RZ96NEqKxT2A0';

    private static function connection($path)
    {
//        $serviceAccount = ServiceAccount::fromJsonFile(base_path("google-service-account.json"));
        $firebase = (new Factory)
                    ->withDatabaseUri('https://al3erywakood.firebaseio.com/')
                    ->withServiceAccount(base_path("google-service-account.json"))
                    ->createDatabase();
        return $firebase->getReference($path);
    }

    /**
     * @param $path
     * @param $data
     * @return Reference
     */
    public static function push($path, $data)
    {
        return Self::connection($path)->push($data);
    }

    /**
     * @param $path
     * @param $id
     * @param $data
     * @return Reference
     */
    public static function update($path, $id, $data)
    {
        return Self::connection($path . '/' . $id)->update($data);
    }

    /**
     * @param $path
     * @param $id
     * @return Reference
     */
    public static function delete($path, $id)
    {
        return self::connection($path . '/' . $id)->remove();
    }

    public static function notification($notifiable,$title,$body,$data)
    {
        Log::info($notifiable);
        $notify = $notifiable->fcm_tokens();
        if ($notify->where('type','android')->exists()) {
            self::notifyByFirebase($title, $body, [$notify->first()->token], $data, false);
        }
        if ($notify->where('type','ios')->exists()) {
            self::notifyByFirebase($title, $body, [$notify->first()->token], $data + ['title' => $title, 'body' => $body], true);
        }
        if ($notify->where('type','web')->exists()) {
            self::notifyByFirebase($title, $body, [$notify->first()->token], $data + ['title' => $title, 'body' => $body], true);
        }
//        notificationCrud($data,$notifiable);
    }

    public static function notifyByFirebase($title, $body, $tokens, $data = [], $is_notification = true)
    {
        // https://gist.github.com/rolinger/d6500d65128db95f004041c2b636753a
        $registrationIDs = $tokens;

        // prep the bundle
        // to see all the options for FCM to/notification payload:
        // https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support

        // 'vibrate' available in GCM, but not in FCM
        $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => "#203E78"
        );
        // I haven't figured 'color' out yet.
        // On one phone 'color' was the background color behind the actual app icon.  (ie Samsung Galaxy S5)
        // On another phone, it was the color of the app icon. (ie: LG K20 Plush)

        // 'to' => $singleID ;      // expecting a single ID
        // 'registration_ids' => $registrationIDs ;     // expects an array of ids
        // 'priority' => 'high' ; // options are normal and high, if not set, defaults to high.
        $fcmFields = array(
            'registration_ids' => $registrationIDs,
            'priority' => 'high',
            'data' => $data
        );
        if ($is_notification) {
            $fcmFields['notification'] = $fcmMsg;
        }

        $headers = array(
            'Authorization: key=' . self::fcm_server_key,
            'Content-Type: application/json'
        );

        /*        info("API_ACCESS_KEY_client: ".env('API_ACCESS_KEY_client'));
                info("PUSHER_APP_ID: ".env('PUSHER_APP_ID'));*/

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
        $result = curl_exec($ch);
//        dd($result);
        curl_close($ch);
        info($result);
        return $result;
    }

    public static function sendFCMTopic($target, $title, $body, $data, $is_notification = true)
    {
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = self::fcm_server_key;

        $fields = array();
        $fields['data'] = $data;
        $fields['to'] = $target;
        $fcmMsg = array(
            'body' => $body,
            'title' => $title,
            'sound' => "default",
            'color' => "#203E78"
        );
        if ($is_notification) {
            $fields['notification'] = $fcmMsg;
        }

        //header with content_type api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key=' . $server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Oops! FCM Send Error: ' . curl_error($ch));
        }
//        dd($ch);
        curl_close($ch);
        return $result;
    }

}
