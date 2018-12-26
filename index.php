<?php
session_start();
require 'Session.php';
//$dbname = 'nestofsaws_chirper';
//require('../../connect.php');

//get all $_SESSION vars
$user_name = Session::get('valid_user');
$usertype = Session::get('usertype');
$fname = Session::get('fname');
$userID = Session::get('userID');
$message = Session::get('message');

//set up root URL to prevent redirect issues
$url = "https://nestofsaws.com/chirper/";

//check to see if user is logged in, cookie is set, and if user is an admin
//  and issue use appropriate navbar
if (($user_name == TRUE) || (isset($_COOKIE['user_name']))) {
	if ((isset($user_name)) && ($usertype == 'standard'))  {
		require_once 'navin.php';
	} elseif ((isset($user_name)) && ($usertype == 'admin'))  {
		require_once 'anavin.php';
	}

//display message if an action was just completed, then dump it to clear on page refresh
if($message == TRUE) {
   echo $message;
   $message = '';
   Session::set('message', $message);
} 


?>

</div><!-- end jumbotron -->

<div class="row">
    	<div class="col-sm-8 col-sm-push-4" id="timeline">
    	<div class="panel panel-warning">
<?php
	//display search results for:
	//	-#hashtag click, @username click, search term submit or standard page load
	// $placeholder is the var for most recent search term
	if (isset($_GET['hashtag'])) {
		$hashtag = "#" . $_GET['hashtag'];
		$hashtag = mysqli_real_escape_string($db, htmlentities(strip_tags($hashtag)));
		$placeholder = $hashtag;
		$sql = "SELECT users.username, users.firstname, users.lastname, cheeps.created_date, cheeps.cheep_text 
			FROM users, cheeps
			WHERE users.user_id=cheeps.user_id 
			AND cheeps.cheep_text LIKE ?
			ORDER BY cheeps.created_date DESC;";
		$search_query = '%' . $hashtag . '%';
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			print "Failed to prepare statement\n";
		} else {
			$stmt->bind_param("s", $search_query);
			$stmt->execute();
			$result = mysqli_stmt_get_result($stmt);
		}
		echo "<div class='panel-heading'><h3>Search results for: <kbd>" . $hashtag . 
			"</kbd>  <a href='" . $url . "home.php' 
			class='btn btn-danger' role='button'>Clear Filters</a></h3></div>";
	} elseif (isset($_GET['user'])) {
		$user = mysqli_real_escape_string($db, htmlentities(strip_tags($_GET['user'])));
		$sql = "SELECT users.username, users.firstname, users.lastname, cheeps.created_date, cheeps.cheep_text 
				FROM users, cheeps
				WHERE users.user_id=cheeps.user_id 
				AND users.username=?
				ORDER BY cheeps.created_date DESC;";
		$search_query = $user;
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			print "Failed to prepare statement\n";
		} else {
			$stmt->bind_param("s", $search_query);
			$stmt->execute();
			$result = mysqli_stmt_get_result($stmt);
		}
		$user = "@" . $_GET['user'];
		$placeholder = $user;
		echo "<div class='panel-heading'><h3>Cheeps by user: <kbd>" . $user . 
			"</kbd>  <a href='" . $url . "home.php' 
			class='btn btn-danger' role='button'>Clear Filters</a></h3></div>";
	} elseif (isset($_GET['term'])) {
		$term = mysqli_real_escape_string($db, htmlentities(strip_tags($_GET['term']))); 

		$placeholder = $term;
		$option = $_GET['option'];
		if ($option == 'following') {
			$sql = "SELECT users.username, users.firstname, users.lastname, cheeps.created_date, cheeps.cheep_text 
					FROM users, cheeps
					WHERE users.user_id=cheeps.user_id 
					AND cheeps.cheep_text LIKE ?
					AND (cheeps.user_id IN (SELECT follows_id FROM follows WHERE user_id=?))
					ORDER BY cheeps.created_date DESC;";
			$search_query = '%' . $term . '%';
			$stmt = mysqli_stmt_init($db);
			if(!mysqli_stmt_prepare($stmt, $sql)) {
				print "Failed to prepare statement\n";
			} else {
				$stmt->bind_param("ss", $search_query, $userID);
				$stmt->execute();
				$result = mysqli_stmt_get_result($stmt);
			}

				echo "<div class='panel-heading'><h3>Search results for: <kbd>" . $term . 
					"</kbd>  <a href='" . $url . "home.php' 
					class='btn btn-danger' role='button'>Clear Filters</a></h3></div>";
		} else {
		
		$sql = "SELECT users.username, users.firstname, users.lastname, cheeps.created_date, cheeps.cheep_text 
						FROM users, cheeps
						WHERE users.user_id=cheeps.user_id 
						AND cheeps.cheep_text LIKE ?
						ORDER BY cheeps.created_date DESC;";
					$search_query = '%' . $term . '%';
				$stmt = mysqli_stmt_init($db);
				if(!mysqli_stmt_prepare($stmt, $sql)) {
					print "Failed to prepare statement\n";
				} else {
					$stmt->bind_param("s", $search_query);
					$stmt->execute();
					$result = mysqli_stmt_get_result($stmt);
				}		
				echo "<div class='panel-heading'><h3>Search results for: <kbd>" . $term . 
				"</kbd>  <a href='" . $url . "home.php'
				class='btn btn-danger' role='button'>Clear Filters</a></h3></div>";
		}
	} else { //normal home.php page load 
		$placeholder = "matching text:";
		$sql = "SELECT users.username, users.firstname, users.lastname, cheeps.created_date, cheeps.cheep_text 
				FROM users, cheeps
				WHERE users.user_id=cheeps.user_id 
				AND (cheeps.user_id IN (SELECT follows_id FROM follows WHERE user_id=?) 
				OR cheeps.user_id=?)
				ORDER BY cheeps.created_date DESC 
				LIMIT 10;";
		$search_query = $userID;	
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			print "Failed to prepare statement\n";
		} else {
			$stmt->bind_param("ss", $search_query, $search_query);
			$stmt->execute();
			$result = mysqli_stmt_get_result($stmt);
		}
    	echo "<div class='panel-heading'><h3>Recent Cheeps:</h3></div>";
	}
	echo "<div class='panel-body'>";
	if ($result) {
		$num_rows = mysqli_num_rows($result);
		if ($num_rows > 0){
			while ($row = mysqli_fetch_row($result)) {
				echo "<div class='panel panel-default'>";
				
				//display info about the Cheep author
				$info_block = "<img src='" . $url . $row[0] . ".jpg' 
					class='img-thumbnail img-responsive pull-left' alt='" . $row[1] . 
					"' width='100'> <div class='panel-heading'><strong>&nbsp &nbsp" . $row[1] . 
					"&nbsp" . $row[2] . "</strong> @" . $row[0] . "<br>&nbsp&nbsp&nbsp";
				
				//make @usernames clickable	in the info block
				$user_reg_ex = "/@+([a-zA-Z0-9_]+)/";
				echo preg_replace($user_reg_ex, '<a href="' . $url . 'home.php?user=$1">$0</a>', $info_block);
				
				echo date('M d g:ia',strtotime($row[3]));
				$cheep_text = stripslashes($row[4]);
				
				//make #hashtags clickable
				$hash_reg_ex = "/#+([a-zA-Z0-9_]+)/";
				$cheep_text = preg_replace($hash_reg_ex, '<a href="' . $url . 'home.php?hashtag=$1">$0</a>', $cheep_text);
				
				//make @usernames clickable	in the Cheep text				
				$cheep_text = preg_replace($user_reg_ex, '<a href="' . $url . 'home.php?user=$1">$0</a>', $cheep_text);
				echo "<br><br><br></div><div class='panel-body'>" . $cheep_text . "</div></div>";
			}

		} else {
			echo "Follow Someone!";
		} 
	}
	//mysql_close($db);
			

?>
		</div> <!-- end timeline panel -->
	</div> <!-- end timeline -->
</div> <!-- end Bootstrap row timeline wrapper -->
<div class="col-sm-4 col-sm-pull-8" id="search">
	<div class="panel panel-warning">
    	<div class="panel-heading"><h3>Search Cheeps:</h3></div>
    	<div class="panel-body">
    		<form role="form" method="get" action="https://nestofsaws.com/chirper/home.php">
				<div class="form-group">
					<label for="search">Are these the droids you're looking for?</label>
					<?php echo "<input type='search' class='form-control' id='search' 
						placeholder='". $placeholder . "' name='term'>"; ?>
				</div>
				<div class="radio">
					<label>
					<?php $option = $_GET['option']?>
					<!-- save search option if selected -->
					<input type='radio' name='option' value='allusers' required id='option' 
						<?php if($option == "allusers") { echo 'checked="checked"';} ?> >				
					&nbspAll users</label>
				</div>
			  	<div class="radio">
					<label>
					<input type='radio' name='option' value='following' required id='option' 
						<?php if($option == "following") { echo 'checked="checked"';} ?> >
						&nbspOnly users I follow</label>
			  	</div>
			  <button type="submit" class="btn btn-default" value="send">Search</button>
			</form>
		</div> <!-- end search panel body -->
    </div> <!-- end search box panel -->
</div> <!-- end search box -->
    
</div><!-- end row -->

</div><!-- end entire Bootstrap container -->

<?php require_once 'footer.php'; 
	
} else {
	require_once 'navout.php';
	echo "<h4 class='text-center'>I find your lack of credentials disturbing.<br>Please log in to view this page.</h4>";
	require_once 'login.php';
}
?>
