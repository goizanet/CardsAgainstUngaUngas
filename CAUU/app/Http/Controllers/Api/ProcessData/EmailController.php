<?php

namespace App\Http\Controllers;

require_once ('./vendor/autoload.php');

use Illuminate\Http\Request;

class EmailController extends Controller
{
    //
    public function sendEmail(Request $request) {

        Log::debug($request);

            $from = $request->who;
            $subject = $request->subject;
            $explanation = $request->explanation;
            $photos = $request->images;

        try {
            // Create the SMTP Transport
            $transport = (new Swift_SmtpTransport('smtp.hostname', 25))
                ->setUsername('xxxxxxxx')
                ->setPassword('xxxxxxxx');
            
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            
            // Create a message
            $message = new Swift_Message();
            
            // Set a "subject"
            $message->setSubject($subject);
            
            // Set the "From address"
            $message->setFrom([$from => 'Jugador']);
            
            // Set the "To address" [Use setTo method for multiple recipients, argument should be array]
            $message->addTo('recipient@gmail.com','Administrador');
            
            // Add an "Attachment" (Also, the dynamic data can be attached)
            $attachment = Swift_Attachment::fromPath('example.xls');
            $attachment->setFilename($photos);
            $message->attach($attachment);
            
            // Add inline "Image"
            // $inline_attachment = Swift_Image::fromPath('nature.jpg');
            // $cid = $message->embed($inline_attachment);
            
            // Set the plain-text "Body"
            $message->setBody($explanation);
            
            // Set a "Body"
            // $message->addPart('This is the HTML version of the message.<br>Example of inline image:<br><img src="'.$cid.'" width="200" height="200"><br>Thanks,<br>Admin', 'text/html');
            
            // Send the message
            $result = $mailer->send($message);
            
        } catch (Exception $e) {

            echo $e->getMessage();

        }

    }

}
