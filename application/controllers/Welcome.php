<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('Contact/Contacts');
	}

	public function View()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/ViewContact', $data);
	}

	public function Create()
	{
		$this->load->view('Contact/CreateContact');
	}

	public function Update()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/UpdateContact', $data);	
	}

	public function Delete()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/DeleteContact', $data);
	}
}
