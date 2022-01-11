<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

// https://github.com/chriskacerguis/codeigniter-restserver/issues/1030
require APPPATH.'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

// http://localhost/CW02_Test01/index.php/api/contacts
class Explore extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ExploreModel');
    }

    // Getting all the contacts
    public function index_get()
    {
        $explore = new ExploreModel;
        $result = $explore->get_contacts();
        $this->response($result, 200);
    }

    // Getting contacts by name
    public function getContactsByName_get($contact_name)
    {
        $explore = new ExploreModel;
        $result = $explore->get_contacts_by_name($contact_name);
        $this->response($result, 200);
    }

    // Getting contacts by tags
    public function getContactsByTag_get($tag_id)
    {
        $explore = new ExploreModel;
        $result = $explore->get_contacts_by_tag($tag_id);
        $this->response($result, 200);
    }

}