<?php
//Observer Pattern.
//allows individual isolated objects to update all objects at the same time whenever an event happens.
//Observer
interface Observer{

	public function addCurrency(Currency $convertor);
}

class priceSimulator implements Observer{
	private $companies;
	public function __construct(){
	
		$this->companies = array();
	}
	public function addCurrency(Currency $currency){
	
		array_push($this->companies,$currency);
	}
	public function updatePrice(){
	
		foreach($this->companies as $currency){
		
			$currency->update();
		}
	}

}

//Currency
interface Currency{

	public function update();
	public function getPrice();
}
class Pound implements Currency{

	private $price;
	public function __construct($price){
	
		$this->price = $price;
		echo "<br /> Pound original price {$price} <br />";
	}
	public function update(){
	
		$this->price = $this->getPrice();
	}
	public function getPrice(){
	
		return f_rand(0.65,0.71);
	}
	
}

class Yen implements Currency {
    private $price;
 
    public function __construct($price) {
        $this->price = $price;
        echo "<p>Yen Original Price : {$price}</p>";
    }
 
    public function update() {
        $this->price = $this->getPrice();
        echo "<p>Yen Updated Price : {$this->price}</p>";
    }
     
    public function getPrice() {
        return f_rand(120.52, 122.50);
    }
     
}
 
function f_rand($min=0,$max=1,$mul=1000000){
    if ($min>$max) return false;
    return mt_rand($min*$mul,$max*$mul)/$mul;
}

$pricesimulator = new priceSimulator();
$currency1 = new Pound(0.60);
$currency2 = new Yen(122);

$pricesimulator->addCurrency($currency1);
$pricesimulator->addCurrency($currency2);
$pricesimulator->updatePrice();
$pricesimulator->updatePrice();


?>