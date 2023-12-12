<?php
require APPPATH."libraries/REST_Controller.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Students extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Students_mdl");
    }

    public function index_post(){
        // echo "This is Post Method" ;
        $data = array();
        $data['fullname'] = $this->input->post("fullname");
        $data['email'] = $this->input->post("email");
        $data['studentId'] = $this->input->post("studentId");
        $data['password'] = $this->input->post("password");
        $result = $this->Students_mdl->insert_students_info($data);
        $message = $result ? "Insert Success!" : "Insert Failed";
        echo $message;
        // echo '<pre>';print_r($_POST);exit;
    }
    public function index_put(){
        echo "This is Put Method";
    }
    public function index_delete(){
        echo "This is Delete Method";
    }
    public function index_get(){
        echo "This is Get Method";
    }

}

?>