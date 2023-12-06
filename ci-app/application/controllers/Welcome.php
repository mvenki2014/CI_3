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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		try {
			$db_obj = $this->database->load('t_v',TRUE);
			$connected = $db_obj->initialize();
			if (!$connected) {
				$db_obj = $this->database->load('t_v',TRUE);
			}

			var_dump($db_obj);
			exit();
			$this->db->select('count(*) as visitors_count');
			$queryData = $this->db->get('visitors')->result();
			echo json_encode($queryData);
			exit();
			$this->load->view('welcome_message');
		} catch (Exception $e) {
			echo $e->getMessage() . '--' . $e->getTraceAsString();
		}
	}
}
