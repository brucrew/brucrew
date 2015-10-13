<?php
class view_page {

public function view_my_projects( $projects )
{
	echo "<center><h1>Projects</h1></center><table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Description</th><th style='white-space: nowrap;'>Location</th><th style='white-space: nowrap;'>My Job</th><th style='white-space: nowrap;'>Completion</th>";
	foreach( $projects as $project )
	{
		$id = $project['ID'];
		echo "<tr>";
		foreach($project as $key => $value)
		{	
			if($key == "Client")
			{
				echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$project['ID']}'>$value</a></td>");
			}
			if($key == "IsComplete")
			{
				if($value == "0")
				{
					echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$project['ID']}'>No</a></td>");
				}
			}
			if($key == "CompleteDate")
			{
				if($value != "0000-00-00")
				{
					echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$project['ID']}'>$value</a></td>");
				}
			}
			if($key == "Description" || $key == "Location" || $key == "Note")
			{
				echo ("<td style='vertical-align: top;'><a href='project.php?id={$project['ID']}'>$value</a></td>");
			}
		}
		echo "</tr>";
	}
	echo "</table>";
	
	
}

}
?>