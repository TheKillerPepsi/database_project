<!DOCTYPE html>
<html lang="de">
<html> 
    <head> 
        <meta charset="UTF-8">
        <title>Database_Project</title> 
    </head> 
    <body> 
       <h1> Willkommen auf meiner Website! </h1>
       </br>

        <!-- Database connection -->
        <?php
                $mysqli = NEW MySQLi('sql', 'root', '1234', 'db.project');        
        ?>
         <form action="" id="berechnung" method="post">
         <h2> Für die Berechnungen ohne Euro: </h2>
        <!---------------------------  Dropdown_01 ------------------------------------>
        <h3> Wähle die erste Währung aus : 
        <select name="dropdown_01[]">
        <?php
            $result_dd_01 = $mysqli->query("SELECT * FROM tb_devisen;");
            while($dd_01 = $result_dd_01->fetch_assoc())
                {   
                    
                    $id_dd_01 = $dd_01['id'];
                    $kurs_dd_01 = $dd_01['kurs'];      
                    $iso_dd_01 = $dd_01['waehrung_iso'];
                    echo "<option value=$kurs_dd_01>$iso_dd_01</option>";
                } 
            echo  "</select>";
            echo "</h3>";
            echo "<br>";
            echo $array_dd_01[0];
            echo $array_dd_01[1];
            echo $array_dd_01[2];
        ?> 
        
        <!---------------------------  Dropdown_02 -------------------------------------->
        <h3> Wähle die zweite Währung aus: 
        <select name="dropdown_02">
        <?php
            $results_dd_02 = $mysqli->query("SELECT * FROM tb_devisen;");
            while($dd_02 = $results_dd_02->fetch_assoc())
                {   
                    $kurs_dd_02 = $dd_02['kurs'];
                    $iso_dd_02 = $dd_02['waehrung_iso'];
                    echo "<option value='$kurs_dd_02'>$iso_dd_02</option>";
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
        <?php
           # if(isset($_POST['submit']))
           # {
               
               
             #   $dd_01_id = $_POST['dropdown_01'];
            #    $dd_02_id = $_POST['dropdown_02'];
              #  $Wert = $_POST['data'];
                #cho gettype($dd_01_id);
              #  echo "Der Kurs der ersten Währung lautet: ".$dd_01_id;
              #  echo "<br>";
              #  echo "Der Kurs der zweiten Währung lautet: ".$dd_02_id;
              #  echo "<br>";
              #  echo "Der eingegbene Wert beträgt: ".$Wert;
              #  $Ergebnis_01 = $Wert / $dd_01_id;
               # $Ergebnis_02 = $Ergebnis_01*$dd_02_id;
                #echo $Ergebnis_02;
               # $Ergebnis = 

             
              
            #}
        ?>
        











        
        <!-- komplette Anzeige -->
        <h2> Die aktuellen Kurse: </h2>
        <?php
        $results_every = $mysqli->query("SELECT * FROM tb_devisen;");
        while($every = $results_every->fetch_assoc())
        {
            echo "<b> ".$every['waehrung_iso']."</b> ".$every['kurs'];
            echo "<br>";
        }
        ?>

    </body> 
</html> 