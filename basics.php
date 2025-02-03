<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            echo "This is"; 
            echo " Title";
        ?>
    </title>
</head>
<body>
    <?php
        echo "Hello world";
    ?>
</body>
</html> -->

<!-- <?php
    ECHO "Helo world";
?> -->


<?php
    // Variables are containers for storing information

    // Starts with a $
    // $name="Rishav";
    // $income=2000000.5;
    // echo "This guy is $name and his income is $income<br>";
    // echo "$name is the real gangsta<br>";

    // php data types -> string, integer, float, boolean, object, array, NULL
    
    // STRING
    // $name='harry';
    // echo gettype($name);
    // echo $name;
    // echo "<br>";
    // echo "$name";
    // echo "<br>";

    // INTEGER
    // $integer=23;
    // echo $integer ."<br>";
    
    // BOOLEAN
    // $x=true;
    // echo $x;
    // $is_friend=false;
    // echo "<br>";
    // echo $is_friend; // prints blank
    // echo var_dump($is_friend);
    // echo "<br>";

    // --------------------------ARRAYS-----------------------------------------
    // $friends=array("rohan","shubham","hello");
    // echo var_dump($friends);
    // echo "<br>";
    // echo $friends[0] ."<br>";
    // echo $friends[1] ."<br>";
    // echo $friends[2] ."<br>"; 

    // $days=[];
    // for($i=0;$i<7;$i++){
    //     $days[$i]=(string)readline("Enter days");
    // }
    // for($i=0;$i<7;$i++){
    //     echo $days[$i]."\n";
    // }

    $arr=["oshg","ogsah","oshg"];
    for($i=0;$i<count($arr);$i++){
        echo $arr[$i];
    }
    // -----------For each loop--------------
    foreach($arr as $i){
        echo $i."\n";
    }

    // $arr=[
    //     [1,2,3],
    //     [1,2,3],
    //     [1,2,3],
    // ];
    // for($i=0;$i<3;$i++){
    //     for($j=0;$j<3;$j++){
    //         echo $arr[$i][$j];
    //     }
    //     echo "\n";
    // }
    
    // NULL
    // $name=NULL;
    // echo var_dump($name);

    // STRING FUNCTIONS
    // $name="Harry is a good boy";
    // echo $name ."<br>";
    // echo strlen($name) ."<br>";
    // echo strrev($name) ."<br>";
    // echo strpos($name,"is") ."<br>";
    // echo str_replace("Harry","Rohan",$name);
    // echo str_repeat($name,4);
    // echo "<br>";
    // echo "<pre>";
    // echo rtrim("    this is a good boy   ")."<br>";
    // echo ltrim("    this is a good boy   ");echo "</pre>";


    // OPERATORS
    // $a=45;
    // $b=8;
    // echo ($a + $b) ."<br>";
    // $c=5;
    // $c+=1;
    // $c++;
    // echo $c ."<br>";
    // echo var_dump($a==$b)."<br>";
    // echo var_dump($a!=$b)."<br>";
    // echo var_dump($a<>$b)."<br>";

    // $m=true;
    // $n=false;
    // echo var_dump($m and $n) ."<br>";
    // echo var_dump($m && $n) ."<br>";
    // echo var_dump($m or $n) ."<br>";
    // echo var_dump($m || $n) ."<br>"; 
    // echo var_dump(!$n) ."<br>";


    // IF ELSE
    // $a=65;
    // $b=9;
    // if (condition) {
    //     # code...
    // } 
    // elseif (condition) {
    //     # code...
    // }
    // else {
    //     # code...
    // }


    // SWITCH CASE
    // switch ($variable) {
    //     case 'value':
    //         # code...
    //         break;
        
    //     default:
    //         # code...
    //         break;
    // }


    // LOOPS
    // for ($i=0; $i <10 ; $i++) { 
    //     # code...
    // }

    // while ($a <= 10) {
    //     # code...
    // }

    // do {
    //     # code...
    // } while ($a <= 10);

    // $arr=array("rohan","shubham","hello");
    // for($i=0; $i<count($arr) ;$i++){
    //     echo $arr[$i] ."<br>";
    // }
    // foreach ($arr as $key => $value) {
    //     echo $value ."<br>";
    // }


    // FUNCTIONS
    // function greet(){
    //     echo "hello" ."<br>";
    // }
    // greet();
    // function sum($a,$b){
    //     return ($a+$b);
    // }
    // echo sum(2,3);


    // HANDLING DATE
    // $d=date("d S F Y , g:i:s");
    // echo $d;


    // ASSOCIATIVE ARRAYS
    // $favCol = array(
    //     'shubham' => 'red',
    //     'rohan'=>'green',
    //     'harry'=>'brown',
    //      8=>'this'
    // );
    // echo $favCol['harry'];
    // echo "<br>";
    // echo $favCol[8];
    // echo "<br>";

    // foreach($favCol as $key => $value){
    //     echo "$key $value";
    //     echo "<br>";
    // }


    // MULTI-DIMENSIONAL ARRAYS (2D ARRAY)
    // $arr= array(
    //     array(1,2,3,4),
    //     array(1,2,3,4),
    //     array(1,2,3,4),
    // );
    // echo var_dump($arr);
    // echo "<br>";
    // echo $arr[1][1];
    // echo "<br>";
    // for ($i=0; $i < count($arr) ; $i++) { 
    //     for ($j=0; $j < count($arr[$i]); $j++) { 
    //         echo $arr[$i][$j];
    //         echo " ";
    //     }
    //     echo "<br>";
    // }

    
    // SCOPE
    // $a=98; //global
    // function printValue(){
    //     $a=97; //local
    //     echo "$a";
    //     echo "<br>";
    //     global $a;
    //     echo "$a";
    // }
    // printValue();
    

    // USER INPUT
    // echo "Enter an input\n";
    // $input=readline();
    // echo $input;

    
?>



