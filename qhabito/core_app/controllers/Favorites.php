<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorites extends CI_Controller {
	
	public function index() {
		// CSRF
		$data['csrf_exp'] = '' . $this->config->item('csrf_expire');
		
		// Touch device
		$data['device'] = 'desktop';
		if (Util::isMobileOrTablet() === TRUE) {
			$data['device'] = 'mobile-tablet';
		}
		
		// Dictionary model
		$this->load->model('dictionary_model');
		$data['language'] = $this->dictionary_model->get_language();
		/*$data['dictionary'] = $this->dictionary_model->get_words(array('home', 'rent', 'vacational', 'buy', 'faqs', 'users_area', 'sitemap', 'contact', 'sitemap', 'about_us', 'advertising', 'general_conditions', 'privacy_policy', 'newsletter', 'email', 'essentials', 'all_rights_reserved', 'cookies_msg', 'close', 'more_info', 'send'));*/
		$data['dictionary'] = $this->dictionary_model->get_all();
		
		// Model
		$data['data'] = $data;
		
		// View
		$this->load->view('favorites', $data);
	}
}
