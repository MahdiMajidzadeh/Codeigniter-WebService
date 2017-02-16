# Codeigniter-WebService

[![StyleCI](https://styleci.io/repos/82162409/shield?branch=master)](https://styleci.io/repos/82162409)

Webservice library is a Codeigniter Class that let you to make  json and xml webservices + RSS

its very simple and easy to use . 
<br/>

## How to install codeigniter Webservice?
downlaod Webserivce from git and paste file in ypur codeigniter libraries folder ,

open your controller and paste this function in it

```
   public function service()
     {
     $this->load->library(array('webservice'));
      $data=array();
      for($i=0;$i<100;$i++){
          $data[$i]["Random"]=rand(0,1000);
          $data[$i]["Name"]=rand(0,1000);
      }

      $rss=array();
      for($i=0;$i<100;$i++){
          $rss[$i]["title"]=rand(0,1000);
          $rss[$i]["link"]=rand(0,1000);
          $rss[$i]["description"]=rand(0,1000);
      }
  
        $this->webservice->getData($rss);
        echo $this->webservice->json();   //Create Json 
        echo $this->webservice->Xml('root'); //Create XML with root node start
        $info=array(
          "title"=>"Sample Feed - Favorite RSS Related Software & Resources",
          "description"=>"Take a look at some of FeedForAll's favorite software and resources for learning more about RSS.",
          "link"=>"http://google.com",
          "copyright"=>"Copyright 2004 NotePage, Inc."
       );
       echo $this->webservice->Rss($info);
   }
```
