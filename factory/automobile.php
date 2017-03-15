<?php
//Factory design pattern.
//Sepeate Client from the factory.
//provide the specifics, factory will create the automobile.
class Automobile{
	//step2. private variables for capturing automobile specifications provided by client.
	private $make;
	private $model;
	public function __construct($make, $model){
		$this->make = $make;
		$this->model = $model;
	}
	public function getMakeAndModel(){
		
		return $this->make . ' '.$this->model;
	}

}

class AutomobileFactory{
//step1. define a static function to create and return the automobile using the client requested  specifications.
	public static function create($make, $model){
		
		return  new Automobile($make, $model);
	}
}

$car = AutomobileFactory::create('honda','accord');
//var_dump($car);
print_r($car->getMakeAndModel());

?>