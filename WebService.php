<?php

/*
 * Author :  Nima Habibkhoda
 * Email: Nima.2004hkh@gmail.com
 * Website: nimahabibkhoda.ir
 * Project Name : Codeigniter Webservice library
 */

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
        return json_encode($this->data);

    }

    public function Xml($node){
        header('Content-Type: application/xml'); //Output Format

        print('<?xml version="1.0"?>'); //Xml syntax
        print('<'.$node.'>');//Open Node

        for($i=0;$i<count($this->data);$i++) {

            list($Key, $Value) = each($this->data[$i]); //Get Key
            print('<'.$Key.$i.'>'); //Create Parent
            foreach ($this->data[$i] as $k => $v) {

                if ($k != '') {
                    print('<' . $k . '>'); //Create Child Node
                    print($v); //Child Value
                    print('</' . $k . '>');
                } else {
                    die("Array Format is not Allowed"); //Wrong Format
                }
            }
            print('</'.$Key.$i.'>'); //Parent Close
        }
        print('</'.$node.'>'); //Node Close
    }


    public function Rss($info){
        header('Content-Type: application/xml'); //Output Format

        print('<?xml version="1.0"?><rss version="2.0"><channel>'); //RSS Syntax
        foreach($info as $key=>$val) {
            //  die(var_dump($val));
            print('<'.$key.'>');
            print(htmlentities($val));
            print('</'.$key.'>');
        }
        for($i=0;$i<count($this->data);$i++) {

            list($Key, $Value) = each($this->data[$i]); //Get Key
            print('<item>'); //Create Parent
            foreach ($this->data[$i] as $k => $v) {

                if ($k != '') {
                    print('<' . $k . '>'); //Create Child Node
                    print($v); //Child Value
                    print('</' . $k . '>');
                    /* print('<title>RSS Tutorial</title>
                            <link>http://www.w3schools.com/xml/xml_rss.asp</link>
                            <description>New RSS tutorial on W3Schools</description>
           ');**/
                } else {
                    die("Array Format is not Allowed"); //Wrong Format
                }
            }
            print('</item>'); //Parent Close
        }

        print('</channel></rss>'); //Close Rss

    }




}

?>