<?php

class twitter {
    public function get_tweets($latitude, $longitude) {
        $CI =& get_instance();
        $distance = 25; // kilometer distance threshold
        $keywords = 'weather';
        $api_url = sprintf('http://search.twitter.com/search.json?geocode=%s,%s,%dkm&q=%s',
            $latitude,
            $longitude,
            $distance,
            $keywords);

        $twitter_data = $CI->curl->simple_get($api_url);

        if ($twitter_data) {

            //var_dump(json_decode($videos_data));

            return json_decode($twitter_data, true);
        } else {
            return false;
        }
    }
}
