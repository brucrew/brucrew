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
<form method="POST"><strong>Start typing in client name and select from the dropdown menu</strong>
<br>
<input type="text" placeholder="Type client name if already in database">
<br>
<br>
<strong>Location</strong>
<br>
<textarea></textarea>
<br>
<br>
<strong>Description</strong>
<br>
<textarea></textarea>
<br>
<br>
<strong>Date received (YYYY-MM-DD):</strong>
<br>
<input type="text" placeholder="YYYY-MM-DD">
<br>
<br>
<input type="submit" value="Add new project"></form>

eos;
}
}
?>
