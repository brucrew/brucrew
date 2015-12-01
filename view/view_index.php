<?php
class view_page {

	public function view_my_projects( $projects )
	{
		echo "<table class='table table-hover table-bordered table-striped table-condensed'><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Description</th><th style='white-space: nowrap;'>Location</th><th style='white-space: nowrap;'>My Job</th><th style='white-space: nowrap;'>Completion</th>";
		foreach( $projects as $project )
		{
			$id= $project['ID'];
			echo "<tr>";
			foreach($project as $key => $value)
			{
				if($key == "Client")
				{
					echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$id}'>$value</a></td>");
				}
				if($key == "IsComplete")
				{
					if($value == "0")
					{
						echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$id}'>No</a></td>");
					}
				}
				if($key == "CompleteDate")
				{
					if($value != "0000-00-00")
					{
						echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='project.php?id={$id}'>$value</a></td>");
					}
				}
				if($key == "Description" || $key == "Location" || $key == "Note")
				{
					echo ("<td style='vertical-align: top;'><a href='project.php?id={$id}'>$value</a></td>");
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	public function view_my_hours( $hours )
	{
		echo "<table class='table table-bordered table-striped table-condensed'><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Project Description</th><th style='white-space: nowrap;'>Date of Work</th><th style='white-space: nowrap;'>Hours</th><th style='white-space: nowrap;'>Paid</th><th style='white-space: nowrap;'>Amount</th>";
		foreach( $hours as $hour )
		{
			$id = $hour['ID'];
			echo "<tr>";
			foreach($hour as $key => $value)
			{
				if($key == "Client" || $key == "Date" || $key == "Hours" || $key == "Amount")
				{
					echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='hour.php?id={$id}'>$value</a></td>");
				}
				if($key == "Description")
				{
					echo ("<td style='vertical-align: top;'><a href='hour.php?id={$id}'>$value</a></td>");
				}
				if($key == "Paid")
				{
					if($value == '1')
					{
						echo "<td style='white-space: nowrap; vertical-align: top;'><strong>Yes</strong></td>";
					}
					else if($value == '0')
					{
						echo "<td style='white-space: nowrap; vertical-align: top;'><strong>No</strong></td>";
					}
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>
