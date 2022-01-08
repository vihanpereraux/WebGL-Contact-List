<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';

// https://github.com/chriskacerguis/codeigniter-restserver/issues/1030
require APPPATH.'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

// http://localhost/CW02_Test01/index.php/api/contacts
class Contacts extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index_get()
    {
        $user = new UserModel;
        $result = $user->get_users();
        $this->response($result, 200);
        //echo "I am Employee index()";
    }

    public function getUserbyId_get($id)
    {
        $user = new UserModel;
        $result = $user->get_user_by_id($id);
        if($result != null)
        {
            $this->response($result, 200);
        }
        else
        {
            $this->response([
                'message' => 'Id out of bound'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function storeUser_post()
    {
        $user = new UserModel;
        $response = [
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'number' => $this->input->post('number'),
        ];
        $result = $user->insert_user($response);
        //$this->response($response, 200);

        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'New user added to the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'New user !added to the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function updateUser_put($id)
    {
        $user = new UserModel;
        $response = [
            'fname' => $this->put('fname'),
            'lname' => $this->put('lname'),
            'number' => $this->put('number'),
        ];
        $result = $user->update_user($response, $id);
        //$this->response($response, 200);

        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'User updated in the db'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'User !updated in the db'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function deleteUser_delete($id)
    {
        $user = new UserModel;
        $result = $user->delete_user($id);
        if($result != null)
        {
            $this->response(['message' => 'Completely deleted'
            ], RestController::HTTP_OK);
        }
        else
        {
            $this->response(['message' => 'Completely !deleted'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}

?>