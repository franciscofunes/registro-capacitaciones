<?php
    require 'vendor/autoload.php';
    class SendEmail {
        public static function SendMail($to, $subject,$content){
            $key = "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";

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("ffunes90@gmail.com","Grupo Dehl - Registro exitoso");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo "Excepción email atrapada: ". $e->getMessage(). "\n";
                return false;
            }
        }
    }
?>