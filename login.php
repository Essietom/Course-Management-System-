// <?php
// 	//Start session
// 	session_start();
	
// 	//Array to store validation errors
// 	$error = array();
	
// 	//Validation error flag
// 	$valid = true;
	
	
// 	//Sanitize the POST values to prevent XSS and SQL Injection
// 	$username = htmlspecialchars(stripslashes($_POST['username']));
// 	$password = htmlspecialchars(stripslashes($_POST['password']));
	
// 	//Input Validations
// 	if($login == '') {
// 		$error[] = 'username is required';
// 		$valid=false;
// 	}
// 	if($password == '') {
// 		$error[] = 'Password is required';
// 		$valid=false;
// 	}
	
// 	//If there are input validations, redirect back to the login form
// 	if($valid==false) {
// 		$_SESSION['ERRMSG_ARR'] = $error;
// 		session_write_close(); 
// 		header("location: index.php");
// 		exit();
// 	}
	
// 	//Create query
// 	$pdo=Database::connect();
// 	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// 	$query="SELECT * FROM user WHERE username=? AND password=?";
// 	$q=$pdo->prepare($query);
// 	$q->execute(array($username,$password));
// 	$data=$q->fetch(PDO::FETCH_ASSOC);
// 	if($data) {
// 		if($q->rowCount() > 0) {
// 			//Login Successful
// 			session_regenerate_id();
// 			$member = mysqli_fetch_assoc($result);
// 			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
// 			$_SESSION['SESS_FIRST_NAME'] = $member['name'];
// 			$_SESSION['SESS_LAST_NAME'] = $member['position'];
// 			//$_SESSION['SESS_PRO_PIC'] = $member['profImage'];
// 			session_write_close();
// 			header("location: main/index.php");
// 			exit();
// 		}else {
// 			//Login failed
// 			header("location: index.php");
// 			exit();
// 		}
// 	}else {
// 		die("Query failed");
// 	}
//         Database::disconnect();



session_start();
$usermail=$_POST['userid'];

$pword=$_POST['pword'];
$valid=true;

if(empty($usermail))
{
	$valid=false;
	echo 'Enter login email'
}




?>