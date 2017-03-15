<?php
//Factory Design Pattern
//USe factory to create shapes.
//uncouple client and products. advantage is any changes in product line requires change in the factory only.
//Pass information(eg;length, breadth,nameoftheshape) to ShapeFactory to create a type of object.
interface Shape{

	public function draw();
	
}

class Rectangle implements Shape{
	private $length;
	private $height;
	public function __construct($x,$y){
	
		$this->length =$x;
		$this->height = $y;
	}
	
	public function draw(){
	
		return "a rectangle";
	}

}

class Square implements Shape{
	private $length;
	private $height;
	public function __construct($x){
	
		$this->length =$x;
	}
	
	public function draw(){
	
		return "a square";
	}

}

class ShapeFactory{
	private static $shape;
	private static $xPos;
	private static $yPos;
	public static function create($x,$y=null,$s=null){
		ShapeFactory::$shape = $s;
		ShapeFactory::$xPos = $x;
		ShapeFactory::$yPos = $y;
		if (ShapeFactory::$shape == null){
			return null;		
		}else if(ShapeFactory::$shape == 'Rectangle'){
			return new Rectangle($x,$y);
		}else if (ShapeFactory::$shape == 'Square'){
			return new Square($x,$y);
		}
		return null;
	}
}

try{
	$shape= ShapeFactory::create(2,3,'Rectangle');
	//$shape= ShapeFactory::create(2,3,'Square');
	//$shape= ShapeFactory::create(2,3,'s');
	
	if ($shape==null){
		echo 'this shape cannot be created in this factory';
	}else{
		echo $shape->draw();
	}
}catch(Exception $e){
	echo $e->getMessage();
}

?>


