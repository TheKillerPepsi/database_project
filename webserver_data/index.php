<!DOCTYPE html>
<html lang="de">
<html> 
    <head> 
        <meta charset="UTF-8">
        <title>Database_Project</title> 
    </head> 
    <body> 
       <h1> Moin Moin </h1>
       </br>

        <!-- Database connection -->
        <?php
                $mysqli = NEW MySQLi('sql', 'root', '1234', 'db.project');        
        ?>

        <!-----Test Stuff -->

        <h2> Test Stuff </h2>
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

                    <?php
                       #build mysql stored procdure
              


?>
         <form action="" id="berechnung" method="post">
         <h2> Für die Berechnungen ohne Euro: </h2>
        <!---------------------------  Dropdown_01 ------------------------------------>
        <h3> Wähle die erste Währung aus : 
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
        
        <label for="input_data"> </label>
        <input type="number" id=data name="data" min="o">
        <input type="submit" value="Submit! :)" name="submit">
        <br>
        </h3>
        <br>
        </form>
        <!---Ergebnis ---->



    </body> 
</html> 