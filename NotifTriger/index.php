<?php

// Firebase Cloud Messaging Authorization Key
define('FCM_AUTH_KEY', 'your key here');

function sendPush($to, $title, $body, $icon, $url)
{
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'body' => $body,
                'icon' => $icon,
                'click_action' => $url
            ],
            'to' => $to
        ]
    );

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json' . "\r\n"
                . 'Authorization: key=' . 'AAAAQJvLONg:APA91bE00MfCIFujweGqHFN2eefd3X6msvmVXMWX-p0KFccvaYyxhn6ET-JL7xiyqhiFAILNAk1c6hPi-R6CGlAvWJxo7o8HSq0uuS7X83AqQ50qnf3AtkZA3CaiImuqqCyvtjrjYEa6' . "\r\n",
            'content' => $postdata
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);
    var_dump($result);
    if ($result) {
        return json_decode($result);
    } else return false;
}

 sendPush('your-client-push-authorization-key', 'Judul Pesan', 'Disni Pesan', 'https://anysite.com/some_image.png', 'https://openthissiteonclick.com');
