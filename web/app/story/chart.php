<?php
    include '../functions/http.php';

    $url = http_track_url('/v1/stats/search/monthly/story');
    $request = array(
        'type' => $_GET["type"],
        'year' => date("Y"),
        'storyIds' => array(-1)
    );
    $response = http_post($url, $request);

    $labels = array();
    $values = array();
    if (sizeof($response) > 0) {
        $stats = $response['stats'];
        if (sizeof($stats) > 0) {
            foreach($stats as $stat) {
                $yy = $stat['year'];
                $mm = $stat['month'];
                $label = $yy . '-' . (strlen($mm) == 1 ? '0'.$mm : $mm);

                array_push($labels, $label);
                array_push($values, $stat['value']);
            }
        }
    }
    echo json_encode(array(
        'labels' => $labels,
        'values' => $values
    ));

?>
