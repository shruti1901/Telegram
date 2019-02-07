<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interview";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
  

//echo date("h:i:s") . "\n"; 
$date=date("M,d,Y h:i:s A") . "\n"; 
echo "$date";
//echo date("h:i a"); 
  
 $sql ="SELECT * from contest ";
 if($fetch=mysqli_query($conn,$sql)){
 if (mysqli_num_rows($fetch) > 0) { 
        echo "<table border='3' cellspacing='5'>"; 
        echo "<tr>"; 
        echo "<th>Contest Id</th>"; 
        echo "<th>Contest Type</th>"; 
        echo "<th>Branch Associated</th>";
        echo "<th>Date Of Contest</th>";
        echo "<th>Time of Contest</th>";
        echo "<th>Conducting Company</th>";
        echo "<th>Interested?</th>";
        echo "</tr>";
 while ($row = mysqli_fetch_array($fetch)) { 
            echo "<tr>"; 
            echo "<td>".$row['cid']."</td>"; 
            echo "<td>".$row['type']."</td>"; 
            echo "<td>".$row['branch']."</td>"; 
            echo "<td>".$row['date']."</td>"; 
            echo "<td>".$row['time']."</td>"; 
            echo "<td>".$row['com_id']."</td>";
            echo "</tr>"; 
 
    }

 }


 }

?>