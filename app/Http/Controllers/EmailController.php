<?php

namespace App\Http\Controllers;

use App\Models\WaitingListEmail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendNewsLetter(Request $request)
    {
        $RECIPIENT_EMAIL = $request->mail;
        //sql_query("INSERT INTO pfleger_mails1 (email) VALUES (?)", $conn, array($RECIPIENT_EMAIL), "s");

        $apikey = 'b004c32ff973f580fdf05664cc46d6a9';
        $apisecret = '53acf493fd44a88a8c2f9be31b20f7de';



        $SENDER_EMAIL = "info@curawork.online";

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $SENDER_EMAIL,
                        'Name' => "Das Curawork Team!"
                    ],
                    'To' => [
                        [
                            'Email' => $RECIPIENT_EMAIL,
                            'Name' => "RECIPIENT_NAME"
                        ]
                    ],
                    'TemplateID' => 1644871,
                    'TemplateLanguage' => true,
                    'Subject' => "Willkommen bei Curawork !",
                    //'Variables' => json_decode('{}', true) NUR WENN VARIABLE VORHANDEN!
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_USERPWD, "b004c32ff973f580fdf05664cc46d6a9:53acf493fd44a88a8c2f9be31b20f7de");
        $server_output = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($server_output);
        if ($response->Messages[0]->Status == 'success') {
            $mailExists = WaitingListEmail::where('email', $RECIPIENT_EMAIL)->get()->count();
            if ($mailExists == 0) {
                WaitingListEmail::create(['email' => $RECIPIENT_EMAIL]);
            }
            echo json_encode("Email sent successfully.");
        } else {
            echo json_encode($request->mail);
        }
    }

    public static function sendInviteLink($email, $fullname) {
        $RECIPIENT_EMAIL = $email;
        //sql_query("INSERT INTO pfleger_mails1 (email) VALUES (?)", $conn, array($RECIPIENT_EMAIL), "s");
    

        
        $vars = <<<STRING
            {
            "fullname": "$fullname"
            }
            STRING;
        $SENDER_EMAIL = "info@curawork.online";
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $SENDER_EMAIL,
                    ],
                    'To' => [
                        [
                            'Email' => $RECIPIENT_EMAIL,
                            'Name' => $RECIPIENT_EMAIL
                        ]
                    ],
                    'TemplateID' => 3263757,
                    'TemplateLanguage' => true,
                    'Variables' => json_decode($vars, true)
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_USERPWD, "b004c32ff973f580fdf05664cc46d6a9:53acf493fd44a88a8c2f9be31b20f7de");
        $server_output = curl_exec($ch);
        curl_close($ch);


        $response = json_decode($server_output);
        if ($response->Messages[0]->Status == 'success') {
            //echo json_encode("Email sent successfully.");
        } else {
            //echo json_encode($request->mail);
        }
    }
    
    
    
    public static function sendPasswordReset($email, $hashstring) {
        //echo json_encode($email. " ". $hashstring);
        $RECIPIENT_EMAIL = $email;
        //sql_query("INSERT INTO pfleger_mails1 (email) VALUES (?)", $conn, array($RECIPIENT_EMAIL), "s");


        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        $RECIPIENT_LINK = $protocol.$domainName . "/login?email=" . $email . "&hash=" . $hashstring;
        //$RECIPIENT_LINK = "http://127.0.0.1:8000" . "/login?email=" . $email . "&hash=" . $hashstring;
        $vars = <<<STRING
            {
            "reset_password_link": "$RECIPIENT_LINK"
            }
            STRING;
        $SENDER_EMAIL = "info@curawork.online";
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $SENDER_EMAIL,
                    ],
                    'To' => [
                        [
                            'Email' => $RECIPIENT_EMAIL,
                            'Name' => $RECIPIENT_EMAIL
                        ]
                    ],
                    'TemplateID' => 2028730,
                    'TemplateLanguage' => true,
                    'Variables' => json_decode($vars, true)
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_USERPWD, "b004c32ff973f580fdf05664cc46d6a9:53acf493fd44a88a8c2f9be31b20f7de");
        $server_output = curl_exec($ch);
        curl_close($ch);


        $response = json_decode($server_output);
        if ($response->Messages[0]->Status == 'success') {

            //echo json_encode("Email sent successfully.");
        } else {
            //echo json_encode($email);
        }
    }
    public static function sendConfirmation(Request $request, $hashstring)
    {
        $RECIPIENT_EMAIL = $request->email;
        //sql_query("INSERT INTO pfleger_mails1 (email) VALUES (?)", $conn, array($RECIPIENT_EMAIL), "s");


        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'];
        $RECIPIENT_LINK = $protocol.$domainName . "/welcome?email=" . $request->email . "&hash=" . $hashstring;
        $vars = <<<STRING
            {
            "link": "$RECIPIENT_LINK"
            }
            STRING;
        $SENDER_EMAIL = "info@curawork.online";
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $SENDER_EMAIL,
                    ],
                    'To' => [
                        [
                            'Email' => $RECIPIENT_EMAIL,
                            'Name' => $RECIPIENT_EMAIL
                        ]
                    ],
                    'TemplateID' => 2027275,
                    'TemplateLanguage' => true,
                    'Variables' => json_decode($vars, true)
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_USERPWD, "b004c32ff973f580fdf05664cc46d6a9:53acf493fd44a88a8c2f9be31b20f7de");
        $server_output = curl_exec($ch);
        curl_close($ch);


        $response = json_decode($server_output);
        if ($response->Messages[0]->Status == 'success') {
            //echo json_encode("Email sent successfully.");
        } else {
            //echo json_encode($request->mail);
        }
    }

    public static function sendConfirmationCode($email, $code)
    {
        $RECIPIENT_EMAIL = $email;
        //sql_query("INSERT INTO pfleger_mails1 (email) VALUES (?)", $conn, array($RECIPIENT_EMAIL), "s");

        $vars = <<<STRING
            {
            "code": "$code"
            }
            STRING;
        $SENDER_EMAIL = "info@curawork.online";
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $SENDER_EMAIL,
                        'Name' => "Team Curawork"
                    ],
                    'To' => [
                        [
                            'Email' => $RECIPIENT_EMAIL,
                            'Name' => $RECIPIENT_EMAIL
                        ]
                    ],
                    'TemplateID' => 3203226,
                    'TemplateLanguage' => true,
                    'Variables' => json_decode($vars, true)
                ]
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.mailjet.com/v3.1/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json'
            )
        );
        curl_setopt($ch, CURLOPT_USERPWD, "b004c32ff973f580fdf05664cc46d6a9:53acf493fd44a88a8c2f9be31b20f7de");
        $server_output = curl_exec($ch);
        curl_close($ch);


        $response = json_decode($server_output);
        if ($response->Messages[0]->Status == 'success') {
            //echo json_encode("Email sent successfully.");
        } else {
            //echo json_encode($request->mail);
        }
    }
}
