<?php
class view_page {

public function view_my_clients( $clients )
{
	echo "<center><h1>Regular Clients</h1><a href='clients.php'><strong><font color='red'>Add A Regular Client</strong></font></a><br><br></center><table class='table table-hover table-bordered table-striped'><th style='white-space: nowrap;'>ID</th><th style='white-space: nowrap;'>Client</th><th style='white-space: nowrap;'>Remove Regular Client</th>";
	foreach( $clients as $client )
	{
		$id = $client['ClientID'];
		echo "<tr>";
		foreach($client as $key => $value)
		{	
			if($key == "Client" || $key == "ID")
			{
				echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='client.php?id={$client['ClientID']}'>$value</a></td>");
			}
		}
			echo ("<td style='white-space: nowrap; vertical-align: top;'><a href='regular_clients.php?action=delete&id={$client['ID']}'><strong><font color='red'>Delete</strong></font></a></td>");
		echo "</tr>";
	}
	echo "</table>";
	
	
	}
}
?>