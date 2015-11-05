<?php
class view_page {

public function view_add_projects($project)
{
	echo <<<eos

<center><h1>Add a Project</h1></center><p>If a client does not appear in the dropdown list as you type, add the client first, and then add the project.</p><br><form method="POST"><strong>Start typing in client name and select from the dropdown menu</strong><input type="text" placeholder="Type client name if already in database"><br>Location<textarea></textarea><br>Description<textarea></textarea><br>Data received (YYYY-MM-DD):<input type="text" placeholder="YYYY-MM-DD"><br><input type="submit" value="Add new project"></form>;

eos;
}
}
?>
