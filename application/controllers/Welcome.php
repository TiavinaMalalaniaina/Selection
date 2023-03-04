<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function log () {
		$this->load->view('login.php');
	}


	public function login() {
		// session_start();
		$this->load->helper('url_helper');
		$this->load->model('home_model');
		$this->load->library('session');
			$user = $this->input->post('user');
			$mdp = $this->input->post('mdp');
			if ($this->home_model->login($user,$mdp)) {
				$data['customers'] = $this->home_model->get_list_customer2();
				
				$this->session->set_userdata('user', 'admin');
				$this->load->view('home', $data);
			} else {

				redirect('welcome/log');
			}
	}

	public function accueil() {
		$this->load->helper('url_helper');
		$this->load->model('home_model');
		$data['customers'] = $this->home_model->get_list_customer2();
		
		$this->load->view('home', $data);
	}
	
	public function format($money = '0') {
		$this->load->helper('format_helper');
		echo 'Salut à toi : ' .$money.'<br/>';
		echo format_to_money($money);
	}

	public function manger($plat = '', $boisson = '') {
		echo 'Voici votre menu : <br/>';
		echo $plat . '<br/>';
		echo $boisson . '<br/>';
		echo 'Bon appétit !';
	}

	function about() {
		// définition des données variables du template
		$data['title'] = 'Tiavina\'s page';
		$data['description'] = 'Page created by Tiavina';
		$data['keywords'] = 'Tiavina, Malalaniaina';
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'welcome_message';
		// on charge la page dans le template
		$this->load->view('template', $data);
	}
}