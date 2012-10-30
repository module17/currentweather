<?php

class Weather_data extends CI_Model {

        public $weather_data;

        function lookup_weather() {
            //decrecated soon
            //$api_url = 'http://api.wunderground.com/auto/wui/geo/WXCurrentObXML/index.xml?';
            //$vars = array('query' => $this->locations->location_data['latitude'] . ',' . $this->locations->location_data['longitude']);
            //$weather_data = $this->curl->simple_get($api_url . http_build_query($vars));

            $api_key = $this->config->item('wunderground_api_key');
            $api_url = sprintf('http://api.wunderground.com/api/%s/conditions/q/%s,%s.json',
                                $api_key,
                                $this->locations->location_data['latitude'],
                                $this->locations->location_data['longitude']);


            $weather_data = $this->curl->simple_get($api_url);

            if ($weather_data) {
                /*
                 * conditions are found
                 */
                //var_dump(json_decode($weather_data));

                return json_decode($weather_data, true);
            } else {
                //no weather conditions found for coordinates
                return false;
            }
        }

}