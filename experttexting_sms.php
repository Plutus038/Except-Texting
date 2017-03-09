<?php
namespace GuzzleHttp;

error_reporting(-1);
ini_set('display_errors', 'On');

class experttexting_sms
{
    // Base URLS for three methods
    public $base_url_SendSMS = 'https://www.experttexting.com/exptapi/exptsms.asmx/SendSMS';
    public $base_url_SendSMSUnicode = 'https://www.experttexting.com/exptapi/exptsms.asmx/SendSMSUnicode';
    public $base_url_QueryBalance = 'https://www.experttexting.com/exptapi/exptsms.asmx/QueryBalance';

    // Public Variables that are used as parameters in API calls
    public $username = 'Vimala';
    public $password = '';
    public $apikey = '41ajn1x4tmm10af';
    public $msgtext = ''; 	// LET THIS REMAIN BLANK
    public $from = '';		// LET THIS REMAIN BLANK
    public $to = '';		// LET THIS REMAIN BLANK

    public function __construct()
    {
        /*// Sender of the SMS – PreRegistered through the Customer Area.
        $this->from    = '+919790048428';

        // The full international mobile number without the + or 00
        $this->to      = '9197900484278';

        // The SMS content.
        $this->msgtext = 'Vimala Anbalagan from Expert Texting';
        $this->send();*/
    }


    // SEND SMS FUNCTION FOR SIMPLE TEXT
    function send()
    {
        echo "asdf";
        $fieldcnt    = 6;
        $fieldstring = "Userid=$this->username&pwd=$this->password&APIKEY=$this->apikey&MSG=$this->msgtext&FROM=$this->from&To=$this->to";

        /*$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_url_SendSMS);
        curl_setopt($ch, CURLOPT_POST, $fieldcnt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldstring);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;*/
        try{
//            $client = new \GuzzleHttp\Client();
            echo "test";exit();
//        $response = $client->request('POST', $this->base_url_SendSMS);
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
            echo $response->getReasonPhrase(); // OK
            echo $response->getProtocolVersion(); // 1.1
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