<?php
class view_page {
	public function view_update_hour( $hour_entry )
	{
		foreach( $hour_entry as $hour )
		{
			if($hour['Paid'] != 1 && $hour['EmployeeID'] == $_SESSION['UserID'])
			{
			echo <<<eos
			<form name='edithour' action='?id={$hour['ID']}&action=updatehour' method='POST'><input type='hidden' name='EmployeeID' value='{$_SESSION['UserID']}'><input type='hidden' name='OrderID' value='{$hour['OrderID']}'>
			<div class="input-group">
				<b>Date: (MM/DD/YYYY): </b><input type="text" class="form-control datepick" name="Date" id="date_2" value="{$hour['Date']}">
			</div>
			<div class="input-group">
				<b>Time In: </b><input type="text" class="form-control" name="TimeIn" value="{$hour['TimeIn']}">
			</div>
			<div class="input-group">
				<b>Time Out: </b><input type="text" class="form-control" name="TimeOut" value="{$hour['TimeOut']}">
			</div>
			<div class="input-group">
				<b>Total Hours: </b><input type="number" step="any" class="form-control" name="Hours" value="{$hour['Hours']}">
			</div>
			<div class="input-group">
				<b>Description: </b><textarea class="form-control" name="Note">{$hour['Note']}</textarea>
			</div>
			<div class="input-group">
				<br><input type='submit' class="form-control" value='Update Hours'></submit>
			</div>
			</form>
eos;
			}
			else
			{
				echo "This hour entry has either been marked as paid or does not belong to you and and cannot be edited.";
			}
		}
	}
}
?>