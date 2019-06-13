

<?php

//Shipping & Billing info
$name = $_POST["First_name"];
$surname = $_POST["Last_name"];
$company = $_POST["Organization"];
$street = $_POST["Address"];
$number = $_POST["St_number"];
$address2 = $_POST["Address_2"];
$zip = $_POST["Zip_code"];
$city = $_POST["City"];
$country = $_POST["Country"];
//Purchase info
$years = $_POST["Years"];
$data = $_POST["Data"];
$sms = $_POST["SMS"];
$quantity = $_POST["Quantity"];
$cena = $_POST["Price"];
//Card info
$cname = $_POST["Card_name"];
$cnum = $_POST["Card_num"];
$expmonth = $_POST["Exp_month"];
$expyear = $_POST["Exp_year"];
$cvv = $_POST["CVV"];

echo $name." ".$surname." ".$company." ".$street." ".$number." ".$address2." ".$zip." ".$city." ".$country."\n".$years." ".$data." ".$sms." ".$quantity." ".$cena."\n".$cname." ".$cnum." ".$expmonth." ".$expyear." ".$cvv;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "podatki";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "INSERT INTO `order2`(`name`, `surename`, `street`, `city`, `zip`, `country`, `company`, `cname`, `cnum`, `expmonth`, `expyear`, `cvv`, `data`, `sms`, `years`, `cena`) VALUES
('$name', '$surname', '$street', '$city', '$zip', '$country', '$company', '$cname','$cnum','$expmonth','$expyear','$cvv', '$data', '$sms', '$years', '$cena');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>