<?php
class view_page {

	public function view_add_projects()
	{
		echo <<<eos

	<div id="clientlist">
	<p><em>If a client does not appear in the dropdown list as you type, add the client first, and then add the project.</em></p>
	<form method="POST" action="?action=user_add_order">
<div id="newclient">
	<strong>Start typing in client name and select from the dropdown menu</strong>
	<div class="input-group">
		<input name="users" id="users" list="client_list" type="text" class="form-control" size="40" onkeyup="showUser(this.value)" data-value="">
		<datalist id="client_list">
		<option value="" data-value=""></option>
		</datalist>
	</div>
	<input type="hidden" name="clientID" id="clientID" value="">
	<br>
	<span id="askaboutclient"></span>
</div>
	<div class="input-group">
		<strong>Location</strong>
		<textarea name="Location" class="form-control"></textarea>
	</div>
	<br>
	<div class="input-group">
		<strong>Description</strong>
		<textarea name="Description" class="form-control"></textarea>
	</div>
	<br>
	<div class="input-group">
		<strong>Date received (YYYY-MM-DD):</strong>
		<input type="text" class="form-control datepick" name="DateReceived" placeholder="YYYY-MM-DD">
	</div>
	<br>
	<div class="input-group">
	<input type="submit" class="form-control datepick" value="Add new project">
	</div>
	</form>
	<div class="input-group">
	<br><input type="button" name="check" value="check" class="form-control" onclick="checkValue()">
	</div>

eos;
	}
}
?>
