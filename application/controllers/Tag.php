<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller
{
    public function Assign()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Tag/assign_tag', $data);
	}

	public function Delete()
	{
		$data_id = $this->uri->segment(3);
		$data = array(
			'contact_id' => $data_id
		);
		$this->load->view('Tag/delete_tag', $data);
	}
}

?>