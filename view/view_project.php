<?php
class view_page {

public function view_project_information( $orders )
{
	echo "<tr><table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Name</th><th style='white-space: nowrap;'>Date</th><th style='white-space: nowrap;'>Location</th><th style='white-space: nowrap;'>Description</th></tr>";
	foreach( $orders as $order )
	{
		echo "<tr>";
		foreach($order as $key => $value)
		{	
			if($key == "Name" || $key == "Date")
			{
				echo ("<td style='white-space: nowrap; vertical-align: top;'>$value</td>");
			}
			if($key == "Description" || $key == "Location")
			{
				echo ("<td style='vertical-align: top;'>$value</td>");
			}
		}
		echo "</tr>";
	}
		echo "</table>";
		$isComplete = $order['IsComplete'];
		$completeDate = $order['CompleteDate'];
		$completedBy = $order['EmployeeName'];
		$id = $order['ID'];
	
	if($isComplete == "1")
	{
		echo "<strong>Marked as Completed on " . $completeDate . " by " . $completedBy . "</strong>";
	}
	else
	{
	echo "<form name='complete' action='?id={$id}&action=complete' method='POST'><input type='hidden' name='OrderID' value='{$id}'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>Enter Completion Date (Must be 'YYYY-MM-DD'):  <input type='text' name='CompleteDate' class='datepick' id='date_1'>&nbsp&nbsp<input type='submit' value='Mark Completion'></form>";
	}
	
	
}

public function view_client_information( $client )
{
	foreach( $client as $user )
	{
	echo "Name: {$user[Name]}";
	echo "<br>Phone: {$user[Phone]}";
	echo "<br>Email: {$user[Email]}";
	echo "<br><br>{$user[Address]}<br>{$user[City]}, {$user[State]}, {$user[Zip]}";
	}
}

public function view_assignments_by_project( $assignments )
{
	//echo "<ul class='list-group'>";
	foreach( $assignments as $assignment )
	{
		foreach($assignment as $key => $value)
		{
			echo "<li>";
			echo $value;
			echo "</li>";
		}
	}
	//echo "</ul>";
}

public function view_add_assignment ( $employees, $OrderID )
{
	echo "<form name='addemployee' action='?id={$OrderID}&action=assign' method='POST'><input type='hidden' name='OrderID' value='{$OrderID}'><select name='EmployeeID'>";
	foreach( $employees as $employee )
	{
		echo "<option name= '{$employee['Name']}' value='{$employee['ID']}'>{$employee['Name']}</option>";
	}
	echo "</select><br><br><input type='submit' value='Assign Employee'></submit></form>";
}

public function view_hours_by_project( $hours )
{
	echo "<table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Name</th><th style='white-space: nowrap;'>Date</th><th style='white-space: nowrap;'>Hours</th><th style='white-space: nowrap;'>Note</th><th style='white-space: nowrap;'>Paid</th><th style='white-space: nowrap;'>Delete Hour</th>";
	foreach( $hours as $hour )
	{
		echo "<tr>";
		$hourID = $hour['ID'];
		$employeeID = $hour['EmployeeID'];
		foreach($hour as $key => $value)
		{	
			if($key == "Paid")
			{
				if($value == '1')
				{
					echo "<td style='vertical-align: top;'><strong>Yes</strong></td>";
				}
				else if($value == '0')
				{
					echo "<td style='vertical-align: top;'><strong>No</strong></td>";
				}
			}
			if($key == "OrderID")
			{
				echo "";
			}
			if($key == "Name" || $key == "Date" || $key == "Hours" || $key == "Note")
			{
			echo ("<td style='vertical-align: top;'><a href='hour.php?id=$hourID'>$value</td>");
			}
		}
		$i++;
		echo "<td style='vertical-align: top;'><strong><a href='hour.php?id=$hourID&employeeID=$employeeID&projectID={$_GET['id']}&action=delete'><font color='red'>Delete Hour</a></font></strong></td>";
		echo "</tr>";
		
	}
	echo "</table><br>";
}

public function view_expenses_by_project( $expenses )
{
	echo "<table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>ID</th><th style='white-space: nowrap;'>Reported By</th><th style='white-space: nowrap;'>Amount</th><th style='white-space: nowrap;'>Date</th><th style='white-space: nowrap;'>Description</th><th style='white-space: nowrap;'>BruCrew Card?</th><th style='white-space: nowrap;'>Delete Expense</th>";
	foreach( $expenses as $expense )
	{
		echo "<tr>";
		$expenseID = $expense['ID'];
		foreach($expense as $key => $value)
		{	
			if($key == "BruCrewCard")
			{
				if($value == '1')
				{
					echo "<td style='vertical-align: top;'><strong>Yes</strong></td>";
				}
				else if($value == '0')
				{
					echo "<td style='vertical-align: top;'><strong>No</strong></td>";
				}
			}
			else
			{
				echo ("<td style='vertical-align: top;'><a href='expense.php?id=$expenseID'>$value</a></td>");
			}
		}
		echo "<td style='vertical-align: top;'><strong><a href='expense.php?id=$expenseID&projectID={$_GET['id']}&action=delete'><font color='red'>Delete Expense</a></font></strong></td>";
		echo "</tr>";
		
	}
	echo "</table>";
}

public function view_client_payments_by_project( $payments )
{
	echo "<table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Reported By</th><th style='white-space: nowrap;'>Date</th><th style='white-space: nowrap;'>Amount</th><th style='white-space: nowrap;'>Description</th><th style='white-space: nowrap;'>Payment Type</th><th style='white-space: nowrap;'>Delete Payment</th>";
	foreach( $payments as $payment )
	{
		echo "<tr>";
		$paymentID = $payment['ID'];
		foreach($payment as $key => $value)
		{	
			if($key == "ID")
			{

			}
			else
			{
				echo ("<td style='vertical-align: top;'><a href='client_payment.php?id=$paymentID'>$value</a></td>");
			}
		}
		echo "<td style='vertical-align: top;'><strong><a href='client_payment.php?id=$paymentID&projectID={$_GET['id']}&action=delete'><font color='red'>Delete Payment</a></font></strong></td>";
		echo "</tr>";
		
	}
	echo "</table>";
}

public function view_submit_hours( $OrderID )
{
	echo <<<eos
	<form name='addnewhours' action='?id={$OrderID}&action=addhours' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>
	<div class="input-group">
		<b>Date: (MM/DD/YYYY): </b><input type="text" class="form-control datepick" name="Date" id="date_2" placeholder="MM/DD/YYYY">
	</div>
	<div class="input-group">
		<b>Time In: </b><input type="text" class="form-control" name="TimeIn">
	</div>
	<div class="input-group">
		<b>Time Out: </b><input type="text" class="form-control" name="TimeOut">
	</div>
	<div class="input-group">
		<b>Total Hours: </b><input type="number" step="any" class="form-control" name="Hours" placeholder="Use Decimal, ex. 3 or 3.5">
	</div>
	<div class="input-group">
		<b>Description: </b><textarea class="form-control" name="Description" placeholder="Add a description of the work done"></textarea>
	</div>
	<div class="input-group">
		<br><input type='submit' class="form-control" value='Add Hours'></submit>
	</div>
	</form>
eos;
}

public function view_record_client_payment( $OrderID )
{
	echo <<<eos
	<form name='addclientpayment' action='?id={$OrderID}&action=addclientpayment' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>
	<div class="input-group">
		<b>Date: (YYYY-MM-DD): </b><input type="text" name="PaymentDate" class="form-control datepick" placeholder="YYYY-MM-DD" id='paymentdate'>
	</div>
	<div class="input-group">
		<b>Amount: (No dollar sign)</b><input type="number" step="any" class="form-control" name="PaymentAmount">
	</div>
	<div class="input-group">
		<b>Payment Type: </b>
		<select name="PaymentType" class="form-control">
  			<option value="Check">Check</option>
  			<option value="Cash">Cash</option>
  			<option value="Other">Other</option>
		</select>
	</div>
	<div class="input-group">
		<b>Description: </b><textarea name='Note' class="form-control" placeholder="Add any notes about the payment"></textarea>
	</div>
	<div class="input-group">
		<br><input type='submit' value='Record Payment' class="form-control"></submit>
	</div>
	</form>
eos;
}

public function view_record_expense( $OrderID )
{
	echo <<<eos
	<form name='addexpense' action='?id={$OrderID}&action=addexpense' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>
	<div class="input-group">
		<b>Date: (YYYY-MM-DD): </b><input type="text" name="ExpenseDate" class="form-control datepick" placeholder="YYYY-MM-DD">
	</div>
	<div class="input-group">
		<b>Amount: (No dollar sign)</b><input type="number" step="any" class="form-control" name="ExpenseAmount">
	</div>
	<div class="input-group">
		<b>Description: </b><textarea name='ExpenseDescription' class="form-control" placeholder="Add a description of what was purchased"></textarea>
	</div>
	<div class="input-group">
		<b>Payment Type: </b>
		<select name="BruCrewCard" class="form-control">
			<option value="1">Paid with BruCrew Card</option>
			<option value="0">I paid and will need to be reimbursed</option>
		</select>
	</div>
	<div class="input-group">
		<br><input type='submit' class="form-control" value='Record Expense'></submit>
	</div>
	</form>
eos;
}

}
?>