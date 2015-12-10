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
	
	public function get_hour_information( $id )
	{
	$q = $this->db->query( "SELECT ID, OrderID, EmployeeID, Date, TimeIn, TimeOut, Hours, Note, Paid FROM Hours WHERE ID = {$id} LIMIT 1" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function updatehour( $information )
	{
	if ($information['Date'] != "" && $information['TimeIn'] != "" && $information['TimeOut'] != "" && $information['Hours'] != "")
	{
		//update hour via 'Date', 'TimeIn', 'TimeOut', 'Hours', 'Note'
		$ID = $_GET['id'];
		$Date = $information['Date'];
		$TimeIn = $information['TimeIn'];
		$TimeOut = $information['TimeOut'];
		$Hours = $information['Hours'];
		$Note = $information['Note'];
		$OrderID = $information['OrderID'];
		$q = $this->db->prepare( "UPDATE Hours SET Date = :Date, TimeIn = :TimeIn, TimeOut = :TimeOut, Hours = :Hours, Note = :Note WHERE ID = :ID" );

		$q->bindParam( ':ID', $ID );
		$q->bindParam( ':Date', $Date );
		$q->bindParam( ':TimeIn', $TimeIn );
		$q->bindParam( ':TimeOut', $TimeOut );
		$q->bindParam( ':Hours', $Hours );
		$q->bindParam( ':Note', $Note );
		
		$q->execute(); //Trap error here. //

		echo "<META http-equiv='refresh' content='0;URL=project.php?id={$OrderID}'>";
	}
	else
	{
		echo "<strong><font color='red'>Please Fill Out All Fields</font></strong><br><br>";
	}
	}
	
	public function delete()
	{
	$hourID = $_GET['id'];
	$projectID = $_GET['projectID'];
	$employeeID = $_GET['employeeID'];
	if($employeeID == $_SESSION['UserID']){
		$q = $this->db->query( "DELETE FROM Hours WHERE ID = '$hourID'" );
		$q->execute();
		echo "<meta http-equiv=Refresh content=0;url=project.php?id={$projectID}>";
	}
	else
	{
		echo "This hour entry does not belong to you, so you may not delete it.  You will be redirected shortly back to the project page<br><br>";
		echo "<meta http-equiv=Refresh content=6;url=project.php?id={$projectID}>";
	}
	}
}


?>