<?php include(dirname(__FILE__) . '/../../../wp-load.php');
extract($_POST);
global $wpdb;

//check for dublicates
$isset_email = $wpdb->get_results("SELECT * FROM `vashishta_newsletter` WHERE `email` = '$email'");
if (empty($isset_email)) {
	$return = $wpdb->insert(
		'vashishta_newsletter',
		array(
			'email' => $email
		), 
		array(
			'%s'
		)
	);	
	$to = 'vasiyoga@gmail.com';
	$subj = 'User '.$email. ' just subscribed for news';
	$message = 'Dear, admin! User '.$email. ' just subscribed for news';
	wp_mail( $to, $subj, $message);
} else {
	$return = 'email_exists';
}




echo $return;
?>