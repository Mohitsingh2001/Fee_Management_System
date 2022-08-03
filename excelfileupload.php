
 <?php include 'header.php'
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sending Excel file to database</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
      body{
          background:hsl(300, 76%, 72%);
      }
      form{
        
          background-color: hsla(0, 0%, 60%,0.5);   
          align-items:center;
          border-radius:10px;
         box-shadow: 10px 15px 20px rgb(0 0 0 / 50%);
         padding: 30px 25px;
          height: 326px;
           width: 461px;
          
    }
  .form{
      margin-left:28%;
  }

     #file{
         border:transparent;
        border-radius:5px;    
     }
     #file:hover{
        cursor:pointer;
        
     }
  </style>
</head>
<body>
    
    <?php

$conn=mysqli_connect("localhost","root","","studentdb") ;

require_once('vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

 if(isset($_POST['submit'])){
     $allowed_ext = ['xls','csv','xlsx'];
     $filename=$_FILES['file']['name'];
     $checking = explode(".", $filename);
     $file_ext = end($checking);
     
    if(in_array($file_ext,$allowed_ext))
    {
        $targetPath = $_FILES['file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load( $targetPath);   
        $data = $spreadsheet->getActiveSheet()->toArray();
       
        foreach($data as $row)
        
           {
			   $sr_no  = $row['0'];
			   $recipt = $row['1'];
			   $s_name = $row['2'];  
			   $s_class = $row['3'];  
			   $s_prn  = $row['4'];  
			   $trans_id = $row['5'];  
			   $pay_mode = $row['6'];  
			   $amu_paid = $row['7'];  
			   $date = $row['8'];  
               
               $checkstudent = "SELECT * FROM `student_receipt` WHERE sr_no  ='$sr_no '";
               $checkstudent_result = mysqli_query($conn,$checkstudent);
               if (mysqli_num_rows($checkstudent_result)>0)
                {
                  $up_query = "UPDATE `student_receipt` SET `sr_no`='$sr_no',`recipt`='$recipt',`s_name`='$s_name',`s_class`='$s_class',`s_prn`='$s_prn',`trans_id`='$trans_id',`pay_mode`=' $pay_mode',`amu_paid`='$amu_paid',`date`='$date'  WHERE  sr_no  ='$sr_no '";
                  $up_result = mysqli_query($conn, $up_query);
                  $msg = 1;
                  
               }
                    else{ 
                         $in_query= " INSERT INTO `student_receipt`(`sr_no`, `recipt`, `s_name`, `s_class`, `s_prn`, `trans_id`, `pay_mode`, `amu_paid`, `date`) 
                         VALUES ('$sr_no','$recipt','$s_name','$s_class','$s_prn','$trans_id','$pay_mode','$amu_paid','$date ')";
                         $in_result = mysqli_query($conn,  $in_query);
                         $msg = 1;
               }
              
            } 
            if(isset($msg)){
               
               echo' <div class="alert alert-success alert-dismissible">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> Your Excel file is sucessfully uploaded to database click on X to close .
             </div>';
              
             
              
            }
          
}


    else {
      
        echo' <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Invalid file!</strong> Please choose a valid excel file of any extensions from (.csv,.xsxl,.xls)  click on X to close .
      </div>';
    }
 }
?>
<div class="form">
 <form method="post" action="excelfileupload.php" enctype="multipart/form-data" class="d-flex justify-content-center md-form" style="margin:10% ;">
    <div class="md-form">
         <fieldset>
              <legend>Upload your excel files here </legend>
              <!-- <input type="file" name="file" id="file" class="form-control"  required> -->
       <input type="file" name="file" id="file" class="form-control my-5" style="padding-bottom:5px" required > 
        <input type="submit" name="submit" class=" btn btn-success" value="Upload " style="margin-left :30px">
        <a href="register.php" class="btn btn-secondary" style="margin-left:25px; ">BACK</a>
    </div>  </fieldset>
</form></div>


  </html>