<?php
    include '../functions/http.php';

    $url = http_track_url('/v1/stats/search/overall');
    $request = array(
        'type' => $_GET["type"],
        'targetIds' => array(-1)
    );
    $response = http_post($url, $request);

    $value = 0;
    if (sizeof($response) > 0) {
        $stats = $response['stats'];
        $value = (sizeof($stats) > 0 ? $stats[0]['value'] : 0);
    }
    $result = array('value' => $value);
    echo json_encode($result);
?>
