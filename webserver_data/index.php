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
 
  </BODY>
</HTML>