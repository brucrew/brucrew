<?php
class view_page {

	public function view_my_projects( $projects )
	{
		echo "<table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Description</th><th style='white-space: nowrap;'>Location</th><th style='white-space: nowrap;'>My Job</th><th style='white-space: nowrap;'>Completion</th>";
		foreach( $projects as $project )
		{
			$id= $project['ID'];
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

	public function view_hours_by_project( $hours )
	{
		echo "<table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Name</th><th style='white-space: nowrap;'>Date</th><th style='white-space: nowrap;'>Hours</th><th style='white-space: nowrap;'>Note</th><th style='white-space: nowrap;'>Paid</th><th style='white-space: nowrap;'>Delete Hour</th>";
		foreach( $hours as $hour )
		{
			echo "<tr>";
			$hourID = $hour['ID'];
			foreach($hour as $key => $value)
			{
				if($key == "Paid")
				{
					if($value == '1')
					{
						echo "<td style='vertical-align: top;'><strong>Yes</strong></td>";
					} else if($value == '0') {
						echo "<td style='vertical-align: top;'><strong>No</strong></td>";
					}
				}
				if($key == "OrderID")
				{
					echo "";
				}
				if($key == "Name" || $key == "Date" || $key == "Hours" || $key == "Note")
				{
					echo ("<td style='vertical-align: top;'><a href='hour.php?id={$hourID}'>$value</td>");
				}
			}
			$i++;
			echo "<td style='vertical-align: top;'><strong><a href='hour.php?id={$hourID}&action=delete'><font color='red'>Delete Hour</a></font></strong></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>
