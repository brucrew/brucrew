<?php
session_start();
session_set_cookie_params(0, "/");
setcookie('PHPSESSID', session_id(), 0, '/');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>	
<?php
include_once( '../../credentials.php' );
include_once( 'view/view_regular_clients.php' );
include_once( 'model/model_regular_clients.php' );
include_once( 'controller/controller_auth.php' );

$a = new controller_auth( $username, $password );
$m = new model_page( $username, $password );
$r = new view_page( $username, $password );
include_once( 'template/header.php' );
$a->do_auth( $username, $password );

//Process submitted information.
if (isset($_GET['action']))
{
$action = $_GET['action'];
$m->{$action}($_GET);
}

$my_clients = $m->get_my_regular_clients();

?>
<?php
if($_SESSION['valid'] == TRUE)
{
//Start Main Content Here

echo $r->view_my_clients( $my_clients );

}
include_once( 'template/footer.php' );
?>