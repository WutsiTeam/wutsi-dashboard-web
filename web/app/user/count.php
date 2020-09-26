<?php
    include '../functions/http.php';

    $response = array ('value'=>100);

// UNCOOMENT THIS and implement http_post() to make HTTP call to backend API
//    $url = http_blog_url('/v1/user/count');
//    $request = array();
//    $response = http_post($url, $request);

    echo json_encode($response);
?>
