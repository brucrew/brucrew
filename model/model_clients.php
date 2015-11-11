<?php
class model_clients {
	private $db;
	public function __construct($username, $password)
	{
		$this->db = new PDO( 'mysql:host=localhost;dbname=BruCrew;charset=utf8', $username, $password, array( PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
	}

	public function get_user_login($user, $pass)
	{
	$q = $this->db->query( "SELECT ID, Email, Password, FirstName, LastName FROM Clients WHERE Email = '$user'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_admin_login($user, $pass)
	{
	$q = $this->db->query( "SELECT ID, Email, Password, FirstName, LastName, IsAdmin FROM Clients WHERE Email = '$user' AND Password = '$pass'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_user_info( $user )
	{
	$q = $this->db->query( "SELECT ID, Email, FirstName, LastName, Phone, Address, City, State, Zip FROM Clients WHERE ID = '$user'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
	
	public function get_clients()
	{
	$q = $this->db->query( "SELECT ID, CONCAT(FirstName, ' ', LastName) as Name, Phone, Email, CONCAT(Address, ', ', City, ', ', State, ' ', Zip) as Address, c.Source FROM Customers as c ORDER BY LastName Asc" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_client_recent_projects( $id )
	{
	$q = $this->db->query( "SELECT * FROM Orders WHERE CustomerID = '$id' LIMIT 200;" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
}


?>