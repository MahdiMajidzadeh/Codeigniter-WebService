<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CI_WebService extends CI_Loader
{

    private $data;

    public function getData($data){
        if(gettype($data)=='array') {
            $this->data = $data;
           // die(var_dump($data));
            return $data;
        }
        else{
            exit('Array is allowed');
        }

    }


    public function json(){
        return json_encode($this->data,true);

    }



}

?>