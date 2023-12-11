<?php
require APPPATH."libraries/REST_Controller.php";

class Students extends REST_Controller{
    public function index_post(){
        echo "This is Post Method";
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