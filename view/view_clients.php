<?php
class view_clients {
	public function view_all_clients( $clients )
	{
	echo "<center><h1>Clients</h1></center><table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>Name</th><th style='white-space: nowrap;'>Phone</th><th style='white-space: nowrap;'>Email</th><th style='white-space: nowrap;'>Address</th><th style='white-space: nowrap;'>Referred By</th>";
	foreach( $clients as $client )
	{
		$id = $client['ID'];
		echo "<tr>";
		foreach($client as $key => $value)
		{	
			if($key == "Name" || $key == "Phone" || $key == "Email")
			{
				echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='clientadmin.php?id={$client['ID']}'>$value</a></td>");
			}
			if($key == "Address" || $key == "Source")
			{
				echo ("<td style='vertical-align: top;'><a href='clientadmin.php?id={$client['ID']}'>$value</a></td>");
			}
		}
		echo "</tr>";
	}
	echo "</table>";
	
	
}
}
?>