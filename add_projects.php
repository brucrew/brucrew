<?php
session_start();
session_set_cookie_params(0, "/");
setcookie('PHPSESSID', session_id(), 0, '/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<?php
include_once('../../credentials.php');
include_once('view/view_add_projects.php');
include_once('model/model_add_projects.php');
include_once('controller/controller_auth.php');

$a = new controller_auth($username, $password);
$m = new model_page($username, $password);
$r = new view_page($username, $password);
include_once('template/header.php');
$a->do_auth($username, $password);
?>
<?php
if($_SESSION['valid'] == TRUE)
{
if (isset($_GET['action']))
	{
		$action = $_GET['action'];
		$m->{$action}($_POST);
	}
	//Start Main Content Here
	echo <<<eos

		<center>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Add New Project</h3>
						</div>
						<div class="panel-body">
eos;
							echo $r->view_add_projects();
	echo <<<eos
						</div>
					</div>
				</div>
			</div>
		</div>
	</center>

eos;
}
include_once('template/footer.php');
?>
