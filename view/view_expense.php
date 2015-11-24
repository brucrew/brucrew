<?php
class view_page {
	public function view_update_expense( $expense_entry )
	{
		foreach( $expense_entry as $expense )
		{
			echo <<<eos
			<form name='editexpense' action='?id={$expense['ID']}&action=updateexpense' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>
			<div class="input-group">
				<b>Date: (MM/DD/YYYY): </b><input type="text" class="form-control datepick" name="Date" id="date_2" value="{$expense['Date']}">
			</div>
			<div class="input-group">
				<b>Amount: </b><input type="text" class="form-control" name="Amount" value="{$expense['Amount']}">
			</div>
			<div class="input-group">
				<b>Description: </b><textarea class="form-control" name="Description">{$expense['Description']}</textarea>
			</div>
			<div class="input-group">
				<b>Payment Type: </b>
				<select name="BruCrewCard" class="form-control">
eos;
					if($expense['BruCrewCard'] == 1)
					{
					echo <<<eos
  					<option value="1" selected>Paid with BruCrew Card</option>
					<option value="0">I paid and will need to be reimbursed</option>
eos;
					}
					else
					{
					echo <<<eos
  					<option value="1">Paid with BruCrew Card</option>
					<option value="0" selected>I paid and will need to be reimbursed</option>
eos;
					}
				echo <<<eos
				</select>
			</div>
			<div class="input-group">
				<br><input type='submit' class="form-control" value='Update Expense'></submit>
			</div>
			</form>
eos;
		}
	}
}
?>