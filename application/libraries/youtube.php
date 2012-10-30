<?php

class Youtube {
    public function get_videos($latitude, $longitude) {
        $CI =& get_instance();
        $keyword = 'weather'; // could be left blank too
        $api_url = sprintf('http://gdata.youtube.com/feeds/api/videos?alt=json&q=%s&location=%s,%s&location-radius=20mi&v=2&start-index=1&max-results=10',
            $keyword,
            $latitude,
            $longitude);

        $videos_data = $CI->curl->simple_get($api_url);

        if ($videos_data) {

            //var_dump(json_decode($videos_data));

            return json_decode($videos_data, true);
        } else {
            return false;
        }
    }
}
