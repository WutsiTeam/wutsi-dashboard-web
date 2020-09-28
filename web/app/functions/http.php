<?php

function http_blog_url($uri) {
    return 'https://int-com-wutsi-blog.herokuapp.com' . $uri;
}

function http_tracking_url($uri) {
    return 'https://int-com-wutsi-track.herokuapp.com' . $uri;
}

function http_post($url, $data) {
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'X-Client-ID: wutsi-dashboard'
        )
    );

    $result = curl_exec($ch);
    curl_close($ch);

    return array(
        'url' => $url,
        'data' => $data,
        'result' => $result
    );
//    return $result;
}

?>
