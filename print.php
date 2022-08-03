<?php
//php script for printing receipt.
    include('header.php');
   include_once('connection.php');
   $srno = $_GET['sr_no'];
   $showquerry = " select * from student_receipt where sr_no={$srno}";
   $showdate = mysqli_query($conn, $showquerry );
  
   $arrdata = mysqli_fetch_array($showdate);
   
// setting post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $srnoupdate = $_GET['sr_no'];
    $recipt = $_POST['Recipt'];
    $name = $_POST['name'];
    $calss =$_POST['class'];
    $prn_no =$_POST['prn_no'];
    $tran_id=$_POST['tran_id'];
    $pay_mode =$_POST['pay_mode'];
    $amu_paid=$_POST['amu_paid'];
    $date = date('y-m-d',strtotime($_POST['date']));
  
    $updatesql  =   "UPDATE student_receipt
    SET sr_no=' $srnoupdate',recipt='$recipt ',s_name= ` $name',s_class='$calss',s_prn='$prn_no',rans_id='$tran_id'
    ,`pay_mode`=' $pay_mode',`amu_paid`='$amu_paid',`date`='$date' WHERE sr_no = ' $srnoupdate'";
   $result= mysqli_query($conn,$updatesql);
     if($result){
      echo '<script type="text/javascript">';
      echo 'alert("click ok to view receipt")';
      echo '</script>';
    
      }
   
}  
//
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>print page</title>
</head>
<!-- css for the web page -->
<link rel="stylesheet" href="css/style.css">


<body>
  <div id="main">


    <!-- user interface -->
    <div class=" interface">

      <form action="/test/receipt.php" method="post">
        <fieldset>
          <legend>
            <h2 style="text-align: center;">Verify Details And Click On Submit</h2>
          </legend>
          <table align="center" cellspacing="12px" border=0>

            <tr>
              <td><label for="Receipt" style="font-size: 18px;font-weight: 200;"> Receipt NO </label><span
                  style="color:red;">*</span>

              <td>
                <input type="text" name="Recipt" value="<?php echo $arrdata ['recipt']; ?>"
                  placeholder="Enter the receipt no" size="35" readonly />
              </td>
            </tr>
            <tr>
              <td><label for="name" style="font-size: 18px;font-weight: 200;"> Name </label><span
                  style="color:red;">*</span>

              <td>
                <input type="text" name="name" value="<?php echo $arrdata ['s_name']; ?>" placeholder="Enter your name"
                  size="35" readonly />
              </td>
            </tr>
            <tr>
              <td><label for="date" style="font-size: 18px;font-weight: 200;"> Date </label><span
                  style="color:red;">*</span>

              <td>
                <input type="date" name="date" value="<?php echo $arrdata ['date'];?>" readonly />
              </td>
            </tr>

            <tr>
              <td>
                <label for="PRN no." style="font-size: 18px;font-weight: 200;"> PRN . NO. </label><span
                  style="color:red;">*</span>

              <td>
                <input type="text" name="prn_no" value="<?php echo $arrdata ['s_prn']; ?>"
                  placeholder="Enter your PRN NO." size="35" read-on readonly />
              </td>
            </tr>
            <tr>
              <td><label for="receipt" style="font-weight: 200; font-size: 20px;"></label><span
                  style="font-size: 20px;font-weight: 200;"> Class</span></label><span style="color:red;">*</span>

              <td> <select name="class" type="option" class="form-control">
                  <option value="">--SELECT--</OPTION>
                  <option value="FYBSC Computer Science" <?php if($arrdata['s_class']=='FYBSC Computer Science'
                    ){echo "selected" ;} ?>>FYBSC Computer Science</OPTION>
                  <option value="SYBSC Computer Science" <?php if($arrdata['s_class']=='SYBSC Computer Science'
                    ){echo "selected" ;} ?>>SYBSC Computer Science</OPTION>
                  <option value="TYBSc Computer Science" <?php if($arrdata['s_class']=='TYBSc Computer Science'
                    ){echo "selected" ;} ?> >TYBSc Computer Science</OPTION>
                  <option value="BSC Information Technology" <?php if($arrdata['s_class']=='BSC Information Technology'
                    ){echo "selected" ;} ?>>FYBSC Information Technology</OPTION>
                  <option value="BSC IN Physics" <?php if($arrdata['s_class']=='BSC IN Physics' ){echo "selected" ;} ?>
                    >BSC IN Physics</OPTION>
                  <option value="BSC IN Mathematics" <?php if($arrdata['s_class']=='BSC IN Mathematics'
                    ){echo "selected" ;} ?>>BSC IN Mathematics</OPTION>
                  <option value="BSC IN Chemistry" <?php if($arrdata['s_class']=='BSC IN Chemistry' ){echo "selected" ;}
                    ?>>BSC IN Chemistry</OPTION>
                  <option value="BSC IN Botony" <?php if($arrdata['s_class']=='BSC IN Botony' ){echo "selected" ;} ?>
                    >BSC IN Botony</OPTION>
                </select></td>
            </tr>
            <tr>
              <td><label for="Transaction ID" style="font-size: 18px;font-weight: 200;"> Transaction ID </label><span
                  style="color:red;">*</span>

              <td>
                <input type="text" name="tran_id" value="<?php echo $arrdata ['trans_id']; ?>" size="35"
                  placeholder="Enter your Transaction id" readonly />
              </td>
            </tr>
            <tr<td>
              <td><label for="pay mode" style="font-size: 18px;font-weight: 200;"></label> <span
                  style="font-size: 20px;font-weight: 200;">payment mode</span></label><span style="color:red;">*</span>

              <td>
                <select name="pay_mode" type="option" class="form-control">
                  <option value="">--SELECT--</OPTION>
                  <option value="SBI Collect" <?php if($arrdata['pay_mode']=='SBI Collect' ){echo "selected" ;} ?>>SBI
                    Collect</OPTION>
                  <option value="GOOGEL PAY" <?php if($arrdata['pay_mode']=='GOOGLE PAY' ){echo "selected" ;} ?>> GOOGLE
                    PAY </OPTION>
                  <option value="PAYTM" <?php if($arrdata['pay_mode']=='PAYTM' ){echo "selected" ;} ?>>PAYTM</OPTION>
                  <option value="PHONEPE" <?php if($arrdata['pay_mode']=='PHONEPE' ){echo "selected" ;} ?>>PHONEPE
                  </OPTION>
                  <option value="ONLINE" <?php if($arrdata['pay_mode']=='ONLINE' ){echo "selected" ;} ?>>ONLINE</option>
                  <option value="OTHER" <?php if($arrdata['pay_mode']=='OTHER' ){echo "selected" ;} ?>>OTHER</OPTION>
                </select>
              </td>
              </tr>
              <tr>
                <td> <label for=" Amount Paid" style="font-size: 18px;font-weight: 200;"> Amount Paid </label><span
                    style="color:red;">*</span>

                <td>
                  <input type="text" name="amu_paid" value="<?php echo $arrdata ['amu_paid']; ?>"
                    placeholder="Enter the amount you paid" size="35" readonly />
                </td>
              </tr>
              <tr>
                <td></td>
                <td> <input type="submit" class="btn" id="btn1">
                </td>
              </tr>
    </div>
    </form>
</body>

</html>