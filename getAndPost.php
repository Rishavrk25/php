<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            height:40vh;
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
            height:2rem;
            width: 4rem;
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
        $email= $_POST['email'];
        $password= $_POST['pass'];
    echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Success!</strong> Your '. $email.' and password '.$password.' has been submitted successfully!
        </div>';
    }
?>
    <main>
    <form action="getAndPost.php" method="post">
        <h1>Enter email and password here</h1>
        <div class="container">
        <label for="email">
            Email Address
        </label>
        <input type="email" name="email">
        <label for="password">
            Password
        </label>
        <input type="password" name="pass">
        </div>
        <button type="submit">Submit
        </button>
    </form>
</main>
</body>
</html>