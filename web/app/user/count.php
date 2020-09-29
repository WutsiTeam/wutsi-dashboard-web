<?php
    include '../functions/http.php';

    $url = http_blog_url('/v1/user/count');
    $request = array(
        'offset' => 0
    );
    $response = http_post($url, $request);

    $result = array('value' => $response['total']);
    echo json_encode($result);
?>
