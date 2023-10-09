<?php 

require_once ("{$ROOT}{$DS}config{$DS}conf.php");
class model{
protected static $bdd;
	
	 static function Init(){
		$host = Conf::getHostname();
		$dbname = Conf::getDatabase();
		$login = Conf::getLogin();
		$pass = Conf::getPassword();
		try{
			self::$bdd = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass);
			} catch(PDOException $e) {
				die ($e->getMessage()); 
			}
	}

}
model::Init();
