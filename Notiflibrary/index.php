<?php


function sendPush($to, $title, $body, $imagesContent, $icon, $urldst, $keyApi, $urlApi)
{
    $postdata = json_encode(
        [
            'notification' =>
            [
                'title' => $title,
                'image'=>$imagesContent,
                'body' => $body,
                // 'icon' => $icon,    
                // 'click_action' => $urldst
            ],
            "priority"=> "high",
            "soundName"=> "default",
            'to' => $to
        ]
    );

    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json' . "\r\n"
                . 'Authorization: key=' . $keyApi,
            'content' => $postdata
        )
    );

    $context  = stream_context_create($opts);

    $result = file_get_contents($urlApi, false, $context);
    // var_dump($result);
    if ($result) {
        return json_decode($result);
    } else return false;
}
