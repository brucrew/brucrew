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
	
	public function user_add_order($RequestID, $Name, $DateReceived, $Location, $Description)
	{
	try {
	$q1 = $this->db->query( "SELECT ID FROM Customers WHERE CONCAT(FirstName, ' ', LastName) LIKE '{$Name}'" );
	$results = $q1->fetchAll( PDO::FETCH_ASSOC );
	foreach( $results as $result )
	{
		$CustomerID = $result['ID'];
	}
	$q = $this->db->prepare( "INSERT INTO Orders (CustomerID, RequestID, DateReceived, Location, Description) VALUES (:CustomerID, :RequestID, :DateReceived, :Location, :Description)" );

		$q->bindParam( ':CustomerID', $CustomerID);
		$q->bindParam( ':RequestID', $RequestID);
		$q->bindParam( ':DateReceived', $DateReceived);
		$q->bindParam( ':Location', $Location);
		$q->bindParam( ':Description', $Description);

		$q->execute();	//Trap error here. //
	}
	catch (PDOException $e) {
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=useraddcustomer.php? message=addclientfirst">';
		exit();
	}
	$q2 = $this->db->prepare( "UPDATE Requests SET Transferred = 1 WHERE ID = '{$RequestID}'" );
		//$q2->bindParam( ':RequestID', $RequestID );

		$q2->execute(); //Trap error here. //
	}
}


?>
