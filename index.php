<?php

// Including the below class is very important as it has all the functionality to run the code.
// Your account details (userid, password and api key) will be entered in the class below.
/*function __autoload($class_name) {
    require $class_name . '.php';
}*/
include('experttexting_sms.php');

error_reporting(-1);
ini_set('display_errors', 'On');

// Creating an object of ExpertTexting SMS Class.
$expertTexting = new experttexting_sms();

// Sender of the SMS – PreRegistered through the Customer Area.
$expertTexting->from    = '+919790048427';

// The full international mobile number without the + or 00
$expertTexting->to      = '919790048427';

// The SMS content.
$expertTexting->msgtext = 'Vimala Anbalagan from Expert Texting';

// Use the below method to sent simple text message.
// Uncomment the line below to run this call.
echo $expertTexting->send();

// Use the below method to sent Send multilangual SMS method that have unicode characters in them.
// Uncomment the line below to run this call.
//echo $expertTexting->sendUnicode();

// Use the below method to query your account balance
// The below call is uncommented thus it will run on page execution.
//echo $expertTexting->QueryBalance();

?>