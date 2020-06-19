<!DOCTYPE html>
<html lang="de">
<html> 
    <head> 
        <meta charset="UTF-8">
        <title>Database_Project</title>
        <link rel="stylesheet" href="styles.css">
    </head> 
    <body>
    <div id=wrapper>
      
        
       </br>

        <!-- Database connection -->
        <?php
                $mysqli = NEW MySQLi('sql', 'root', '1234', 'db.project');        
        ?>
        <!---Alle Kurse ---->
        <div id="alle_kurse">
        <?php
        $result_all = $mysqli->query("SELECT * FROM tb_devisen;");
        //Hier wird gesagt, solange SQL noch einen Array (mit der MEthode fetch_array) aus der Variablen result hat soll er das folgende machen. Ein Arrayteil ist damit eine Zelle einer Zeile
        echo "<h1> Aktuelle Kurse: </h1>";
        while($row = mysqli_fetch_array($result_all))
        {
            //Hier wird, aus der Row/Zeile sich der erste "Array" geschnappt (also Zelle) und dargestellt. Anschließend wird ein Zeilenumbruch gemacht
            echo " ".$row[1].":   ".$row[2];
             echo "<br>";
        }
        ?>
        </div>






<div id="dropdowns">
<h1> Moin Moin </h1>
         <form action="" id="berechnung" method="post">
        <!---------------------------  Dropdown_01 ------------------------------------>
        <h3> Wähle die erste Währung aus:
        <br> 
        <select name="dropdown_01">
        <?php
            $result_dd_01 = $mysqli->query("SELECT * FROM tb_devisen;");
            while($dd_01 = $result_dd_01->fetch_assoc())
                {   
                    
                     
                    $iso_dd_01 = $dd_01['waehrung_iso'];
                    echo "<option value=$iso_dd_01>$iso_dd_01</option>";
                } 
            echo  "</select>";
            echo "</h3>";
            echo "<br>";

        ?> 
        
        <!---------------------------  Dropdown_02 -------------------------------------->
        <h3> Wähle die zweite Währung aus:
        <br> 
        <select name="dropdown_02">
        <?php
            $results_dd_02 = $mysqli->query("SELECT * FROM tb_devisen;");
            while($dd_02 = $results_dd_02->fetch_assoc())
                {   
                    
                    $iso_dd_02 = $dd_02['waehrung_iso'];
                    echo "<option value='$iso_dd_02'>$iso_dd_02</option>";
                }
        ?>   
        </select>
        </h3>
        <br>

        <!-- Ausfüllfeld 1 --->
        <h3> Bitte den Wert eingeben, den die erste Währung hat:
        <br>
        <label for="input_data"> </label>
        <input type="number" id=data name="data" min="o">
        <input type="submit" value="Submit! :)" name="submit">
        <br>
        </h3>
        <br>
        </form>


        </div>
        <div id="submit">
        
        <?php
    if(isset($_POST['submit']))
    {
    
       
        $dd_01_id = $_POST['dropdown_01'];
        $dd_02_id = $_POST['dropdown_02'];
        $Wert = $_POST['data'];
     
        echo "Der Kurs der ersten Währung lautet: ".$dd_01_id;
        echo "<br>";
        echo "Der Kurs der zweiten Währung lautet: ".$dd_02_id;
        echo "<br>";
        echo "Der eingegbene Wert beträgt: ".$Wert;
        echo "<br>";

        $test_var_01 = "USD";
        $test_var_02 = "CAD";
        $test_var_03 = 5;
        #$input = "Call do_math('".$test_var_01."', '".$test_var_02."', ".$test_var_03.")";
        $input = "Call do_math('".$dd_01_id."', '".$dd_02_id."', ".$Wert.")";
        #executes stored procedure
        $result_test = mysqli_query($mysqli,$input) or die ("Query fail: ".$mysqli_error());
     
        #loop through output and echo
        while ($test_row = mysqli_fetch_array($result_test))
        {
        echo "Das Ergebnis lautet: ".$test_row[0];
        }    
    }

  
?>

</div>
        
        


            </div>
            </div>
    </body> 
</html> 