


<?php
include 'config.php';
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    /*
     * 
     */
    //echo $_POST['unit-submit'];
    echo $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $result_str = 'Total amount of ' . $units . ' - ' . $result;

        $query = "INSERT INTO `electricty` (`price`) VALUES ('$result_str');";

        $conn->query($query);
        if ($conn->query($query)) {
            echo "successfully !";
        } else {
            echo "error";
        }
    }
}
$sql= "SELECT * FROM `electricty`";
$result=$conn->query($sql);
//echo "<pre>";
//print_r($result);

while ($row=$result->fetch_assoc()){
   echo "<br/>";
echo $row['id'];
echo "<br/>";
echo $row['price']; 
}
/*print_r($row);
echo "<br/>";
echo $row['id'];
echo "<br/>";
echo $row['price'];*//**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.00;


    if ($units <= 50) {
        $bill = $units * $unit_cost_first;
    } else if ($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }

    return $bill;
}
?>

<body>
    <div id="page-wrap">
        <h1>Php - Calculate Electricity Bill</h1>

        <form action="" method="post" id="quiz-form">            
            <input type="number" name="units" id="units" placeholder="Please enter no. of Units" />            
            <input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
        </form>

        <div>
<?php echo '<br />' . $result_str; ?>
        </div>	
    </div>
</body>
</html>