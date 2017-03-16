<?php
//Command Pattern.
//problem solves:encapsulates functionality/feature inside an object.

//receiver

class Receiver{

	public function getCompany(){
	
		echo "Getting company name...";

	}
	public function updateAccount(){
	
		echo "Updating account...";
			
	}
}

//Command

interface Command{

	public function execute();
}

class GetCompany implements Command{
	private $stocksim;
	public function __construct(Receiver $receiver){
		
			$this->stocksim = $receiver;
	
	}
	public function execute(){

			$this->stocksim->getCompany();

	}
}

class UpdateAccount implements Command{
	private $stocksim;
	public function __construct(Receiver $receiver){
	
		$this->stocksim = $receiver;
	}
	public function execute(){
		$this->stocksim->updateAccount();
	
		//do the work;
	}

}



//invoker

//$in = 'GetCompany';
$in = 'UpdateAccount';

if(class_exists($in)){
	$command = new $in(new Receiver);

}else{

	throw new Exception ('...command does not exist..');
}

$command->execute();

?>