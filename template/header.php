
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
$(document).ready(function(){
    $("#users").blur(function(){
        checkValue();
    });
});
</script>
  <script>
  $(function() {
    $('.datepick').each(function(){
    $(this).datepicker();
});
  });
</script>

<script>
function showUser(str) {
var response;
str = document.getElementById('users').value;
var dataList = document.getElementById('client_list');
    if (str == "") {
        document.getElementById("client_list").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4) {
		response = xmlhttp.responseText;
                //document.getElementById("client_list").innerHTML = response;
		var jsonOptions = JSON.parse(response);
		var name = "";
		var number = "";
		//clear datalist
		var parent = document.getElementById("client_list");
        	var childArray = parent.children;
        	var cL = childArray.length;
        	while(cL > 0)
		{
            		cL--;
            		parent.removeChild(childArray[cL]);
        	}
		//end of clear datalist
		for (index = 0; index < jsonOptions.length; ++index)
		{
			name = jsonOptions[index].Name;
			number = jsonOptions[index].ID;
			var numberstring = number.toString();
			//document.write(number);
			//document.write(name);
			var option = document.createElement('option');
			option.value = name;
			option.id = number;
			dataList.appendChild(option);
		}
		
		
            }
        }
        xmlhttp.open("GET","client_list.php?q="+str,true);
        xmlhttp.send();
    }
}

function checkValue()
	{
        var x = $('#users').val();
        var z = $('#client_list');
        var val = $(z).find('option[value="' + x + '"]');
        var endval = val.attr('id');
	var x = Math.floor(endval);
	if(typeof endval !== "undefined")
	{
 		document.getElementById("clientID").value = endval;
		//alert(document.getElementById("clientID").value);
		document.getElementById("askaboutclient").innerHTML = "";
	}
	else
	{ 
        	document.getElementById("clientID").value = "";
		document.getElementById("askaboutclient").innerHTML = "<strong><font color='red'>CLIENT NOT FOUND </font color></strong><input type='button' value='Add Client?' onclick='addClient()'><br>";
	}
        }

function addClient()
{
	document.getElementById("newclient").innerHTML = '<input type="hidden" name="triggernewclient" id="triggernewclient" value="1"><h2>Client Information</h2><br><div class="input-group"><b>First Name: </b><input type="text" name="FirstName"></div><br><div class="input-group"><b>Last Name: </b><input type="text" name="LastName"></div><br><div class="input-group"><b>Email Address: </b><input type="text" name="Email"></div><br><div class="input-group"><b>Phone Number: </b><input type="text" name="Phone"></div><br><div class="input-group"><b>Address: </b><input type="text" name="Address"></div><br><div class="input-group"><b>City: </b><input type="text" name="City"></div><br><div class="input-group"><b>State: </b><input type="text" name="State"></div><br><div class="input-group"><b>Zip: </b><input type="text" name="Zip"></div><br><div class="input-group"><b>Referred By: </b><input type="text" name="Source"></div><br><h2>Project Information</h2>';
}

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
            <li><a href="add_projects.php">Add A Project</a></li>
          </ul>
        </li>
	<li><a href="hours.php">My Hours</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clients<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="clients.php">All Clients</a></li>
            <li><a href="regular_clients.php">My Regular Clients</a></li>
	    <li><a href="addclient.php">Add New Client</a></li>
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