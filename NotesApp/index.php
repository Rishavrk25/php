<?php
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'good morning', 'hey i just want to say good morning', current_timestamp());
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}
$delete=false;
if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $delete=true;
  $sql="DELETE FROM `notes` WHERE `sno`=$sno";
  $result = mysqli_query($conn, $sql);
}
$insert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $desc = $_POST['DescEdit'];

        $sql = "UPDATE `notes` SET `title` = '$title', `description`='$desc' WHERE `notes`.`sno` = $sno;";
        $result = mysqli_query($conn, $sql);
    } else {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $sql = "INSERT INTO `notes` (`title`, `description`, `tstamp`) VALUES ('$title', '$desc', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }
}
?>

<!doctype html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./src/output.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">


</head>
<style>
  html {
    height: 100vh;
    width: 100%;
  }

  /* Define the animation for the modal */
  @keyframes slideDown {
    0% {
      transform: translateY(-100%);
      /* Start above the screen */
      opacity: 0;
    }

    100% {
      transform: translateY(0);
      /* End at its normal position */
      opacity: 1;
    }
  }

  @keyframes slideUp {
    0% {
      transform: translateY(0);
      /* Start below the screen */
      opacity: 0;
      /* Start invisible */
    }

    100% {
      transform: translateY(-100%);
      /* End at its normal position */
      opacity: 1;
      /* End fully visible */
    }
  }


  .animate-slide-down {
    animation: slideDown 0.2s ease-out forwards;
  }

  .animate-slide-up-close {
    animation: slideUp 0.2s ease-out forwards;
  }
</style>

<body class="h-[100vh] w-[100%]">
  <?php
  if($insert){
    echo '<div class="alert bg-gradient-to-r from-green-900 text-white p-4 w-100vw transition-all duration-200">
        <span class="closebtn float-end cursor-pointer text-black font-bold " onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Success!</strong> Your note has been added successfully!
    </div>';
  }
  if($delete){
    echo '<div class="alert bg-gradient-to-r from-green-900 text-white p-4 w-100vw transition-all duration-200">
        <span class="closebtn float-end cursor-pointer text-black font-bold " onclick="this.parentElement.style.display=\'none\';">&times;</span> 
        <strong>Success!</strong> Your note has been deleted successfully!
    </div>';
  }
  
  ?>
  <!-- containter populated using js -->
  <div id="container" class="absolute  left-50 right-50 z-1"></div>
  <!--------------------------------------------------------------->

  <main class="h-half w-100% flex justify-center">

    <form action="index.php" method="post" class=" h-[50%] w-[60%] p-6 flex flex-col gap-4 ">
      <h1 class="text-3xl font-medium">
        Add a Note
      </h1>
      <div>
        <p>Note Title</p>
        <input name="title" class=" border w-full p-1" type="text">
      </div>
      <div>
        <p>Note Description</p>
        <textarea name="desc" class="border w-full h-30 p-1" name="" id=""></textarea>
      </div>
      <div>
        <input type="submit" value="Add Note" class="bg-blue-700 p-2 text-white rounded cursor-pointer"></input>
      </div>
    </form>
  </main>

  <div class="flex justify-center p-6 w-[60vw] mx-auto">
    <table class="container  w-[100px] table-auto border-collapse border border-gray-300" id="myTable">
      <thead>
        <tr>
          <th class=" border border-gray-300  px-4 py-2 text-left">S.no</th>
          <th class=" border border-gray-300 px-4 py-2 text-left">Title</th>
          <th class=" border border-gray-300 px-4 py-2 text-left">Description</th>
          <th class=" border border-gray-300 px-4 py-2 text-left">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      $sql="SELECT * FROM `notes`";
      $result=mysqli_query($conn,$sql);
      $sno=1;
        while($row=mysqli_fetch_assoc($result)){
          echo "<tr>
            <td class=' border border-gray-300 px-4 py-2'>" . $sno . "</td>
            <td class=' border border-gray-300 px-4 py-2'>" . $row['title'] . "</td>
            <td class=' border border-gray-300 px-4 py-2'>" . $row['description'] . "</td>
            <td class=' border border-gray-300 px-4 py-2'><button class='edit p-1 border bg-blue-700 text-white rounded' id=".$row['sno'].">Edit</button> <button class='delete p-1 border bg-blue-700 text-white rounded' id=d".$row['sno'].">Delete</button>
          </tr>";
          
          $sno++;
     }
    ?>
      </tbody>
    </table>
  </div>
  <div class="flex justify-center ">
    <div class="container  w-[60%] p-6">

    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>
    let btn = document.getElementsByClassName('edit');
    let container = document.getElementById("container");
    // Loop through all buttons with class 'edit'
  Array.from(btn).forEach(btn =>{
    btn.addEventListener("click", () => {
      container.innerHTML = `
      
      <form action="index.php" method="post" class="bg-white h-[220px] w-[400px] px-4 py-2 shadow-2xl shadow-gray-600 rounded-xl flex flex-col justify-evenly mx-auto" id="modal">
      <input type="hidden" name="snoEdit" id="snoEdit">
        <h1 class="text-2xl">Edit Note here</h1>
        Title
        <input id="titleEdit" name="titleEdit" class=" border block w-full border-gray-400 px-1">
          Description<textarea name="DescEdit" id="DescEdit" class="h-[50px] border block w-full border-gray-400 px-1"></textarea>
          <div class="flex justify-end gap-2">
            <input type="submit" value="close" class="px-2 py-1.5 border bg-gray-500 text-white rounded" id="close">
            <input type="submit"  value="save changes" class="px-2 py-1.5 border bg-blue-700 text-white rounded">
          </div>
        </form>`;
      let modal = document.getElementById("modal");
      modal.classList.add("animate-slide-down");

      let close = document.getElementById("close");
      close.addEventListener("click", () => {
        modal.classList.add("animate-slide-up-close");
        container.innerHTML = "";

      });
    });
  });
  </script>

  <script>
    document.querySelectorAll('.edit').forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        // console.log(tr);
        title = tr.getElementsByTagName("td")[1].innerText;
        description = tr.getElementsByTagName("td")[2].innerText;
        console.log(title);
        console.log(description);
        titleEdit = document.getElementById("titleEdit");
        descEdit = document.getElementById("DescEdit");
        // Set the values of the modal inputs
        titleEdit.value = title;
        descEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id);
      })
    })

    document.querySelectorAll('.delete').forEach((element) => {
      element.addEventListener("click", (e) => {
        sno=e.target.id.substr(1,);
        if(confirm("Press a button!")){
          console.log("yes");
          window.location=`index.php?delete=${sno}`;
        }
        else{
          console.log("no");
        }
      })
    })
  </script>

</body>

</html>