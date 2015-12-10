<?php
class model_page {
	private $db;
	public function __construct($username, $password)
	{
		$this->db = new PDO( 'mysql:host=localhost;dbname=BruCrew;charset=utf8', $username, $password, array( PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
	}

	public function get_user_login($user, $pass)
	{
	$q = $this->db->query( "SELECT ID, Email, Password, FirstName, LastName FROM Employees WHERE Email = '$user'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_admin_login($user, $pass)
	{
	$q = $this->db->query( "SELECT ID, Email, Password, FirstName, LastName, IsAdmin FROM Employees WHERE Email = '$user' AND Password = '$pass'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_user_info( $user )
	{
	$q = $this->db->query( "SELECT ID, Email, FirstName, LastName, Phone, Address, City, State, Zip FROM Employees WHERE ID = '$user'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
	public function get_my_regular_clients()
	{
	$q = $this->db->query( "SELECT r.ID, CONCAT(c.FirstName, ' ', c.LastName) as Client, c.ID as ClientID FROM RegularClients as r LEFT JOIN Customers as c on r.CustomerID = c.ID WHERE r.EmployeeID = {$_SESSION['UserID']} ORDER BY c.LastName Asc" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
	public function delete($var)
	{
	$ID = $var['id'];
	$q = $this->db->prepare( "DELETE FROM RegularClients WHERE ID = :ID" );



	$q->bindParam( ':ID', $ID );
		
	$q->execute(); //Trap error here. //
	}






}
?>

