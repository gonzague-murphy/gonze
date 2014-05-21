<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class NewsletterController extends Controller{
    
    public function displayNewsletterAdmin(){
        $this->view->displayNewsletterAdmin();
    }
    
    public function getSubscribers(){
        return $result = $this->getRepository('Newsletter')->selectSubscriberEmail();
    }
    
    public function sendNewsletterAdmin(){
        if(isset($this->arrayPost)){
            $this->clean($this->arrayPost);
            $members = $this->getSubscribers();
            $this->checkForEmptyFields();
            if(empty($this->msg)){
                foreach($members as $key=>$value){
                    $this->makeNewsletterAdmin($value->email, $this->arrayPost['sujet'], $this->arrayPost['message']);
                }
                $this->view->displayNewsletterAdmin('Merci, la newsletter a bien étée envoyée aux '.sizeof($members).' membres inscrits');
            }
            else{
                $this->view->displayNewsletterAdmin($this->msg);
            }
        }
    }
    
    public function makeNewsletterAdmin($destinataire, $subject, $letter){
        $to = $destinataire;
        $subject = $subject;
        $message = '<html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>'.$subject.'</title>
        </head>
        <body>
        '.$letter.'
        </body>
        </html>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $headers .= 'From: "Lokisalle" <oncesbo@hotmail.fr>' . "\r\n";

    $mail = mail($to, $subject, $message, $headers); //marche
    //var_dump($message);
    if($mail){
        return true;
    }
    else{
        return false;
        }
    }
    
    public function thanks(){
        $this->view->displaySubscribe();
    }
    
    public function subscribe(){
        //var_dump($this->view);
        $user = \Component\UserSessionHandler::getUser();
        $check = $this->checkDoubleSubscribe($user->id_membre);
        if($check !== 1){
            $this->getRepository('Newsletter')->insertSubscriber($user->id_membre);
            header("location: ?controller=NewsletterController&action=thanks&msg=1");
            exit();
        }
        else{
            header("location: ?controller=NewsletterController&action=thanks&msg=2");
            exit();
        }
    }
    
    public function checkDoubleSubscribe($userId){
        $result = $this->getRepository('Newsletter')->checkDouble($userId);
        return $result;
    }
}

