<?php
require_once('config.php');
?>

<?php //check whether the user submitted the form
	if(isset($_POST['create'])) {
		$fullname	= $_POST['fullname'];
		$mobilenumber= $_POST['mobilenumber'];
		$emailaddress= $_POST['emailaddress'];
		$Password	= $_POST['Password'];

		//use the db object defined in config
		$sql="INSERT INTO users (fullname, mobilenumber, emailaddress, Password) VALUES(?,?,?,?)";
		$stmtinsert=$db->prepare($sql);
		$result= $stmtinsert->execute([$fullname, $mobilenumber,$emailaddress,$Password]);
		if ($result) {
			echo "successfully saved";
			# code...
		} else {
			# code...
			echo "please try again";
		}
		
		//check if submit button is working-or whether the user has submitted

		//checking the value coming from the forms below
	}
		

	?>