<?php
include "connection.php";
$resultArray = array();
$search = $_GET['q'];
$type = $_GET['type'];
$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    exit();
}

mysqli_select_db($con,"25061_db2");
$sql = "SELECT * FROM country WHERE Name LIKE '$search%' ";

if ($type == "list"){
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
        $resultArray[] = $row['Name'];
    }
    echo json_encode($resultArray);
}

if ($type == "answer"){
    $result = mysqli_query($con,$sql);
    echo "<table>";
    echo "<tr><td>Country</td>
           <td>Continent</td>
           <td>Region</td>
           <td>Surface Area</td>
           <td>Year independent</td>
           <td>Population</td>
           <td>Capital</td>
           <td>Head of state</td>
           </tr>";
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Continent"] . "</td>";
        echo "<td>" . $row["Region"] . "</td>";
        echo "<td>" . $row["SurfaceArea"] . "</td>";
        echo "<td>" . $row["IndepYear"] . "</td>";
        echo "<td>" . $row["Population"] . "</td>";
        echo "<td>" . $row["Capital"] . "</td>";
        echo "<td>" . $row["HeadOfState"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
mysqli_close($con);

