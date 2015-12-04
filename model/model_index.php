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

	public function get_my_projects()
	{
		$q = $this->db->query( "SELECT o.ID, CONCAT(c.FirstName, ' ', c.LastName) as Client, o.Description, o.Location, a.Note, o.IsComplete, o.CompleteDate FROM Assignments as a join Orders as o on a.OrderID = o.ID join Customers as c on o.CustomerID = c.ID WHERE a.EmployeeID = {$_SESSION['UserID']} ORDER BY ID DESC;" );
		return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_recent_hours()
	{
		$q = $this->db->query( "SELECT h.ID as ID, CONCAT(c.FirstName, ' ', c.LastName) as Client, o.Description, h.Date, h.Hours, h.Paid, h.Amount FROM Hours as h JOIN Orders as o on h.OrderID = o.ID JOIN Customers as c on o.CustomerID = c.ID WHERE h.EmployeeID = {$_SESSION['UserID']} ORDER BY ID DESC;" );
		return $q->fetchAll( PDO::FETCH_ASSOC );
	}
}

?>
