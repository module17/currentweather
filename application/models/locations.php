<?php

class Locations extends CI_Model {

    public $request_type = 'IP';
    public $location_data = array();

    function get_all_countries() {
        $this->db->order_by('country_name');
        $query = $this->db->get('countries_web');
        return $query->result();
    }

    function lookup_request($request) {
        //recursive check starting at country level
        $this->get_country($request);
    }

    function get_country($url_slug) {
        $sql = sprintf("SELECT * FROM countries_web
                        WHERE url_slug='%s'", $url_slug);
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $answer = $query->row();

            //set to the capital city of the country
            $this->get_city($answer->capital_city_slug);

            $this->request_type = 'COUNTRY';
            return true;
        } else {
            //request is not a country so check if it is a region next
            $this->get_region($url_slug);
        }
    }

    function get_region($url_slug){
        $sql = sprintf("SELECT * FROM regions_web
                        WHERE region_url_slug='%s'", $url_slug);
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $answer = $query->row();

            //set to the capital city of region
            $this->get_city(false, $answer->country_code, $answer->region_fips_code);

            $this->request_type = 'REGION';

            return true;
        } else {
            //it is not a region so check if it is a city next
            $this->get_city($url_slug);
        }
    }

    function get_city($url_slug=false, $country_code=null, $region_fips_code=null){
        if ($url_slug) {
            $sql = sprintf("SELECT * FROM locations_web
                            WHERE location_slug='%s'", $url_slug);
        } else {
            $sql = sprintf("SELECT * FROM locations_web
                            WHERE country_code='%s'
                            AND region_fips_code='%s'
                            AND capital_city=1", $country_code, $region_fips_code);
        }
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            $answer = $query->row();
            $this->location_data['country_code']       = $answer->country_code;
            $this->location_data['country_name']       = $answer->country_code;//getCountryName($country_code);
            $this->location_data['region_code']        = $answer->region_fips_code;
            $this->location_data['region_name']        = $answer->region_fips_code . ' ' . $answer->country_code;//getRegionNameWeb($region_code, $country_code);
            $this->location_data['city_name']          = $answer->city;
            $this->location_data['latitude']           = $answer->latitude;
            $this->location_data['longitude']          = $answer->longitude;
            $this->location_data['timezone']           = $answer->timezone;
            $this->request_type = 'CITY';
            return true;
        } else {
            return false;
        }
    }

    function get_regions($country_code) {
        $sql = sprintf("SELECT * FROM regions_web WHERE country_code='%s' ORDER BY region_name", $country_code);

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {


            return $query->result_array();

        } else {
            return false;
        }

        
    }
}