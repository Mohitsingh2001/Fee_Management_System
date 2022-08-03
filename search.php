<?php 

include("connection.php");   
include("header.php");   ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>search</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    input {
      border: 2px solid grey;
      border-radius: 5px;

    }

    input:hover {
      border: 2px solid black;

    }

    input[type="submit"]:hover {
      background-color: black;
      color: white;
    }

    #btn1 {
      border-radius: 5px;
    }
  </style>

</head>

<body>
  <center>
    <h3 class="my-3"> Search For A Student Record </h3>


    <div class="containr">
      <form action="" method="POST">
        <input type="text" name="prnno" placeholder="Enter prn to search">
        <input type="submit" name="search" value="🔍 Search" placeholder=" search by prn" />
      </form>
      <table class="table table-striped table-hover table-bordered ">

        <tr class="bg-dark text-white text-center">

          <th>SRNO.</th>
          <th>RECEIPT</th>
          <th> NAME OF STUDENT</th>
          <th> CLASS</th>
          <th> PRN NO.</th>
          <th>TRANSITION ID</th>
          <th>PAYMENT MODE</th>
          <th>AMOUNT PAID </th>
          <th>DATE</th>
          <!-- <th>DELETE</th> -->
          <th>PRINT</th>
          <th>BACK</th>

        </tr><br>

        <?php  
    if (isset($_POST['search'])) {
       
     $sprn=$_POST['prnno'];
     $query= "SELECT * FROM `student_receipt` WHERE s_prn='$sprn' ";
     $query_run = mysqli_query($conn,$query);
     $ecount = mysqli_num_rows(  $query_run);
     if(empty($sprn)){
      echo "<script>   alert('please enter prn no. to search record'); </script> ";
     
       
     }
     if($ecount==1){
     
  
      while ($rows= mysqli_fetch_array( $query_run) ) {
        ?>
        <tr>

          <td>
            <?php echo $rows['sr_no']; ?>
          </td>
          <td>
            <?php echo $rows['recipt']; ?>
          </td>
          <td>
            <?php echo $rows['s_name']; ?>
          </td>
          <td>
            <?php echo $rows['s_class']; ?>
          </td>
          <td>
            <?php echo $rows['s_prn']; ?>
          </td>
          <td>
            <?php echo $rows['trans_id']; ?>
          </td>
          <td>
            <?php echo $rows['pay_mode'] ;?>
          </td>
          <td>
            <?php echo $rows['amu_paid'] ;?>
          </td>
          <td>
            <?php echo $rows['date'] ;?>
          </td>
          <td><button class="btn-primary " id="btn1" name="print"> <a style="color:white;text-decoration:none"
                href="print.php?sr_no=<?php echo $rows['sr_no'];  ?>">print</a> </button> </td>
          <td><button style="background:grey;color:white;border-radius:5px" name="back"> <a
                style="color:white;text-decoration:none" href="register.php"> BACK</a> </button> </td>

        </tr>
        <?php
      }
    
    
  }

  else 
   {
    echo "<script>   alert('No match found please enter valid prn no.'); </script> ";
   
   }

}


   ?>


        <!-- if (empty($a)) {
  echo "Variable 'a' is empty.<br>";
} -->




      </table>
    </div>

  </center>
  <!-- <a href="register.php"  > <button  style="background:black;color:white;border-radius:5px;height:15%;width:10%;margin:10% 0% 0% 45%" >BACK </button></a> -->

</body>

</html>