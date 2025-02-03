<?php
$servername="localhost";
$username ="root";
$password="";
$database="contact";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
else echo "Connection was Successful.<br>";


// -----------upadating record--------------
// $sql1="UPDATE `contactus` SET `name` = 'Shreyavv' WHERE `sno` = 2";
// $result1=mysqli_query($conn,$sql1);
// echo var_dump($result1)."<br>";
// $aff=mysqli_affected_rows($conn);
// echo "Number of affected rows: ".$aff."<br>";
// if($result1){
//     echo "Record updated Successfully<br>";
// }
// else echo "Record not updated<br>";
//------------------------------------------


//-----------deleting record----------------
$sql2="DELETE FROM `contactus` 
        WHERE `name`='rishav' LIMIT 2";
$result2=mysqli_query($conn,$sql2);
$aff=mysqli_affected_rows($conn);
echo "Number of affected rows: ".$aff."<br>";
if($result2){
    echo "Record deleted Successfully<br>";
}
else echo "Record not deleted --> ".mysqli_error($conn)."<br>";
//-----------------------------------------


//-------------select and display-----------
$sql="SELECT * FROM `contactus` 
WHERE `name`!='' LIMIT 10";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo $num . " records found in the DataBase<br><br>";
if($num>0){
    $i=1;
    while($row=mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo $i." ".$row['name']." ".$row['concern'];
        echo "<br>";
        $i++;
    }
}
//------------------------------------------
?>