<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index($url_params=null)
	{        
        $this->load->model('locations');
        $this->load->model('geocode');
        $this->load->model('weather_data');

        $data['main_content'] = 'weather';
        $data['title'] = 'currentweather';
        $data['data']['countries'] = $this->locations->get_all_countries();
        if ($url_params) {
            $this->locations->lookup_request($url_params);
        }
        //if there is no request in the url proceed to determine ip based location
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

        //lookup the weather
        $data['data']['weather_data'] = $this->weather_data->lookup_weather();

        //get videos
        $data['data']['youtube_data'] = $this->youtube->get_videos($this->locations->location_data['latitude'],
                                                                    $this->locations->location_data['longitude']);

        $map_config['center'] = $this->locations->location_data['latitude'] . ', ' . $this->locations->location_data['longitude'];
        $map_config['map_height'] = '170px';
        //initialize our map passing config parameters
        $this->googlemaps->initialize($map_config);
        //create the map and send to view
        $data['data']['map'] = $this->googlemaps->create_map();

        //set locations data
        $data['data']['location_data'] = $this->locations->location_data;

        //set the request type variable to the view
        $data['data']['request_type'] = $this->locations->request_type;

        //load main template view
        $this->load->view('template', $data);

	}
}

/* End of file weather.php */
/* Location: ./application/controllers/weather.php */