<?php
class view_page {

	public function view_add_projects()
	{
		echo <<<eos

	<center>
		<h1>Add a Project</h1>
	</center>
	<p>If a client does not appear in the dropdown list as you type, add the client first, and then add the project.</p>
	<br>
	<form method="POST" action="?action=addorder"><strong>Start typing in client name and select from the dropdown menu</strong>
	<br>
	<input type="text" name="Name" size="40" placeholder="Type client name if already in database">
	<br>
	<br>
	<strong>Location</strong>
	<br>
	<textarea name="Location"></textarea>
	<br>
	<br>
	<strong>Description</strong>
	<br>
	<textarea name="Description"></textarea>
	<br>
	<br>
	<strong>Date received (YYYY-MM-DD):</strong>
	<br>
	<input type="text" name="DateReceived" placeholder="YYYY-MM-DD">
	<br>
	<br>
	<input type="submit" value="Add new project">
	</form>

eos;
	}
}
?>
