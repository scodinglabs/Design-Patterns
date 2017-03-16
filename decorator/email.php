<?php
//decorator design pattern.
//send email
//add christmas greetings to the original email.
//add new year greetings to the original email.
//add additional message to the email.
// to send both greetings in one email, without modifying any code in the base class. 

interface Email{

	public function sendEmail();

}

class ClientEmail implements email{

	public function sendEmail(){
		
		echo "<br /> Standard Email. <br />";
	}

}

abstract class EmailDecorator implements email{

	protected $email;
	public function __construct(Email $email){
	
		$this->email = $email;
	}
	abstract function sendEmail();

}

class ChristmasEmail extends EmailDecorator{

	public function sendEmail(){
	
		$this->email->sendEmail();
		echo "<br /> adding Christmas message <br />";
	}
}

class NewYearEmail extends EmailDecorator{

	public function sendEmail(){
	
		$this->email->sendEmail();
		echo "<br /> adding New Year message <br />";
		
	}
}

$email = new ClientEmail();
$email = new ChristmasEmail($email);
$email = new NewYearEmail($email);
$email->sendEmail();

?>