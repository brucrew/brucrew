<?php
session_start();
session_set_cookie_params(0, "/");
setcookie('PHPSESSID', session_id(), 0, '/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>	
<?php
include_once( '../../credentials.php' );
include_once( 'view/view_project.php' );
include_once( 'model/model_project.php' );
include_once( 'controller/controller_auth.php' );

$a = new controller_auth( $username, $password );
$m = new model_page( $username, $password );
$r = new view_page( $username, $password );
include_once( 'template/header.php' );
$a->do_auth( $username, $password );
?>
<?php
if($_SESSION['valid'] == TRUE)
{
//Initialize and set relevant arrays
$OrderID = $_GET['id'];
$ProjectInformation = $m->get_project_information( $OrderID );
$ClientInformation = $m->get_client_information( $OrderID );
$WorkerAssignments = $m->get_assignments_by_project( $OrderID );
$Employees = $m->get_employees( $OrderID );
$ProjectHours = $m->get_hours_by_project( $OrderID );
$ProjectExpenses = $m->get_expenses_by_project( $OrderID );
$ProjectClientPayments = $m->get_client_payments_by_project( $OrderID );

//Process submitted information.
if (isset($_GET['action']))
{
$action = $_GET['action'];
$m->{$action}($_POST);
}

//Start Main Content Here
echo <<<eos
<div class="row">
  <div class="col-md-8">
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
    				<h3 class="panel-title">Project Information</h3>
  			</div>
  			<div class="panel-body">
eos;
				$r->view_project_information( $ProjectInformation );
echo <<<eos
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-info">
				<div class="panel-heading">
    					<h3 class="panel-title">Client Contact Information</h3>
  				</div>
  				<div class="panel-body">
eos;
					$r->view_client_information( $ClientInformation );
echo <<<eos
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-warning">
				<div class="panel-heading">
    					<h3 class="panel-title">Currently Assigned</h3>
  				</div>
  				<div class="panel-body">
eos;
					$r->view_assignments_by_project( $WorkerAssignments );
echo <<<eos
				</div>
			</div>
		</div>
		<div class="col-md-4">
  			<div class="panel panel-warning">
				<div class="panel-heading">
    					<h3 class="panel-title">Assign Other Workers</h3>
  				</div>
  				<div class="panel-body">
eos;
					$r->view_add_assignment( $Employees, $OrderID );
echo <<<eos
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-success">
			<div class="panel-heading">
    				<h3 class="panel-title">Reported Hours</h3>
  			</div>
  			<div class="panel-body">
eos;
				$r->view_hours_by_project( $ProjectHours );
echo <<<eos
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-success">
			<div class="panel-heading">
    				<h3 class="panel-title">Reported Expenses</h3>
  			</div>
  			<div class="panel-body">
eos;
				$r->view_expenses_by_project( $ProjectExpenses );
echo <<<eos
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-success">
			<div class="panel-heading">
    				<h3 class="panel-title">Reported Client Payments</h3>
  			</div>
  			<div class="panel-body">
eos;
				$r->view_client_payments_by_project( $ProjectClientPayments );
echo <<<eos
			</div>
		</div>
	</div>
	
  </div>
  <div class="col-md-4">
  	<div class="panel panel-danger">
		<div class="panel-heading">
    			<h3 class="panel-title">Record Hours</h3>
  		</div>
  		<div class="panel-body">
eos;
			$r->view_submit_hours( $OrderID );
echo <<<eos
		</div>
	</div>
	<div class="panel panel-danger">
		<div class="panel-heading">
    			<h3 class="panel-title">Record Client Payments</h3>
  		</div>
  		<div class="panel-body">
eos;
			$r->view_record_client_payment( $OrderID );
echo <<<eos
		</div>
	</div>
	<div class="panel panel-danger">
		<div class="panel-heading">
    			<h3 class="panel-title">Record Expenses</h3>
  		</div>
  		<div class="panel-body">
eos;
			$r->view_record_expense( $OrderID );
echo <<<eos
		</div>
	</div>
  </div>
</div>
eos;
}
include_once( 'template/footer.php' );
?>