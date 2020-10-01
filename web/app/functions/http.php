<?php

function http_blog_url($uri) {
    $host = getenv('WUTSI_BLOG_API_HOST');
    if (!$host) {
        $host = 'int-com-wutsi-blog.herokuapp.com';
    }
    return 'https://' . $host . $uri;
}

function http_track_url($uri) {
    $host = getenv('WUTSI_TRACK_API_HOST');
    if (!$host) {
        $host = 'int-com-wutsi-track.herokuapp.com';
    }
    return 'https://' . $host . $uri;
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
        ),
        CURLOPT_POSTFIELDS      => json_encode($data)
    );
    $ch=curl_init($url);
    curl_setopt_array($ch, $options);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

?>
