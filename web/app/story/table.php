<?php
    include '../functions/http.php';

    function load_stories() {
        $url = http_blog_url('/v1/story/search');
        $request = array (
            'sortBy' => 'published',
            'sortOrder' => 'descending',
            'status' => 'published',
            'live' => true,
            'limit' => 100
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

    function load_views_map($stories) {
        // User Ids
        $storyIds = array();
        foreach ($stories as $story){
            array_push($storyIds, $story['id']);
        }

        // Search
        $url = http_track_url('/v1/stats/search/overall');
        $request = array (
            'targetIds' => $storyIds,
            'type' => 'viewers'
        );
        $stats = http_post($url, $request)["stats"];

        // Result
        $map = array();
        foreach ($stats as $stat) {
            $map[$stat['targetId']] = $stat;
        }
        return $map;
    }

    function to_result($stories, $user_map ,$views_map) {
        $result = array();
        foreach($stories as $it){
            $timestamp = $it['publishedDateTime'] / 1000;
            $userId = $it['userId'];
            $storyId = $it['id'];

            array_push($result, array(
                $it['id'],
                $it['title'],
                $user_map[$userId]['fullName'],
                date("Y-m-d", $timestamp),
                $views_map[$storyId]['value']
            ));
        }
        return $result;
    }

    $stories = load_stories();
    $user_map = load_user_map($stories);
    $views_map = load_views_map($stories);

    $result = to_result($stories, $user_map, $views_map);
    echo json_encode(
        array('data' => $result)
    );
?>
