<?php
//adapter pattern
//problem: translates the interface of one class into some other interface.
//scenario to use: protect the client code from having to change
class Facebook{

	/* public function postToWall($msg){
		echo "posting message...to the wall";
	
	} */
	//if Facebook changes postToWall using a new method, only change required to the api implemenation 
	//is in the Adapter class.
	public function postToSky($msg){
		echo "posting message...to the sky";
	
	}
}
//interface to force post method implementation.
interface apiImplementation{

	public function post($msg);
}

class Adapter implements apiImplementation{
	private $api;
	public function __construct($api){

		$this->api = $api;
	}
	public function post($msg){
	
	//	$this->api->postToWall($msg);
		$this->api->postToSky($msg);
		
	}
}

$api = new Adapter(new Facebook);
$return= $api->post("post this message");

?>