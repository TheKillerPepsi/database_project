<html> 
    <head> 
        <title>Dropdown</title> 
    </head> 
    <body> 
       <h1> Willkommen auf meiner Website! </h1>
       </br>

        <!-- Database connection -->
        <?php
                $mysqli = NEW MySQLi('sql', 'root', '1234', 'db.project');
                
                
                
        ?>
        <form id="berechnung">
        <!--  Dropdown_01 --->
        <h3> Wähle die erste Währung aus: 
        <select name="dropdown_01">
        <?php
            $result_dd_01 = $mysqli->query("SELECT waehrung_iso FROM tb_devisen;");
            while($dd_01 = $result_dd_01->fetch_assoc())
                {
                    $name_dd_01 = $dd_01['waehrung_iso'];
                    echo "<option value='$name_dd_01'>$name_dd_01</option>";
                }
        ?>   
            </select>
            </h3>
            <br>

        <!--  Dropdown_01 --->
        <h3> Wähle die zweite Währung aus: 
        <select name="dropdown_02">
        <?php
            $results_dd_02 = $mysqli->query("SELECT waehrung_iso FROM tb_devisen;");
            while($dd_02 = $results_dd_02->fetch_assoc())
                {
                    $name_dd_02 = $dd_02['waehrung_iso'];
                    echo "<option value='$name_dd_02'>$name_dd_02</option>";
                }
        ?>   
            </select>
            </h3>
            <br>

        <!-- Ausfüllfeld 1 --->
        <h3> Bitte den Wert eingeben, den die erste Währung hat:
        
        <label for="input_data"> </label>
        <input type="number" id=data name="data" min="o">
        <input type="submit" value="Submit! :)">
        <br>
        </h3>
        <br>
        <!---Ergebnis ---->
        
        </form>
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