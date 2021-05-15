<?php
    require 'vendor/autoload.php';
    class SendEmail {
        public static function SendMail($to, $subject,$content){
            //$key = "";

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("info@grupodehl.com","Grupo Dehl");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid('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');

            try {
                $response = $sendgrid->send($email);
                print $response->statusCode() . "\n";
                print_r($response->headers());
                print $response->body() . "\n";
                return $response;
            }catch(Exception $e){
                echo "Excepción email atrapada: ". $e->getMessage(). "\n";
                return false;
            }
        }
    }
?>