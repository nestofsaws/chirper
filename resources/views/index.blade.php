@extends('layouts.app')
@section('content')
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
@endsection