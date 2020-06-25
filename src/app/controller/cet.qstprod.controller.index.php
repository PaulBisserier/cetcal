<?php
$status = htmlspecialchars(isset($_GET['status']) ? $_GET['status'] : '');
$status = $status === '' ? 'login' : $status;
$ticketUtlr = null;
$refutlrCdc = htmlspecialchars(isset($_GET['refutlr']) ? $_GET['refutlr'] : '');