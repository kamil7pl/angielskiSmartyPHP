<?php
//upewnić się!!!!!!!!!!
//destruktor
require_once("metody.php");
class losowanieSlowek extends metody{
	public $wszystkieSlowka=array();
	public $wylosowaneSlowka=array();
	public $dzisiaj;
	public $con;//protected
	public function __construct(){
		$this->con=$this->polaczenie();
		$this->dzisiaj=date("Y/m/d",time());
		$this->wszystkieSlowka=$this->zTabeliDoTablicy("select angielski, polski from angielski_polski");
		if($this->zTabeliDoTablicy("select*from daty where data='$this->dzisiaj'")==NULL){
		$this->wylosowaneSlowka=$this->podtablica($this->wszystkieSlowka, 3);//zmienna
		foreach($this->wylosowaneSlowka as $asocjacyjna){
			$asocjacyjna["dzis"]=$this->dzisiaj;
			$wstaw=$this->tablicaDoBazy($asocjacyjna);
			$this->con->query("insert into daty values $wstaw");
		}
		}
		else $this->wylosowaneSlowka=$this->zTabeliDoTablicy("select angielski, polski from daty where data='$this->dzisiaj'");
		
	}
	
}


?>