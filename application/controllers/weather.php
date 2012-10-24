<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index()
	{        
        $this->load->model('locations');
        
        $data['main_content'] = 'weather';
        $data['title'] = 'Current Weather';
        $data['data']['countries'] = $this->locations->get_all_countries();

        $this->load->view('template', $data);

	}
}

/* End of file weather.php */
/* Location: ./application/controllers/weather.php */