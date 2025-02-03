<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        html,body{
            height:100%;
            width:100%;
        }
        main{
            height:100vh;
            width:100vw;
            display:flex;
            justify-content:center;
            /* align-items:center; */
        }
        .container{
            display:flex;
            flex-direction:column;
        }
        form{
            /* background-color:orange; */
            box-shadow:3px 3px 3px grey, -3px -3px 3px grey;
            padding:10px;
            height:70vh;
            width:50vw;
            margin:2rem 20rem;
            border-radius:0.5rem;
            /* border:1px solid black; */
        }
        h1{
            margin-bottom:1rem;
        }
        input{
            padding: 0rem 0.5rem;
            height:2rem;
            margin:0.6rem 0rem;
        }
        button{
            background-color:blue;
            height:2rem;
            width: 4rem;
            border-style:none;
            color:white;
        }
        textarea{
            height:30vh;
            margin:0.2rem 0rem;
            padding: 0.5rem 0.5rem;
        }
           /* Media queries for responsiveness */
           @media (max-width: 1100px) {
            .form-container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.2rem;
            }

            button {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 1rem;
            }

            h1 {
                font-size: 1rem;
            }

            button {
                font-size: 0.8rem;
                height: 2rem;
            }

            input {
                font-size: 0.9rem;
            }
        }
        .alert {
        padding: 20px;
        background-color:green;
        color: white;
        }
        .danger{
            padding: 20px;
        background-color:red;
        color: white;
        }
        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

    </style>


    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name= $_POST['name'];
        $email= $_POST['email'];
        $desc=$_POST['desc'];
     // Connecting to the Database
     $servername="localhost";
     $username="root";
     $password="";
     $database="contact";
     // Create a connection
     $conn=mysqli_connect($servername,$username,$password,$database);
     // Die if connection was not succesful
     if(!$conn){
         die("Sorry we failed to connect: ".mysqli_connect_error());
     }
     else{
        //  echo "Connection was succesful";
     }
  
     $sql="INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp());";

     $result=mysqli_query($conn,$sql);
     if($result){
        echo '<div class="alert p-5 bg-gradient-to-r from-sky-950">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Success!</strong> Your entry has been submitted successfully!
        </div>';
     }
     else{
        echo '<div class="danger">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Failed!</strong> We are facing some Technical issue. Your entry has been not submitted!
        </div>';
     }
    }
    else {
        // Initialize the variables to avoid warnings
        $name = $email = $desc = '';
    }
?>


    <main>
    <form action="form.php" method="post">
        <h1>Enter email and password here</h1>
        <div class="container">
        <label for="name">
            Name
        </label>
        <input type="text" name="name">
        <label for="email">
            Email Address
        </label>
        <input type="email" name="email">
        <label for="desc">
        Description
        </label>
        <textarea name="desc" id=""></textarea>
    </div>
        <button type="submit">Submit
            </button>
    </form>
</main>



</body>
</html>