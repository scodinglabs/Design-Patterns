<?php

interface Observer{

	public function add(Companies $comp);
	public function updatePrices($price);
}

class StockSimulator implements Observer{
	private $companies = array();
	public function add(Companies $comp){
			array_push($this->companies,$comp);
		return $this->companies;
	}
	public function updatePrices($price){
		foreach($this->companies as $company){
		
			$company->update($price);
		}
	
	}

}


interface Companies{

	public function update($price);

}

class Google implements Companies{

	private $price;
	public function __construct(){
	
	
	}
	public function update($price){
	
		$this->price = $price;
		echo "Google updated Price: $this->price  <br />" ;
	}

}

class Walmart implements Companies{

	private $price;
	public function __construct(){
	
	
	}
	public function update($price){
	
		$this->price = $price;
		echo "Walmart updated Price: $this->price <br />";
	}


}



$stocksimulator = new StockSimulator();

$company1 = new Google();
$company2 = new Walmart();


$companies = $stocksimulator->add($company1);
$companies = $stocksimulator->add($company2);

$stocksimulator->updatePrices(26.5555);



?>