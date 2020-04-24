<!DOCTYPE
<HTML>
  <HEAD>
    <TITLE> Datenbankprojekt </TITLE>
  </HEAD>
  <BODY>
   <?php
  
  //Hier wird die Verbindung erstellt. Das if-Statement prüft, ob die Vebrindung funktioniert hat
$servername = "sql";
$username = "root";
$password = "1234";
$database = "db.project";
$conn = mysqli_connect($servername, $username, $password, $database );
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
  
//hier setzen wir das sql-Statement ab (Von der Verbindung oben und dem defineirten Statement) und speichern das Ergebnis in einer Variable
$sql = "SELECT * FROM tb_devisen;";
$result = mysqli_query($conn, $sql ) or die("Error quering Database");
  
//Hier sagen wir, wenn er mehr Rows als null hat, soll er mit dem if-Statement weitermachen.
if (mysqli_num_rows($result)>0)
{ 
  //Hier wird gesagt, solange SQL noch einen Array (mit der MEthode fetch_array) aus der Variablen result hat soll er das folgende machen. Ein Arrayteil ist damit eine Zelle einer Zeile
  echo "<h1> Aktuelle Kurse: </h1>";

  while($row = mysqli_fetch_array($result))
  {
      //Hier wird, aus der Row/Zeile sich der erste "Array" geschnappt (also Zelle) und dargestellt. Anschließend wird ein Zeilenumbruch gemacht
      echo " ".$row[1]." ".$row[2];
      echo "<br>";
  }

  echo "<br>";
  echo "<br>";

 
}

mysqli_close($conn);

  
    ?>

  </BODY>
</HTML>