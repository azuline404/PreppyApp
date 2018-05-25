<?php

//require_once 'C:\Users\derek\vendor\autoload.php';
  require_once '../unirest/src/Unirest.php';


    $methodType = $_SERVER['REQUEST_METHOD'];
    $data = array("status" => "fail", "msg" => "On $methodType");

    if ($methodType === 'GET') {
        if(isset($_GET['output'])) {
            $output = $_GET['output'];
            // GET request to get the searched recipe passing in an array with the access key for spoonacular
            $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/search?query=" . $output . "&offset=0&number=10",
            array(
                "X-Mashape-Key" => "ByX279Alurmsh1xz0jp9KR4nvh9lp1g0a8UjsnKteukNKWsUlH",
                "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
            )
            );

            $data = array("status" => "fail", "msg" => "On $methodType", "root" => $response);
         
            $data['status'] = 'success';
            $data['msg'] = 'Retrieving data as JSON';
				    $json = json_encode($data);
						echo $json;
        }
    }
?>