<!DOCTYPE
<HTML>
  <HEAD>
    <TITLE>Test von PHP</TITLE>
  </HEAD>
  <BODY>
  <h1> HAlllo, das it html :) </h1>
   <?php
  
  //Hier wird die Verbindung erstellt. Das if-Statement prüft, ob die Vebrindung funktioniert hat
$servername = "172.22.0.1";
$username = "root";
$password = "example";
$database = "db.project";
$conn = mysqli_connect($servername, $username, $password, $database );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
# echo "Connected successfully";
  
  
//hier setzen wir das sql-Statement ab (Von der Verbindung oben und dem defineirten Statement) und speichern das Ergebnis in einer Variable
$sql = "SELECT * FROM tb_devisen;";
$result = mysqli_query($conn, $sql ) or die("Error quering Database");
  
//Hier sagen wir, wenn er mehr Rows als null hat, soll er mit dem if-Statement weitermachen.
if (mysqli_num_rows($result)>0)
{
  
//Hier wird gesagt, solange SQL noch einen Array (mit der MEthode fetch_array) aus der Variablen result hat soll er das folgende machen. Ein Arrayteil ist damit eine Zelle einer Zeile
while($row = mysqli_fetch_array($result))
{
//Hier wird, aus der Row/Zeile sich der erste "Array" geschnappt (also Zelle) und dargestellt. Anschließend wird ein Zeilenumbruch gemacht
echo $row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5];
echo "<br>";
}
}
  
mysqli_close($conn);

  
    ?>

<?php
#database-work

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.exchangeratesapi.io/latest",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$array = (json_decode($response, true));
#echo '<pre>';
#print_r($array);
#echo '</pre>';
#var_dump $array;
var_dump(json_decode($response, true));
echo "<br>";
echo "<br>";
echo "<br>";

#https://www.php.net/manual/de/function.array-keys.php
print_r(array_keys($array, "EUR"));






/*
echo str_replace(array('&lt;?php&nbsp;','?&gt;'), '', highlight_string( '<?php ' .     var_export($array, true) . ' ?>', true ) );

#$response = json_decode($response, true); //because of true, it's in an array
#print_r $response[0][1];

*/
#echo $code;
#echo $rates;











#https://stackoverflow.com/questions/8541026/php-print-array-with-one-key-per-line-so-its-easier-on-the-eyes





#curl_error
#API url
#$url = 'https://api.exchangeratesapi.io/latest';

 #initialize cUrl session
#$curl = curl_init($url);
#curl_setopt_array($url);

#Execute cURL 
#$response = curl_exec($curl);



#echo $response;
#echo "<br>";
#$result = json_encode($response, true);
#echo $result;


#$parsed = array();
#parse_str($response, $parsed);
#print_r($parsed);

 # Close cURL session



 
#$array = json_decode($response);
#$coop_id = $array['coop_id'];
#print_r($array);

curl_close($curl);

#$get_data = callAPI('GET', 'https://api.exchangeratesapi.io/latest', false);
#$response = json_decode($get_data, true);
#$errors = $response['response']['errors'];
#$data = $response['response']['data'][0];
#myjson = json_encode($response);
#echo $response;

?>
  </BODY>
</HTML>