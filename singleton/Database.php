<?php
/* //Singleton Pattern
//Pattern that allows to create one and only one instance of a class.
//this is achieved by making it impossible to create a new instance.
class Database{

	//Step2: create a private static variable
	private static $instance;
	//Step3: create a public static function to instantiate the class.
	public static function getInstance(){
		//Step4. Validate single instantiation.
		if(!isset(Database::$instance)){
			Database::$instance = new Database;
		}
		
		return Database::$instance;
	}
	public function getQuery(){
		return "select * from database";
	}
	private function __construct(){
	//Step1: create a constructor and make it private.
		}
}


$dB = Database::getInstance();
$dB3 = Database::getInstance();
$dB2 = Database::getInstance();
echo $dB->getQuery();
//all variables must refer to a single instance, proving singleton pattern implementation.
var_dump($dB);
var_dump($dB2);
var_dump($dB3);

//if not, singleton will refer to different instances. for example,
class db{
}
$db = new db();
$db2 = new db();
$db3 = new db();
var_dump($db);
var_dump($db2);
var_dump($db3); */
class database{
private function __construct(){
}
}
$db = new database();
$db2 = new database();
//$db and $db2 creates 2 separate instances.
var_dump($db);
var_dump($db2);
?>
