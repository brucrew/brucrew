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
	
	public function addclient( $information )
	{
	if ($information['FirstName'] != "" && $information['LastName'] != "")
	{
		$q = $this->db->prepare( "INSERT INTO Customers (FirstName, LastName, Email, Phone, Address, City, State, Zip, Source) VALUES (:FirstName, :LastName, :Phone, :Email, :Address, :City, :State, :Zip, :Source)" );
		$q->bindParam( ':FirstName', $information['FirstName'] );
		$q->bindParam( ':LastName', $information['LastName'] );
		$q->bindParam( ':Email', $information['Email'] );
		$q->bindParam( ':Phone', $information['Phone'] );
		$q->bindParam( ':Address', $information['Address'] );
		$q->bindParam( ':City', $information['City'] );
		$q->bindParam( ':State', $information['State'] );
		$q->bindParam( ':Zip', $information['Zip'] );
		$q->bindParam( ':Source', $information['Source'] );
		
		$q->execute(); //Trap error here. //
	}
	else
	{
		echo "<strong><font color='red'>First Name and Last Name Required</font></strong><br><br>";
	}
	}
}


?>