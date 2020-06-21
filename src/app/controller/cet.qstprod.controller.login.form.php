<?php 
/**
require_once('../model/cdc.sicdcgetuser.model.php');
$email = htmlspecialchars(isset($_POST['qstprod-email']) ? $_POST['qstprod-email'] : "");
$motdepasse = htmlspecialchars(isset($_POST['qstprod-motdepasse']) ? $_POST['qstprod-motdepasse'] : "");
$sicdcGetUser = new SiCdcGetUser();
$data = $sicdcGetUser->getUser($email, $motdepasse);
*/
$statut = 'signupgen.form';
header('Location: /?statut='.$statut);
exit();
?>