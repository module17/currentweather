<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index($url_params=null)
	{        
        $this->load->model('locations');
        $this->load->model('geocode');

        $data['main_content'] = 'weather';
        $data['title'] = 'currentweather';
        $data['data']['countries'] = $this->locations->get_all_countries();
        if ($url_params) {
            $this->locations->lookup_request($url_params);
        }
        if ($this->locations->request_type == 'IP') {
            $this->geocode->lookup_ip();
        }

        //if country, show regions
        if ($this->locations->request_type == 'COUNTRY') {

            //$data['data']['regions'] = $this->locations->get_regions();
        }
        //if region, show cities
        if ($this->locations->request_type == 'REGION') {
            //$data['data']['cities'] = $this->locations->get_cities();
        }

        //set locations data
        $data['data']['location_data'] = $this->locations->location_data;

        $data['data']['request_type'] = $this->locations->request_type;
        $this->load->view('template', $data);

	}
}

/* End of file weather.php */
/* Location: ./application/controllers/weather.php */