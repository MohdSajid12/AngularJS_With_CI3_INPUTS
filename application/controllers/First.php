<?php
class First extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Data');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function addUser()
    {
        $data = json_decode(file_get_contents('php://input'), true);
    
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
    
    
        $userData = array(
            'firstname' => $firstname,
            'lastname' => $lastname
        );
    
        $return = $this->Data->addUser($userData);
    
        if ($return) {
            echo 'Data inserted successfully';
        } else {
            echo 'Something went wrong';
        }
    }
    

}
