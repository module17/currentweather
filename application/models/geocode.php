<?php

class Geocode extends CI_Model {

    //do a lookup of the ip address to determine location coordinates
    function lookup_ip() {
        $ip = $_SERVER['REMOTE_ADDR'];

        $api_url = 'http://api.ipinfodb.com/v3/ip-city/?';

        $vars = array(  'key' => $this->config->item('ipinfodb_api_key'),
                        'ip' => $ip,
                        'format' => 'json');
        $api_path = $api_url . http_build_query($vars);

        $ip_data = $this->curl->simple_get($api_path);

        if ($ip_data) {
            /*
             * stdClass Object ( [statusCode] => OK [statusMessage] => [ipAddress] => 173.223.11.17
             * [countryCode] => US [countryName] => UNITED STATES [regionName] => MASSACHUSETTS
             * [cityName] => CAMBRIDGE [zipCode] => 02142 [latitude] => 42.3751
             * [longitude] => -71.1056 [timeZone] => -04:00 )
             */
            $ip_data = json_decode($ip_data);
            //var_dump($api_path);
            //var_dump($ip_data);
            $this->locations->location_data['country_code'] = $ip_data->countryCode;
            $this->locations->location_data['country_name'] = ucwords(strtolower($ip_data->countryName));
            $this->locations->location_data['region_name'] = ucwords(strtolower($ip_data->regionName));
            $this->locations->location_data['city_name'] = ucwords(strtolower($ip_data->cityName));
            $this->locations->location_data['post_code'] = $ip_data->zipCode;
            $this->locations->location_data['latitude'] = $ip_data->latitude;
            $this->locations->location_data['longitude'] = $ip_data->longitude;
        } else {
            //$this->curl->error_string;
            return false;
        }

        return $ip_data;

    }

    function lookup_ip_freegeo() {
        $ip = $_SERVER['REMOTE_ADDR'];

        $api_path = sprintf("http://freegeoip.net/json/%s", $ip);

        $ip_data = $this->curl->simple_get($api_path);

        if ($ip_data) {
            /*
                {"city": "Toronto", "region_code":
                "ON", "region_name": "Ontario", "metrocode": "",
                "zipcode": "m5r1a3", "longitude": "-79.4167", "latitude": "43.6667",
                "country_code": "CA", "ip": "208.124.229.91", "country_name": "Canada"}
             */
            $ip_data = json_decode($ip_data);

            $this->locations->location_data['country_code'] = $ip_data->country_code;
            $this->locations->location_data['country_name'] = $ip_data->country_name;
            $this->locations->location_data['region_name'] = $ip_data->region_name;
            $this->locations->location_data['city_name'] = $ip_data->city;
            $this->locations->location_data['post_code'] = $ip_data->zipcode;
            $this->locations->location_data['latitude'] = $ip_data->latitude;
            $this->locations->location_data['longitude'] = $ip_data->longitude;
        } else {
            return false;
        }

        return $ip_data;

    }
    /*
     * Users geolocation coordinates from url params
     */
    function get_coordinates($url_params) {

    }

}