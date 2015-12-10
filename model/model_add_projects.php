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

	public function user_add_order( $information )
	{
		if (empty($information['requestID'])) 
		{
			$requestID = 0;
		}
		else
		{
			$requestID = $information['requestID'];
		}
		if($information['triggernewclient'] == "1")
		{
			if ($information['FirstName'] != "" && $information['LastName'] != "" && $information['Location'] != "" && $information['Description'] != "" && $information['DateReceived'] != "")
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
				$last_id = $this->db->lastInsertId();

				$q2 = $this->db->prepare( "INSERT INTO Orders (CustomerID, RequestID, DateReceived, Location, Description) VALUES (:CustomerID, :RequestID, :DateReceived, :Location, :Description)" );
				$newDate = date("Y-m-d", strtotime($information['DateReceived']));
				$q2->bindParam( ':CustomerID', $last_id );
				$q2->bindParam( ':RequestID', $requestID );
				$q2->bindParam( ':DateReceived', $newDate );
				$q2->bindParam( ':Location', $information['Location'] );
				$q2->bindParam( ':Description', $information['Description'] );
		
				$q2->execute(); //Trap error here. //
				$last_order = $this->db->lastInsertId();
				
				try
				{
					$q3 = $this->db->prepare( "UPDATE Requests SET Transferred = 1 WHERE ID = '{$requestID}'" );
					$q3->execute(); //Trap error here. //
				}
				catch( PDOException $Exception )
				{

				}
				$q4 = $this->db->prepare( "INSERT INTO Assignments (OrderID, EmployeeID, Note) VALUES (:OrderID, :EmployeeID, :Note)" );
				$Note = "";
				$q4->bindParam( ':EmployeeID', $_SESSION['UserID'] );
				$q4->bindParam( ':OrderID', $last_order );
				$q4->bindParam( ':Note', $Note );
		
				$q4->execute(); //Trap error here. //
				echo "<meta http-equiv=Refresh content=0;url=project.php?id={$last_order}>";
			}
			else
			{
				echo "Please fill out First Name and Last Name, as well as one contact information field, and all order information fields";
			}
		}
		else
		{
			if ($information['clientID'] != "" && $information['Location'] != "" && $information['Description'] != "" && $information['DateReceived'] != "")
			{
				$q = $this->db->prepare( "INSERT INTO Orders (CustomerID, RequestID, DateReceived, Location, Description) VALUES (:CustomerID, :RequestID, :DateReceived, :Location, :Description)" );
				$newDate = date("Y-m-d", strtotime($information['DateReceived']));
				$q->bindParam( ':CustomerID', $information['clientID'] );
				$q->bindParam( ':RequestID', $requestID );
				$q->bindParam( ':DateReceived', $newDate );
				$q->bindParam( ':Location', $information['Location'] );
				$q->bindParam( ':Description', $information['Description'] );
		
				$q->execute(); //Trap error here. //
				$last_id = $this->db->lastInsertId();

				try
				{
					$q2 = $this->db->prepare( "UPDATE Requests SET Transferred = 1 WHERE ID = '{$requestID}'" );
					$q2->execute(); //Trap error here. //
				}
				catch( PDOException $Exception )
				{

				}

				$q3 = $this->db->prepare( "INSERT INTO Assignments (OrderID, EmployeeID, Note) VALUES (:OrderID, :EmployeeID, :Note)" );
				$Note = "";
				$q3->bindParam( ':EmployeeID', $_SESSION['UserID'] );
				$q3->bindParam( ':OrderID', $last_id );
				$q3->bindParam( ':Note', $Note );
		
				$q3->execute(); //Trap error here. //
				echo "<meta http-equiv=Refresh content=0;url=project.php?id={$last_id}>";

			} else {
				echo "Please fill out all fields";
			}
		}
	}

	public function delete_hour()
	{
	$hourID = $_GET['hourid'];
	$q = $this->db->query( "DELETE FROM Hours WHERE ID = '$hourID'" );
	$q->execute();
	echo "<meta http-equiv=Refresh content=0;url=project.php?id={$last_id}>";
	}
	public function delete_expense()
	{
	$hourID = $_GET['expenseid'];
	$q = $this->db->query( "DELETE FROM EXPENSES WHERE ID = '$expenseID'" );
	$q->execute();
	echo "<meta http-equiv=Refresh content=0;url=project.php?id={$last_id}>";
	}
	public function delete_payment()
	{
	$hourID = $_GET['paymentid'];
	$q = $this->db->query( "DELETE FROM PaymentsReceived WHERE ID = '$paymentID'" );
	$q->execute();
	echo "<meta http-equiv=Refresh content=0;url=project.php?id={$last_id}>";
	}
}


?>
