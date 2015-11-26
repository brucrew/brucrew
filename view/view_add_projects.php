<?php
class view_page {

	public function view_add_projects()
	{
		echo <<<eos

		<p><em>If a client does not appear in the dropdown list as you type, add the client first, and then add the project.</em></p>
		<form method="POST" action="?action=user_add_order"><strong>Start typing in client name and select from the dropdown menu</strong>
		<div class="input-group">
			<input type="text" class="form-control" name="Name" size="40" placeholder="Type client name if already in database">
		</div>
		<br>
		<div class="input-group">
			<strong>Location</strong>
			<textarea name="Location" class="form-control"></textarea>
		</div>
		<br>
		<div class="input-group">
			<strong>Description</strong>
			<textarea name="Description" class="form-control"></textarea>
		</div>
		<br>
		<div class="input-group">
			<strong>Date received (MM/DD/YYYY): </strong>
			<input type="text" name="DateReceived" class="datepick">
		</div>
		<br>
		<div class="input-group">
		<input type="submit" class="form-control" value="Add Project">
		</div>
		</form>

eos;
	}
}
?>
