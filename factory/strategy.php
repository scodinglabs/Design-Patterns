<?php
//Strategy Pattern.
//Problem this solves:allows to select an algorithm at run time. 
//encapsulate each one of the algorithm as an object and make it interchangable.
interface Algorithm{
public function sort();
}
class Alg1 implements Algorithm{

	private $data;
	public function __construct($d){
		$this->data =$d;
	}
	public function sort(){
		echo "sorting using Alg1";
	}
}

class Alg2 implements Algorithm{
	private $data;
	public function __construct($d){
		$this->data =$d;
	}
	public function sort(){
		echo "sorting using Alg2";
	}
}

class Alg3 implements Algorithm{
	private $data;
	public function __construct($d){
		$this->data =$d;
	}
	public function sort(){
		echo "sorting using Alg3";
	}
}

class sortStrategy{
	private $tempData;
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	public function sort(){
		
		if(count($this->data )<10){
			$tempData = new Alg1($this->data );

		}elseif (count($this->data )>20){
			$tempData = new Alg2($this->data);

		}
		return $tempData->sort();
	}

}

//$data = array(13,4,543,3,43,56,56734,34,32,2,4,4);
$data = array(13,4,543,3,43,56,56734,34,32,2,4,4,13,4,543,3,43,56,56734,34,32,2,4,4);
$sort = new sortStrategy($data);
$sort->sort();

?>