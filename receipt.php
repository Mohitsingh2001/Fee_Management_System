<html>

<head>
  <title>receipt</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }

  </script>
  <style>
    .footer {

      margin-left: 35%;

    }

    .btn {
      background-color: DodgerBlue;
      border: none;
      color: white;
      padding: 12px 30px;
      cursor: pointer;
      font-size: 15px;
      border-radius: 5px;
      height: 40px;
      width: 200px;
      margin-right: 20px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
      background-color: RoyalBlue;
    }

    #back {
      background-color: DodgerBlue;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      height: 40px;
      width: 100px;

    }

    #back:hover {
      background-color: RoyalBlue;
    }
  </style>

</head>

<body>

  <div class='html-content'>
    <div id="printableArea">



      <div style="height: 85px; padding-left: 20px;  padding-top: 5px;">

        <table align="center">

          <tbody>
            <tr>
              <td><img src="college logo/bnblogo.jpg" alt="College Logo" style="height:120px;
           width: 120px; ">
              <td style="text-align:center;">
                <span id="head1" style="font-size:188%; font-weight:bold;font-family:Algerian;">VPM's B.N. Bandodkar
                  College
                  of Science, Thane, Autonomous</span>
                <br> <span style="font-size:x-large;font-style:italic; font-family: Times new roman, Helvetica, sans-serif;font-size: 100%; font-weight: 10%;
            ">
                  Chendani Bandar Road, Thane(West) - 400601</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><br><br>
      <hr>
      <div style="padding-left:28%;">
        <pre>
  <span style="font-size:100%;font-family: 'Times New Roman', Times, serif;">
Receipt no. :<?php echo  $_POST["Recipt"];?>                 Date :<?php echo  $_POST["date"];?> 
class:-- <?php echo $_POST["class"]; ?>.
Name of the Studen:-- <?php echo $_POST["name"]; ?> 
PRN. No:--   <?php echo $_POST["prn_no"]; ?>   
Transaction Id :-- <?php echo $_POST["tran_id"]; ?>  
payment Mode:-- <?php echo $_POST["pay_mode"]; ?>   
Amount(RS.) Paid:--  <?php echo $_POST["amu_paid"]; ?>/-Rs.  
</span>
</pre>
      </div>
      <?php
   include_once('connection.php');

// setting post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $recipt = $_POST['Recipt'];
    $name = $_POST['name'];
    $calss =$_POST['class'];
    $prn_no =$_POST['prn_no'];
    $tran_id =$_POST['tran_id'];
    $pay_mode =$_POST['pay_mode'];
    $amu_paid=$_POST['amu_paid'];
    $date = date('y-m-d',strtotime($_POST['date']));
  // inserting to database
    $sql =   "INSERT INTO `student_receipt` (`Recipt`, `s_name`, `s_class`, `s_prn`, `trans_id`, `pay_mode`, `amu_paid`,`date`)
     VALUES ('$recipt', '$name', '$calss', '$prn_no', '$tran_id', '$pay_mode', ' $amu_paid',' $date')";
     $result= mysqli_query($conn,$sql);
     if($result){
      echo '<script type="text/javascript">';
      echo 'alert("click ok to view receipt")';
      echo '</script>';
    
      }
     
}  

?>
      <table align="center" border=1 width="50%">
        <tr>
          <th width=250>Descrpition</th>
          <th width=80>amount in RS.</th>
        </tr>
        <tr>
          <td>Tuition fee<br>Library fee<br>Gymkahana Fee<br>Other fee/Extra curricular activity fee<br>college exam fee
            <br>Enrollment fee<br>
            Disaster relife fund<br>Adm. Processing Fee<br>Document Verification Fee<br>
            Utility fee<br>Magazine fee<br>I D and Library cards fee<br>Group insurance fee<br>
            Student Welfare fund<br>Development fee<br>Vice chancellor fund
            <br>Univ. sports & Cultural activity<br>E-Suidha<br>E-Charges<br>Laboratory fee<br>Caution money<br>Library
            Deposite<br>Laboratory Deposit
            <br>Alumni Association fee<br>N.S.S fee<br>Prospectous fee<br>Computer practical fee<br>Project fee
          </td>

          <td>
            <?php
  $calss =$_POST['class'];
  if($_POST['class']=="FYBSC Computer Science"){
   include_once('fee strct/fycs.php');
  }
  elseif($_POST['class']=="SYBSC Computer Science"){
   include_once('fee strct/sycs.php');
  }
  elseif($_POST['class']=="TYBSc Computer Science"){
   include_once('fee strct/sycs.php');
  }

  ?>
          </td>
        </tr>
        <tr>
          <td align="center">TOTAL</td>
          <td>
            <?php $ap=$_POST['amu_paid'];
      echo "$ap";    ?>
          </td>
        </tr>
        </td>
        </tr>
      </table>
      <h4 style="aling:center;padding-left:25%;">Note :-This is computer generated receipt and do not require signature.
      </h4>
    </div>
  </div>
  </div>
  <div class="footer">
    <button class="btn" id=" printpagebutton" onclick="printDiv('printableArea')" /> <i class="fa fa-download"></i>
    Download or Print </button>
    <a style="color:white;text-decoration:none" href="register.php"><button id="back" name="back"> BACK </button></a>
  </div>

</body>

</html>