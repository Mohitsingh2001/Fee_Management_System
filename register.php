<?php include("header.php");   ?>


<?php
include("connection.php");   //get connection with database.
$query="select * from student_receipt";
$result=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>register</title>
  <style>
    body {
      background: #eee;
    }


    .btn-group {
      margin-left: 20%;

    }

    .btn-group button {
      background-color: #454545;
      /* Green background */
      border: 1px solid black;
      /* Green border */
      border-radius: 20px;
      color: white;
      /* White text */
      padding: 10px 24px;
      /* Some padding */
      cursor: pointer;
      /* Pointer/hand icon */
      float: center;
      /* Float the buttons side by side */
      margin: 0 35px;
    }

    /* Clear floats (clearfix hack) */
    .btn-group:after {
      content: "";
      clear: both;
      display: table;
    }

    .btn-group button:not(:last-child) {
      border-right: none;
      /* Prevent double borders */
    }

    /* Add a background color on hover */
    .btn-group button:hover {
      background-color: black;
      color: yellow;
    }
  </style>

</head>

<body>
  <marquee scrollamount="15" width="100%" direction="left" height="22px">
    👉 Click On SEARCH FOR RECORD for searching student records by entering students prn no..... 👉 Cliclk on UPLOAD
    MANUALLY to print receipt for single student by entering all required details...👉 Cliclk on UPLOAD BULK to upload
    any excel(.xlsx, .csv , .xls) file.
  </marquee><br><br>
  <div class="btn-group">
    <a href="search.php"><button>SEARCH FOR RECORD</button></a>
    <a href="stdForm.php"><button>UPLOAD MANUALLY</button></a>
    <a href=" excelfileupload.php"> <button>UPLOAD IN BULK</button></a>
    <a href="logout.php" target="_"> <button>LOGOUT</button></a>
  </div><br><br><br>
  <h2 class="text-sucess text-center"> Register Book </h2> <br>
  <div class="container">
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered ">

        <tr class="bg-dark text-white text-center">
          <t>
            <th>SRNO.</th>
            <th>RECEIPT</th>

            <th> NAME OF STUDENT</th>
            <th> CLASS</th>
            <th> PRN NO.</th>

            <th>TRANSITION ID</th>
            <th>PAYMENT MODE</th>
            <th>AMOUNT PAID </th>
            <th>DATE</th>
            <th>DELETE</th>
            <!-- <th>UPDATE</th>  -->
            <th>PRINT</th>

          </t>
          <?php 
     while($rows=mysqli_fetch_assoc($result)) {?>
        <tr class="text-center">
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
          <td><button class="btn-danger " style="border-radius:5px"
              onClick="return confirm(' Are you sure you want to delete this record?')"><a class="text-white"
                style="text-decoration:none" href="delete.php?sr_no=<?php echo $rows['sr_no'];  ?> ">DELETE</a>
            </button> </td>
          <!-- <td ><button class="btn-primary " name="update"> <a class="text-white" href="update.php?sr_no=<?php //echo $rows['sr_no'];  ?>">update</a>  </button> </td> -->
          <td><button class="btn-primary " style="border-radius:5px" name="print"> <a class="text-white"
                style="text-decoration:none" href="print.php?sr_no=<?php echo $rows['sr_no'];  ?>">print</a> </button>
          </td>

        </tr>
        <?php 
}?>

      </table>


    </div>
  </div>
</body>

</html>