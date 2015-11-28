<?php
session_start();
session_set_cookie_params(0, "/");
setcookie('PHPSESSID', session_id(), 0, '/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>	
<?php
include_once( '../../credentials.php' );
include_once( 'view/view_index.php' );
include_once( 'model/model_index.php' );
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
		$EmployeeID = $_SESSION['UserID'];
		$my_projects = $m->get_my_projects();
		$my_hours = $m->get_my_hours();
		echo "Employee ID = " . $EmployeeID;
		echo "<br>";
		echo $my_hours;
		//Start Main Content Here
		echo <<<eos
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Projects</h3>
							</div>
							<div class="panel-body">
eos;
								$r->view_my_projects( $my_projects );
		echo <<<eos
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Recent Hours</h3>
							</div>
							<div class="panel-body">
eos;
								$r->view_my_hours( $project_hours );
		echo <<<eos
							</div>
						</div>
					</div>
				</div>
			</div>
eos;
	}
include_once( 'template/footer.php' );
?>
