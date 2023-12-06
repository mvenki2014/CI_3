<?php

require 'mailgun-php/vendor/autoload.php';
use Mailgun\Mailgun;
class Email_model extends CI_Model
{
    /**
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public final function sendPatlistApiDownEmail()
    {
        $mg = Mailgun::create(MAILGUN_KEY);
        $date = date('Y-m-d H:i:s');
        $esubject2 = "Patlist API is Down";
        $message_info2 = "Hi,<br/><p>Patlist API is currently down for Book doctor appointment.<br/><br/>
                        Event timestamp: " . $date . "(IST)</p> Thanks and Regards<br/> Yashoda Hospitals";

        // Send mail to admin
        $params12 = [
            'from' => YH_ADMIN_EMAIL,
            'to' => 'yashoda.digital@gmail.com',
            'cc' => 'query.yashoda@gmail.com, durgaprasad@yashodamail.com, nageswara.rao@yashodamail.com, jeevan.k@yashodamail.com',
            'subject' => $esubject2,
            'html' => $message_info2
        ];

        $mg->messages()->send(YH_EMAIL_SERVER, $params12);
    }
}
