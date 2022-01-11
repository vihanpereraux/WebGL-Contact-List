<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('Contact/contacts');
	}

	public function View()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/view_contact', $data);
	}

	public function Create()
	{
		$this->load->view('Contact/create_contact');
	}

	public function Update()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/update_contact', $data);	
	}

	public function Delete()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Contact/delete_contact', $data);
	}

	public function Explore()
	{
		$this->load->view('Contact/explore_contact');
	}

	public function Results()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_name' => $data_id
		);
		$this->load->view('Contact/results_contact', $data);
	}

	public function Tags()
	{
		$this->load->view('Contact/explore_tag');
	}

	public function Tag_Results()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'tag_id' => $data_id
		);
		$this->load->view('Contact/results_tag', $data);
	}

}
