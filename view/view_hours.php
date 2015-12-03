<?php

class view_page {


public function view_my_hours( $hours )
	{
		echo "<table class='table table-bordered table-striped'><th style='white-space: nowrap;'>Order ID</th><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Project Description</th><th style='white-space: nowrap;'>Date of Work</th><th style='white-space: nowrap;'>Hours</th><th style='white-space: nowrap;'>Paid</th><th style='white-space: nowrap;'>Amount</th>";
		foreach( $hours as $hour )
		{
			$id = $hour['ID'];
			echo "<tr>";
			foreach($hour as $key => $value)
			{	
				if($key == "OrderID" || $key == "Client" || $key == "Date" || $key == "Hours" || $key == "Amount")
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