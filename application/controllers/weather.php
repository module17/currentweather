<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weather extends CI_Controller {

	public function index()
	{
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('locations');
        $this->load->view('header');

        $data['countries'] = $this->locations->get_all_countries();

        $this->load->view('weather', $data);
	$this->load->view('footer');
	}
}

/* End of file weather.php */
/* Location: ./application/controllers/weather.php */