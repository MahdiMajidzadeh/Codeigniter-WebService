<?php

/*
 * Author :  Nima Habibkhoda
 * Email: Nima.2004hkh@gmail.com
 * Website: nimahabibkhoda.ir
 * Project Name : Codeigniter Webservice library
 */

defined('BASEPATH') or exit('No direct script access allowed');
class CI_WebService extends CI_Loader
{
    private $data;

    public function getData($data)
    {
        if (gettype($data) == 'array') {
            $this->data = $data;
            // die(var_dump($data));
            return $data;
        } else {
            exit('Array is allowed');
        }
    }

    public function json()
    {
        return json_encode($this->data);
    }

    public function Xml($node)
    {
        header('Content-Type: application/xml'); //Output Format

        echo '<?xml version="1.0"?>'; //Xml syntax
        echo '<'.$node.'>'; //Open Node

        for ($i = 0; $i < count($this->data); $i++) {
            list($Key, $Value) = each($this->data[$i]); //Get Key
            echo '<'.$Key.$i.'>'; //Create Parent
            foreach ($this->data[$i] as $k => $v) {
                if ($k != '') {
                    echo '<'.$k.'>'; //Create Child Node
                    echo $v; //Child Value
                    echo '</'.$k.'>';
                } else {
                    die('Array Format is not Allowed'); //Wrong Format
                }
            }
            echo '</'.$Key.$i.'>'; //Parent Close
        }
        echo '</'.$node.'>'; //Node Close
    }

    public function Rss($info)
    {
        header('Content-Type: application/xml'); //Output Format

        echo '<?xml version="1.0"?><rss version="2.0"><channel>'; //RSS Syntax
        foreach ($info as $key=>$val) {
            //  die(var_dump($val));
            echo '<'.$key.'>';
            echo htmlentities($val);
            echo '</'.$key.'>';
        }
        for ($i = 0; $i < count($this->data); $i++) {
            list($Key, $Value) = each($this->data[$i]); //Get Key
            echo '<item>'; //Create Parent
            foreach ($this->data[$i] as $k => $v) {
                if ($k != '') {
                    echo '<'.$k.'>'; //Create Child Node
                    echo $v; //Child Value
                    echo '</'.$k.'>';
                    /* print('<title>RSS Tutorial</title>
                            <link>http://www.w3schools.com/xml/xml_rss.asp</link>
                            <description>New RSS tutorial on W3Schools</description>
           ');**/
                } else {
                    die('Array Format is not Allowed'); //Wrong Format
                }
            }
            echo '</item>'; //Parent Close
        }

        echo '</channel></rss>'; //Close Rss
    }
}
