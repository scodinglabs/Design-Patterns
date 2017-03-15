<?php 
//facade pattern
//simplifies scenarios that has mutiple process.
class User{
	private $id ;
	private $user;
	public function __construct($id){
			$this->id = $id;
	}

	public function borrowBooks(){
		
		$libraryFacade = new LibraryFacade($this->id );
		
		if($libraryFacade->verifyuser()){
		
			$libraryFacade->borrowbooks();
			$libraryFacade->payfine();
			$libraryFacade->serachbooks();
			$libraryFacade->reservebooks();
		}else{
		
			echo "please register to use library facilities";
		
		}
	}

}
class LibraryFacade{
	private $id;
	public function __construct($id){
		$this->id = $id;
		
	}
	public function verifyuser(){
		//code to verify the user id.
		if(!($this->id ==123)){
			return false;
		}else{
			return true;
		}
		
	}

	public function borrowbooks(){

	}

	public function payfine(){

	}

	public function serachbooks(){

	}

	public function reservebooks(){

	}
}

$user = new User(12);
$user->borrowBooks();

?>