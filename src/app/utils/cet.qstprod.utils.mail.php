<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

/** 
 *
 */
Class CETQstprodMailUtils
{

  private $err_list;

  public function __construct()
  {
    $this->err_list = array();
  }

  public function send($mailFileHTML, $mailFilePlain, $mailListFile, $mailSubjectFile, $fileReader)
  {
    $mailFilePrefix = 'mail/';
    $htmlContent = $fileReader->readAsString($mailFilePrefix.$mailFileHTML);
    $plainContent = $fileReader->readAsString($mailFilePrefix.$mailFilePlain);
    $mailList = $fileReader->read($mailFilePrefix.$mailListFile);
    $mailSubject = $fileReader->readAsString($mailFilePrefix.$mailSubjectFile);
    $mail = new PHPMailer(true); // True = activation des exception phpmailer.

    try 
    {
      $mail->IsSMTP(); 
      $mail->SMTPDebug = 1; 
      $mail->SMTPAuth = true; 
      $mail->SMTPSecure = 'ssl'; 
      $mail->Host = 'mail.gandi.net';
      $mail->Port = 465;
      $mail->Username = "annuaire@castillonnaisentransition.org";
      $mail->Password = "";
      $mail->CharSet = 'UTF-8';
      $mail->setFrom('annuaire@castillonnaisentransition.org', 'CETCAL - Annuaire des producteurs de notre région');

      foreach ($mailList as $adrmail)
      {
        try 
        {
          $mail->addAddress($adrmail);
          $mail->addReplyTo('annuaire@castillonnaisentransition.org', 'CETCAL contact');
          $mail->isHTML(true);
          $mail->Subject = $mailSubject;
          $mail->Body = $htmlContent;
          $mail->AltBody = $plainContent;
          $mail->send();
          
          $mail->ClearAllRecipients();
          $mail->ClearCCs();
          $mail->ClearBCCs();
        }
        catch (Exception $e) 
        {
          array_push($this->err_list, "Erreur envoi Email unitaire: {$mail->ErrorInfo}");
        }
      }
    } 
    catch (Exception $e) 
    {
      array_push($this->err_list, "Erreur envoi Email generale: {$mail->ErrorInfo}");
    }
  }

}