<?php

//Recipients
$mail->setFrom('MagnifiscentPerfume@gmail.com', 'MagnifiscentPerfume');

$mail->addAddress('' .   $EMAIL . '');               //Name is optional
$mail->addReplyTo('' .   $EMAIL . '', 'MagnifiscentPerfume');
$mail->addCC('MagnifiscentPerfume@gmail.com');
$mail->addBCC('MagnifiscentPerfume@gmail.com');


$mail->Subject = 'Resend Verification';
$mail->Body    =  '
<body style="border: 0;
box-sizing: content-box;
color: black;
font-size: 20px;
background-color: #8BC6EC;
background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
list-style: none;
padding: 50px;">

        
        <h1 style=" font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase;">Magnifiscent Perfume Station Email</h1>
        <address contenteditable>
            <p>Magnifiscent Perfume Station <br> Email Confirmation (resend) </p>
            <br>
        </address>

        <center>
        <h5>Hello ' . $EMAIL . ' This is your OTP CODE (resend)</h5>

        <h1  style="font-size: 150px;">' . $CODE . '</h1>

        </center>
     
        
    <aside>
        <h1><span contenteditable>Magnifiscent Perfume Station</span></h1>
    </aside>
</body>

';


$mail->AltBody = 'HTML messaging not supported';

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();
