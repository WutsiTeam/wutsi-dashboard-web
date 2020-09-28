<?php
    include '../functions/http.php';

    $response = array (
        array(1, 'This is a sample story', 'Ray Sponsible', 44, '2m 30s'),
        array(2, 'This is a another story', 'John Smith', 1435, '1m 19s')
    );


    echo json_encode($response);
?>
