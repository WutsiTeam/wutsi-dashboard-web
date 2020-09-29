<?php
    include '../functions/http.php';

    function load_stories() {
        $url = http_blog_url('/v1/story/search');
        $request = array (
            'sortBy' => 'published',
            'sortOrder' => 'descending',
            'status' => 'published',
            'live' => true,
            'limit' => 50
        );
        return http_post($url, $request)['stories'];
    }

    function load_user_map($stories) {
        // User Ids
        $userIds = array();
        foreach ($stories as $story){
            array_push($userIds, $story['userId']);
        }

        // Search
        $url = http_blog_url('/v1/user/search');
        $request = array (
            'userIds' => $userIds,
            'limit' => count($userIds)
        );
        $users = http_post($url, $request)['users'];

        // Result
        $map = array();
        foreach ($users as $user) {
            $map[$user["id"]] = $user;
        }
        return $map;
    }

    function to_result($stories, $user_map) {
        $result = array();
        foreach($stories as $it){
            $timestamp = $it['publishedDateTime'] / 1000;
            $userId = $it['userId'];

            array_push($result, array(
                $it['id'],
                $it['title'],
                $user_map[$userId]['fullName'],
                date("Y-m-d", $timestamp)
            ));
        }
        return $result;
    }

    $stories = load_stories();
    $user_map = load_user_map($stories);

    $result = to_result($stories, $user_map);
    echo json_encode(
        array('data' => $result)
    );
?>
