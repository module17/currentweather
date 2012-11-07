<?php

class eventful {
    public function get_events($latitude, $longitude) {
        $CI =& get_instance();

        $api_url = 'http://api.eventful.com/json/events/search?';

        $vars = array(  'app_key' => $CI->config->item('eventful_api_key'),
                        'where' => $latitude . ',' . $longitude,
                        'within' => '25',
                        'sort_order' => 'popularity',
                        'sort_direction' => 'descending'
                    );

        $event_data = $CI->curl->simple_get($api_url . http_build_query($vars));

        if ($event_data) {
            $event_data_arr = json_decode($event_data, true);
            return ($event_data_arr['events']) ? $event_data_arr : false;
        } else {
            return false;
        }
    }
}
