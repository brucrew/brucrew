<?php
$username = 'user';
$password = 'brucrew2015';
$text = $_GET['q'];
$db = new PDO( 'mysql:host=localhost;dbname=BruCrew;charset=utf8', $username, $password, array( PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );	
$q = $db->query( "SELECT ID, CONCAT(FirstName, ' ', LastName) as Name FROM Customers as c WHERE CONCAT(FirstName, ' ', LastName) LIKE '%$text%' ORDER BY LastName Asc" );
$clients = $q->fetchAll( PDO::FETCH_ASSOC );

$names = array();
$numbers = array();

echo json_encode($clients);

?>