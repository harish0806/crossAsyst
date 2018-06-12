<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
    	$text        = array();
	$speech	     = array();
    	$text        = $json->queryResult->parameters->text;
	//$text = $json->queryResult->querytext;
	//echo $text;
        //$speech=array("Hi, Nice to meet you","Bye, good night","Yes, you can type anything here.","Sorry, I didnt get that. Please ask me something else.");
	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	//$response = array();
	$response = new \stdClass();
	$response->fulfillmentText = $speech;
	//$response->displayText = $speech;
	$response->source = "webhook";
	header('Content-Type: application/json');
	echo json_encode($response);
}
else
{
	echo "Method not allowed after reading the documentation";
}

?>
