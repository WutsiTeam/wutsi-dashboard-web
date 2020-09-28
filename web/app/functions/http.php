<?php

function http_blog_url($uri) {
    return 'https://int-com-wutsi-blog.herokuapp.com' . $uri;
}

function http_tracking_url($uri) {
    return 'https://int-com-wutsi-track.herokuapp.com' . $uri;
}

function http_post($url, $data) {
    $options = array(
        CURLOPT_CUSTOMREQUEST  => 'POST', // POST
        CURLOPT_RETURNTRANSFER => true,   // return web page
        CURLOPT_HEADER         => false,  // don't return headers
        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
        CURLOPT_ENCODING       => "",     // handle compressed
        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
        CURLOPT_TIMEOUT        => 120,    // time-out on response
        CURLOPT_HTTPHEADER     => array(
            'Content-Type: application/json',
            'X-Client-ID: wutsi-dashboard'
        )
    );
    $ch=curl_init($url);
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    curl_close($ch);

    return array(
        'url' => $url,
        'data' => $data,
        'result' => json_decode($result, true)
    );
}

?>
