<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

error_reporting(-1);
ini_set('display_errors', 'On');

class experttexting_sms
{
    // Base URLS for three methods
    public $base_url_SendSMS = 'https://www.experttexting.com/exptapi/exptsms.asmx/SendSMS';
    public $base_url_SendSMSUnicode = 'https://www.experttexting.com/exptapi/exptsms.asmx/SendSMSUnicode';
    public $base_url_QueryBalance = 'https://www.experttexting.com/exptapi/exptsms.asmx/QueryBalance';

    // Public Variables that are used as parameters in API calls
    public $username = ''; // Use Your Name
    public $password = ''; // Use Your Password (Get from your account)
    public $apikey = ''; // Use Your API key (Get from your account)
    public $msgtext = ''; 	// LET THIS REMAIN BLANK
    public $from = '';		// LET THIS REMAIN BLANK
    public $to = '';		// LET THIS REMAIN BLANK

    public function __construct()
    {
        // Sender of the SMS – PreRegistered through the Customer Area.
        $this->from    = '+919790048427';

        // The full international mobile number without the + or 00
        $this->to      = '919790048427';

        // The SMS content.
        $this->msgtext = 'Vimala Anbalagan from Expert Texting';
        $this->send();
    }


    // SEND SMS FUNCTION FOR SIMPLE TEXT
    function send()
    {
        try{
            $client = new Client();
            $response = $client->request('POST', $this->base_url_SendSMS, [
                'form_params' => [
                    'Userid' => $this->username,
                    'pwd' => $this->password,
                    'APIKEY' => $this->apikey,
                    'MSG' => $this->msgtext,
                    'FROM' => $this->from,
                    'To' => $this->to,
                ]
            ]);

            echo $response->getStatusCode(); // 200
            $response->getReasonPhrase(); // OK
            $response->getProtocolVersion(); // 1.1
        }
        catch(\GuzzleHttp\Exception\ClientException $e){
            echo $e->getMessage();
        }
        catch(ErrorException $e){
            echo $e->getMessage();
        }
    }

    // SEND SMS FUNCTION FOR UNICODE TEXT
    function sendUnicode()
    {
        $fieldcnt    = 6;
        $fieldstring = "Userid=$this->username&pwd=$this->password&APIKEY=$this->apikey&MSG=$this->msgtext&FROM=$this->from&To=$this->to";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_url_SendSMSUnicode);
        curl_setopt($ch, CURLOPT_POST, $fieldcnt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldstring);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }

    // FUNCTION TO QUERY YOUR ACCOUNT BALANCE
    function QueryBalance()
    {
        $fieldcnt    = 3;
        $fieldstring = "Userid=$this->username&pwd=$this->password&APIKEY=$this->apikey";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_url_QueryBalance);
        curl_setopt($ch, CURLOPT_POST, $fieldcnt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldstring);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
?>