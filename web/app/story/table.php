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
        return http_post($url, $request).response.stories;
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
            'userIds' => array_unique($userIds),
            'limit' => userIds.length
        );
        $users = http_post($url, $request).response.users;

        // Result
        $result = array();
        foreach ($users as $user) {
            $result[$user["id"]] = $user;
        }
        return $result;
    }

    function to_result($stories, $user_map) {
        $result = array();
        foreach($stories as $story){
            $userId = $story['userId'];

            array_push($result, array(
                $story['id'],
                $story['title'],
                $user_map[$userId]['fullName'],
                ''
            ));
        }
        return $result;
    }

    $stories = load_stories();
    $user_map = load_user_map($stories);
    $result = to_result($stories, $user_map);

    echo array('data' => $result);
?>
