<?php
class view_page {
	public function view_update_client_payment( $client_payment_entry )
	{
		foreach( $client_payment_entry as $payment )
		{
			echo <<<eos
			<form name='editclientpayment' action='?id={$payment['ID']}&action=updateclientpayment' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'>
			<div class="input-group">
				<b>Date: (MM/DD/YYYY): </b><input type="text" class="form-control datepick" name="Date" id="date_2" value="{$payment['Date']}">
			</div>
			<div class="input-group">
				<b>Amount: </b><input type="text" class="form-control" name="Amount" value="{$payment['Amount']}">
			</div>
			<div class="input-group">
				<b>Description: </b><textarea class="form-control" name="Description">{$payment['Description']}</textarea>
			</div>
			<div class="input-group">
				<b>Payment Type: </b>
				<select name="Type" class="form-control">
eos;
					if($payment['Type'] == "Check")
					{
					echo <<<eos
  					<option value="Check" selected>Check</option>
					<option value="Cash">Cash</option>
eos;
					}
					else
					{
					echo <<<eos
  					<option value="Check">Check</option>
					<option value="Cash" selected>Cash</option>
eos;
					}
				echo <<<eos
				</select>
			</div>
			<div class="input-group">
				<br><input type='submit' class="form-control" value='Update Client Payment'></submit>
			</div>
			</form>
eos;
		}
	}
}
?>