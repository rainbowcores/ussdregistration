<?php
// Reads the variables sent via POST from our gateway
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

$level = explode("*", $text);
if (isset($text)) {

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON What would you want to check \n";
    $response .= "1. Registration \n";
    $response .= "2. Insurance";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Welcome to the registration portal.\n
    Please enter your full name\n";/* 
    $response .= "1. Account number \n";
    $response .= "2. Account balance"; */

} if(isset($level[1]) && $level[1]!="" && !isset($level[2])){
          $response="CON Hi ".$level[1].", enter your ward name";
             
} if(isset($level[2]) && $level[2]!="" && !isset($level[3])){
    $response="CON Please enter you national ID number\n"; 

}else if(isset($level[3]) && $level[3]!="" && !isset($level[4])){
    /* //Save data to database
    $data=array(
        'phonenumber'=>$phonenumber,
        'fullname' =>$level[0],
        'electoral_ward' => $level[1],
        'national_id'=>$level[2]
        ); */
    
    $response="END Thank you ".$level[1]." for registering.\nWe will keep you updated"; 

}else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
/*     $response = "END Your phone number is ".$phoneNumber;
 */
    $response = "END This is insurance \n";
} /* else if($text == "1*1") { 
    // This is a second level response where the user selected 1 in the first instance
    $accountNumber  = "ACC1001";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your account number is ".$accountNumber;

} else if ( $text == "1*2" ) {
    // This is a second level response where the user selected 1 in the first instance
    $balance  = "KES 10,000";

    // This is a terminal request. Note how we start the response with END
    $response = "END Your balance is ".$balance;
} */
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
