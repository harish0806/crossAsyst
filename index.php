<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$text = $json->queryResult->parameters->queryText;
	echo $text;
        $speech=array("Hi, Nice to meet you","Bye, good night","Yes, you can type anything here.","Sorry, I didnt get that. Please ask me something else.");
	switch ($text) {
		case 'hi':
			$speech[0];
			break;

		case 'bye':
			$speech[1];
			break;

		case 'anything':
			$speech[2];
			break;
		
		default:
			$speech[4];
			break;
	}

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
