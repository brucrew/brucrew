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
	
	public function get_expense_information( $id )
	{
	$q = $this->db->query( "SELECT ID, OrderID, EmployeeID, Date, Amount, Description, Mulch, BruCrewCard FROM Expenses WHERE ID = {$id} LIMIT 1" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function updateexpense( $information )
	{
	if ($information['Date'] != "" && $information['TimeIn'] != "" && $information['TimeOut'] != "" && $information['Hours'] != "")
	{
		print_r($information);
		//update hour via 'Date', 'TimeIn', 'TimeOut', 'Hours', 'Note'
	}
	else
	{
		echo "<strong><font color='red'>Please Fill Out All Fields</font></strong><br><br>";
	}
	}

	public function delete()
	{
	$expenseID = $_GET['id'];
	$projectID = $_GET['projectID'];
	$q = $this->db->query( "DELETE FROM Expenses WHERE ID = '$expenseID'" );
	$q->execute();
	echo "<meta http-equiv=Refresh content=0;url=project.php?id={$projectID}>";
	}
}


?>