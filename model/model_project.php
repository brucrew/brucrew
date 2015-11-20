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
	
	public function get_project_information( $id )
	{
	$q = $this->db->query( "SELECT o.ID, CONCAT(c.FirstName, ' ', c.LastName) as Name, DateReceived as Date, Location as Location, Description as Description, IsComplete, CompleteDate, CONCAT(e.FirstName, ' ', e.LastName) as EmployeeName FROM Orders as o join Customers as c on o.CustomerID = c.ID LEFT JOIN Employees as e on o.CompletedBy = e.ID WHERE o.ID = {$id} ORDER BY o.ID Desc LIMIT 1" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
	
	public function get_client_information( $id )
	{
	$q = $this->db->query( "SELECT CONCAT(c.FirstName, ' ', c.LastName) as Name, c.Email, c.Phone, c.Address, c.City, c.State, c.Zip FROM Orders as o join Customers as c on o.CustomerID = c.ID WHERE o.ID = {$id} ORDER BY o.ID Desc LIMIT 1" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_assignments_by_project( $id )
	{
	$q = $this->db->query( "SELECT CONCAT(FirstName, ' ', LastName) as Name FROM Assignments as a JOIN Employees as e on a.EmployeeID = e.ID WHERE a.OrderID = {$id} ORDER BY a.ID Asc LIMIT 200" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_employees()
	{
	$q = $this->db->query( "SELECT ID, CONCAT(FirstName, ' ', LastName) as Name FROM Employees ORDER BY LEVEL Asc, LastName Asc" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_hours_by_project( $id )
	{
	$q = $this->db->query( "SELECT h.ID, h.OrderID, CONCAT(FirstName, ' ', LastName) as Name, Date, Hours, Note, Paid, EmployeeID FROM Hours as h JOIN Employees as e on h.EmployeeID = e.ID WHERE h.OrderID = {$id} AND h.EmployeeID != 54 ORDER BY h.ID Asc LIMIT 200" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_expenses_by_project( $OrderID )
	{
	$q = $this->db->query( "SELECT a.ID, CONCAT(b.FirstName, ' ', b.LastName), a.Amount, a.Date, a.Description, a.BruCrewCard FROM Expenses as a LEFT JOIN Employees as b on a.EmployeeID = b.ID LEFT JOIN Orders as c on a.OrderID = c.ID LEFT JOIN Customers as d on c.CustomerID = d.ID WHERE a.OrderID = '$OrderID'" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}

	public function get_client_payments_by_project($id)
	{
	$q = $this->db->query( "SELECT p.ID, CONCAT(FirstName, ' ', LastName) as Name, Date as Date, Amount as Amount, Description as Description, Type as PaymentType FROM PaymentsReceived as p join Employees as e on p.EmployeeID = e.ID WHERE OrderID = {$id}" );
	return $q->fetchAll( PDO::FETCH_ASSOC );
	}
	
	public function complete( $information )
	{
	if (isset($information['OrderID']) && isset($information['EmployeeID']) && isset($information['CompleteDate']) && $information['CompleteDate'] != "")
	{
		print_r($information);
		//complete order via 'OrderID', 'EmployeeID', 'CompleteDate'
	}
	else
	{
		echo "<strong><font color='red'>Please Enter A Valid Date</font></strong><br><br>";
	}
	}

	public function assign( $information )
	{
	if (isset($information['OrderID']) && isset($information['EmployeeID']))
	{
		print_r($information);
		//assign worker via 'OrderID' and 'EmployeeID'
	}
	else
	{
		echo "<strong><font color='red'>Please Assign A Valid Worker</font></strong><br><br>";
	}
	}

	public function addhours( $information )
	{
	if ($information['EmployeeID'] != "" && $information['Date'] != "" && $information['Description'] != "" && $information['TimeIn'] != "" && $information['TimeOut'] != "" && $information['Hours'] != "")
	{
		print_r($information);
		//add hours via 'EmployeeID', 'Date', 'Description', 'TimeIn', 'TimeOut', 'Hours'
	}
	else
	{
		echo "<strong><font color='red'>Please Fill Out All Fields</font></strong><br><br>";
	}
	}
	
	public function addclientpayment( $information )
	{
	if ($information['EmployeeID'] != "" && $information['PaymentDate'] != "" && $information['PaymentAmount'] != "" && $information['PaymentType'] != "")
	{
		print_r($information);
		//add payments via 'EmployeeID', 'PaymentDate', 'PaymentAmount', 'PaymentType', 'Note'
	}
	else
	{
		echo "<strong><font color='red'>Please Fill Out All Fields</font></strong><br><br>";
	}
	}

	public function addexpense( $information )
	{
	if ($information['EmployeeID'] != "" && $information['ExpenseDate'] != "" && $information['ExpenseAmount'] != "" && $information['BruCrewCard'] != "")
	{
		print_r($information);
		//add expenses via 'EmployeeID', 'ExpenseDate', 'ExpenseAmount', 'ExpenseDescription', 'BruCrewCard'
	}
	else
	{
		echo "<strong><font color='red'>Please Fill Out All Fields</font></strong><br><br>";
	}
	}
}


?>