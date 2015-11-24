<?php
class view_page {

public function add_new_customer()
{
	echo <<<eos
<form name='addnewcustomer' method='POST' action='?action=addclient'><input type='hidden' name='submitnewcustomer' value='yes'>
<b>First Name: </b><input type="text" name="FirstName"><br><br>
<b>Last Name: </b><input type="text" name="LastName"><br><br>
<b>Email Address: </b><input type="text" name="Email"><br><br>
<b>Phone Number: </b><input type="text" name="Phone"><br><br>
<b>Address: </b><input type="text" name="Address"><br><br>
<b>City: </b><input type="text" name="City"><br><br>
<b>State: </b><input type="text" name="State"><br><br>
<b>Zip: </b><input type="text" name="Zip"><br><br>
<b>Referred By: </b><input type="text" name="Source"><br><br>
<input type='submit' value='Add Customer'></submit>
</form>
eos;
}
}
?>