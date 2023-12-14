<?php
require APPPATH."libraries/REST_Controller.php";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
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
    public function index_get(){
        // echo "This is Get Method";
        $result = $this->Students_mdl->get_students_info();
        if(!empty($result)){
            $response = array(
                'status' => true ,
                'results'=>$result
                );
                $this->response($response,200);
        }
        else{
            $response = array('status'=>false,'message'=>'Data Not Found');
            $this->response($response,404);
        }
    }
    public function index_put($studentId){
        echo "This is Put Method";
        $input_data = json_decode(file_get_contents("php://input"), true);
        $updatedData = $input_data;
        $result = $this->Students_mdl->update($studentId, $updatedData);
        if($result==true)
            echo "Updated";
        else
            echo "Student ID Not Found";
    }

    public function index_delete($studentId){
        
        $result=$this->Students_mdl->delete($studentId);
        if($result)
            echo "Deleted";
        else
            echo "Student ID Not Found";
    }


}

?>