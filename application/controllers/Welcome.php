<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('Contacts');
	}

	public function Create()
	{
		$this->load->view('CreateContact');
	}

	public function Update()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('UpdateContact', $data);	
	}

	public function Delete()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('DeleteContact', $data);
	}
}
