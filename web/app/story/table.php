<?php
    include '../functions/http.php';

    $url = http_blog_url('/v1/story/search');
    $request = array (
        'sortBy' => 'published',
        'sortOrder' => 'descending',
        'status' => 'published',
        'live' => true,
        'limit' => 50
    );
    $response = http_post($url, $request);
//    $response = array(
//        'data' => array (
//            array(1, 'This is a sample story', 'Ray Sponsible', '2020-01-30', 44, '2m 30s'),
//            array(2, 'This is a another story', 'John Smith', '2020-03-07', 1435, '1m 19s')
//        )
//    );

    echo json_encode($response);
?>
