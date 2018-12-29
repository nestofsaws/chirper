<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>the Wars Star Social Network</title>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
    <!-- AngularJS Library -->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>

    <!-- Local styles for this page -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
</head>
<body ng-app>

    <nav class="navbar navbar-expand-sm jumbotron-colors">
      <a class="navbar-brand yellow" href="/chirper/">Chirper</a>
	  
		<!-- Toggler/collapsibe Button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	  <i class='fas fa-bars yellow' ></i>

	  </button>
	  
	  <!-- Navbar links -->
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
		  <a class="btn btn-outline-light" href="#"><span class="glyphicon glyphicon-log-in"></span> Log In</a>
		  </li>
		</ul>
	  </div>
	</nav>
	

<div class="container mt-4">
<div class="jumbotron jumbotron-colors">
  <h1 class="text-center">@ Chirper *</h1>
  <br><p class='text-center'>I find your lack of credentials disturbing.<br>Please log in to view this page.</p>  
</div><!-- end jumbotron -->
  
       <div class="row pb-4">
		<div class="col-md-6 offset-md-3">
			<div class="card">
			  <div class="card-header"><h3>Log In</h3></div>
			  <div class="card-body">
			  <form role="form" action="#" method="post">
				<div class="form-group">
				  <label for="username">Username:</label>
				  <div class="input-group input-group-lg">
					 <span class="input-group-text"><i class='fas fa-at'></i></span>
					 <input type="text" class="form-control" placeholder="username" autofocus name="username" required>
				  </div>
				</div>
				<div class="form-group">
				  <label for="pwd">password:</label>
				  <div class="input-group input-group-lg">
					 <span class="input-group-text"><i class='fas fa-lock'></i></span>
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
		</div>
		</div>
  

</div>

  <footer class="footer">
      <div class="container">
        <p class="text-center foot-note">Copyright 2019 Imperial Web Development</p>
      </div>
    </footer>
    
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 </body>
</html>