<?php
    require 'vendor/autoload.php';
 
    class SendEmail {
        
        public static function SendMail($to, $subject,$content){

            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            //$key = getenv('SENDGRIP_API_KEY');
            $key = $_ENV['SENDGRID_API_KEY'];
            

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("info@grupodehl.com", "Grupo Dehl");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);
            //$email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try {
                $response = $sendgrid->send($email);
                //print $response->statusCode() . "\n";
                //print_r($response->headers());
                //print $response->body() . "\n";
                return $response;
            }catch(Exception $e){
                echo "Excepción email atrapada: ". $e->getMessage(). "\n";
                return false;
            }
        }
    }
?>