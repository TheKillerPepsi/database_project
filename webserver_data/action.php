

 

 <?php
if(isset($_POST['submit'])){
// As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
$sel_value = $_POST['dropdown_01']

echo "You have selected :" .$sel_value; // Displaying Selected Value
}

?>