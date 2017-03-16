<?php
//Decorator Pattern
//Allows to add more functionality to an object without having to subclass the original class.
//has 3 components
//Component1: interface /class that do the one function that you want to do for example ''log message'.
interface Logger{
	public function log($msg);

}

//Component2: Concrete Component; implementation of the interface.
class FileLogger implements Logger{
	public function log($msg){
		echo "<br /> Logging to a FILE <br />";
	}
	
}

//Component3: Decorator.
abstract class DecoratorLogger implements Logger{
	protected $logger;
	public function __construct(Logger $logger){
	
		$this->logger = $logger;
	}
	abstract public function log($msg);

}
class TextLogger extends DecoratorLogger{

	public function log($msg){
		$this->logger->log($msg);
		echo "<br /> Logging to a TEXT <br />";
		
	}
	
}
class EmailLogger extends DecoratorLogger{

	public function log($msg){
	
		$this->logger->log($msg);
		echo "<br /> Logging to a EMAIL <br />";
	}
}

$log = new FileLogger();
$log = new TextLogger($log);
$log = new EmailLogger($log);
$log->log("Save Text");



?>