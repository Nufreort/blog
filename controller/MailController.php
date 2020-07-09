<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/BackOfficeManager.php');
require_once('model/ViewsManager.php');

//----------------- MAILTO ---------------//

Class MailController
{
  public function mailTo($to, $subject, $message)
  	{
      $retour = mail($to, $subject, $message);
      if ($retour)
      {
        $infosMessage = '<p>Votre message a bien été envoyé.</p>';

        $page = 'view/infosMessage.php';
        require('view/template.php');
      }
    }
}
