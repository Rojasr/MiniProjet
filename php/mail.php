<?php
	error_reporting(E_NOTICE);

	function valid_email($str)
	{
		return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
	}

	if($_POST['sujet']!='' && $_POST['email']!='' && valid_email($_POST['email'])==TRUE && strlen($_POST['message'])>30)
	{
		$to = 'testcontact@yopmail.fr';
		$headers = 'From: '.$_POST['email'];
		$subject = "[DUT1+1] ".$_POST['sujet']." vous a laiss&eacute; un message.";
		$message = htmlspecialchars($_POST['message']);
		if(mail($to, $subject, $message, $headers))
		{
			header('Location: ../mail.html');
		}
		else {
			echo "Erreur, message non envoy&eacute;;. Contactez l'administrateur.";
		}
	}
	else {
		echo 'Erreur, vous n&#146;avez soit: pas rempli correctement tout les champs, 
		entrer un email invalide ou un message de moins de 30 caract&#232;re.';
	}
?> 