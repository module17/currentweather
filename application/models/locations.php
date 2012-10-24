<?php

class Locations extends CI_Model {

    function get_all_countries() {
        $this->db->order_by('country_name');
        $query = $this->db->get('countries_web');
        return $query->result();
    }

}