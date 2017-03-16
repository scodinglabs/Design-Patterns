<?php

//Receiver

class radioControl{

	public function turnOn(){
	
		echo "...turning On the radio...";
	}
	
	public function turnOff(){
	
		echo "...turning Off the radio...";
	}

}

//Command

interface radioCommand{

	public function execute();
}

class turnOnRadio implements radioCommand{
	
	private $radioControl;
	public function __construct(radioControl $radioControl){
	
		$this->radioControl=$radioControl;
	}
	public function execute(){
	
		$this->radioControl->turnOn();
	}

}


class turnOffRadio implements radioCommand{

	private $radioControl;
	public function __construct(radioControl $radioControl){
	
		$this->radioControl = $radioControl;
	}
	public function execute(){
	
		$this->radioControl->turnOff();
	}

}

//Client

//$in ='turnOnRadio';
$in = 'turnOffRadio';
if(class_exists($in)){

	$command= new $in(new radioControl());
}else{

	throw new Exception ('...Command not found');
}
$command->execute();
?>