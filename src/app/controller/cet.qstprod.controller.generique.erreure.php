<?php
$err = isset($_GET['err']) ?  htmlentities(htmlspecialchars($_GET['err'])) : "Erreure technique rencontrée.";
$cetcal_session_id = isset($_GET['sitkn']) ? htmlentities(htmlspecialchars($_GET['sitkn'])) : "";
header('Location: /?statut=generique.erreur&sitkn='.$cetcal_session_id.'&err='.$err);
exit();