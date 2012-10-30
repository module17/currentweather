<?php

class Geocode extends CI_Model {

    //do a lookup of the ip address to determine location coordinates
    function lookup_ip() {
        //$ip = $_SERVER['REMOTE_ADDR'];
        $ip = '173.223.11.17';
        $api_url = 'http://api.ipinfodb.com/v3/ip-city/?';

        $vars = array(  'key' => $this->config->item('ipinfodb_api_key'),
                        'ip' => $ip,
                        'format' => 'json');

        $ip_data = $this->curl->simple_get($api_url . http_build_query($vars));

        if ($ip_data) {
            /*
             * stdClass Object ( [statusCode] => OK [statusMessage] => [ipAddress] => 173.223.11.17
             * [countryCode] => US [countryName] => UNITED STATES [regionName] => MASSACHUSETTS
             * [cityName] => CAMBRIDGE [zipCode] => 02142 [latitude] => 42.3751
             * [longitude] => -71.1056 [timeZone] => -04:00 )
             */
            $ip_data = json_decode($ip_data);

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

    /*
     * Users geolocation coordinates from url params
     */
    function get_coordinates($url_params) {

    }

}