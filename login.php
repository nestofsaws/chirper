<?php
//session_start();

require_once 'Session.php';
$user_name = Session::get('valid_user');

//make sure user isn't logged in already
if (($user_name == TRUE) || (isset($_COOKIE['user_name']))) {
	header ("Location: home.php");
	exit();
} elseif ($user_name == FALSE) {
	require_once 'navout.php';
?>
  </div><!-- end jumbotron -->
  
  
  <div class="row">
   <div class="col-sm-4"></div>
    <div class="col-sm-4 center-block">
   
   <div class="panel panel-warning">
   <div class="panel-heading"><h3>Log In</h3></div>
<div class="panel-body"> 

  <form role="form" action="logger.php" method="post">
	<div class="form-group">
	  <label for="username">Username:</label>
	  <div class="input-group input-group-lg">
		 <span class="input-group-addon"><strong>@</strong></span>
		 <input type="text" class="form-control" placeholder="username" autofocus name="username" required>
	  </div>
	</div>
	<div class="form-group">
	  <label for="pwd">password:</label>
	  <div class="input-group input-group-lg">
		 <span class="input-group-addon glyphicon glyphicon-lock"></span>
		 <input type="password" class="form-control" placeholder="Password" name="password" required>
	  </div>
	</div>
	<div class="checkbox">
	  <label><input type="checkbox" name="rememberme"> Remember me</label>
	</div>
	<button type="submit" class="btn btn-default">
		Move along, move along 
		<span class="glyphicon glyphicon-log-in"></span></button>
  </form>

   </div>
</div>
  
  <div class="col-sm-4"></div>
  </div>
  </div>
</div>

<?php 
  require_once 'footer.php';
} else {
	header("Location: home.php"); 
}

?>
