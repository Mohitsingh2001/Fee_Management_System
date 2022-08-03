<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'header.php';   ?>
  <div id="main">


    <!-- user interface -->

    <div class=" interface">

      <form action="/test/receipt.php" method="post">
        <p style="margin-top:0px;background-color:pink; ">
          <!-- <marquee><span style="color:red;"> fields marked with* are required field</span></marquee> -->
        </p>
        <fieldset>

          <legend>
            <h1 style="text-align: center; text-shadow: 0 0 2px #FF0000, 0 0 5px #eee;  ">Enter Details To Print Recipt
            </h1>
          </legend>

          <table align="center" cellspacing="12px" border=0>

            <tr>
              <td><label for="Recipt" style="font-size: 18px;font-weight: 200;"> Receipt NO </label><span
                  style="color:red;">*</span>
              <td>
                <input class="infoPlaceholder" type="text" name="Recipt" placeholder="Enter the receipt no" size="35"
                  required />

              </td>
            </tr>
            <tr>
              <td><label for="name" style="font-size: 18px;font-weight: 200;"> Name </label> <span
                  style="color:red;">*</span>
              <td>
                <input class="infoPlaceholder" type="text" name="name" placeholder="Enter your name" size="35"
                  required />

              </td>
            </tr>
            <tr>
              <td><label for="date" style="font-size: 18px;font-weight: 200;"> Date </label> <span
                  style="color:red;">*</span>
              <td>
                <input class="infoPlaceholder" type="date" name="date" placeholder="--select date--" size="35"
                  required />

              </td>
            </tr>

            <tr>
              <td>
                <label for="PRN no." style="font-size: 20px;font-weight: 200;"> PRN . NO. </label><span
                  style="color:red;">*</span>
              <td>
                <input class="infoPlaceholder" type="text" name="prn_no" placeholder="Enter your PRN NO" size="35"
                  required />

              </td>
            </tr>
            <tr>
              <td><label for="class" style="font-weight: 200; font-size: 20px;"></label> <span
                  style="font-size: 20px;font-weight: 200;">Class</span></label><span style="color:red;">*</span>
              <td> <select name="class" type="option" class="form-control">
                  <option value="">--SELECT--</OPTION>
                  <option value="FYBSC Computer Science">FYBSC Computer Science</OPTION>
                  <option value="SYBSC Computer Science">SYBSC Computer Science</OPTION>
                  <option value="TYBSc Computer Science">TYBSc Computer Science</OPTION>
                  <option value="BSC Information Technology">BSC Information Technology</OPTION>
                  <option value="BSC IN Physics">BSC IN Physics</OPTION>
                  <option value="BSC IN Mathematics">BSC IN Mathematics</OPTION>
                  <option value="BSC IN Chemistry">BSC IN Chemistry</OPTION>
                  <option value="BSC IN Botony">BSC IN Botony</OPTION>
                </select></td>
            <tr>
              <td><label for="Transaction ID" style="font-size:20px;font-weight: 20</td>0;"> Transaction ID </label>
                <span style="color:red">* </span>
              <td>
                <input class="infoPlaceholder" type="text" name="tran_id" size="35"
                  placeholder="Enter your Transaction id" required />

              </td>
            </tr>
            <tr<td>
              <td><label for="pay_mode"></label><span style="font-size: 20px;font-weight: 200;"> payment mode</span<
                    /label><span style="color:red;">*</span>
              <td>
                <select name="pay_mode" type="option" class="form-control">
                  <option value="">--SELECT--</OPTION>
                  <option value="SBI Collect">SBI Collect</OPTION>
                  <option value="GOOGLE PAY"> GOOGLE PAY</OPTION>
                  <option value="PAYTM">PAYTM</OPTION>
                  <option value="PHONEPE">PHONEPE</OPTION>
                  <option value="ONLINE">ONLINE</Option>
                  <option value="OTHER">OTHER</OPTION>
              </td>
              </tr>
              <tr>
                <td> <label for=" Amount Paid" style="font-size: 20px;font-weight: 200;"> Amount Paid </label><span
                    style="color:red;">*</span>
                <td>
                  <input class="infoPlaceholder" type="text" name="amu_paid" placeholder="Enter the amount you paid"
                    size="35" required />

                </td>
              </tr>
              <tr>
                <td></td>
                <td align="left" colspan="0"><a href="register.php"></a><input type="submit" class="btn"
                    id="btn1"><input type="reset" class="btn">
                </td>
              </tr>
    </div>
    </form>
</body>

</html>