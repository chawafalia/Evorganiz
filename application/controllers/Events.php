<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Event/ListEvents');
	}

	public function index() {
		$this->ListEvent();
	}

	public function ListEvent() {

		$data['page'] = $this->tabEvent();

		$data['title']= 'EVENEMENT';
		$this->load->view("Theme/theme", $data);


	}

	public function tabEvent() {

		$data['ListEvents']= $this->ListEvents->getEvents();

		return $this->load->view("Event/ListEvents", $data, true);
	}


	public function addEvent() {
		
		$data = array(
			'themeEvent'=> htmlspecialchars($_POST['themeEvent']),
			'dateEvent'=> htmlspecialchars($_POST['dateEvent']),
			//'occasionEvent'=> htmlspecialchars($_POST['occasionEvent']),
			'budgetMaxEvent'=> htmlspecialchars($_POST['budgetMaxEvent']),
			'personConcerned'=> htmlspecialchars($_POST['personConcerned'])
		);


		$this->ListEvents->insert($data);

		redirect(site_url('/Events'));
	}


	public function deleteEvent() {

		$idEvent = $_POST['idEventToDelete'];

		if (isset($idEvent)){

			$this->ListEvents->delete($idEvent);

		} 

		redirect(site_url('/Events'));
	}


	public function editEvent() {

		$data = array(
			'idEvent'=> htmlspecialchars($_GET['idEventToEdit']),
			'themeEvent'=> htmlspecialchars($_POST['themeEventToEdit']), 
			'dateEvent'=> htmlspecialchars($_POST['dateEventToEdit']),
			'occasionEvent'=> 'a faire',
			'budgetMaxEvent'=> htmlspecialchars($_POST['budgetMaxEventToEdit']),
			'personConcerned'=> htmlspecialchars($_POST['personConcernedToEdit'])
		);

		$this->ListEvents->update($data);

		redirect(site_url('/Events'));
	}


	
}