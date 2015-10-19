
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../bootstrapsource/favicon.ico">

    <title>BruCrew</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrapsource/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../bootstrapsource/dist/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../bootstrapsource/docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrapsource/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $('.datepick').each(function(){
    $(this).datepicker();
});
  });
  </script>

  </head>

  <body role="document">


    <!-- Fixed navbar -->
<nav class="navbar navbar-default" style="background-color: #536300; background-image: none;">
  <div class="container">

<div class="jumbotron" style="background-image: url('http://vabrucrew.files.wordpress.com/2014/01/cropped-dscn4976.jpg');
    background-color: #cccccc;">
        <img src="http://vabrucrew.files.wordpress.com/2013/12/logoforweb-copyshort.png" height="100" width="300">
      </div>

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background-image: -webkit-linear-gradient(top,#f8f8f8 0,#f8f8f8 100%);">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="my_projects.php">My Projects</a></li>
            <li><a href="#">Add A Project</a></li>
          </ul>
        </li>
	<li><a href="#">My Hours</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clients<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">All Clients</a></li>
            <li><a href="#">My Regular Clients</a></li>
	    <li><a href="#">Add New Client</a></li>
          </ul>
        </li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Profile<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Edit</a></li>
            <li><a href="#">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container theme-showcase" role="main" style="background-image: -webkit-linear-gradient(top,#ffffff 0,#ffffff 100%); min-height: 600px;">