<?php
if (isset($_POST['update'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$message = strip_tags($_POST['message']);
    echo $email;


}
?>