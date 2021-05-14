<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
  if(isset($_REQUEST['t']) ) {
    $i = $_REQUEST['t'];
}else{
    header("location:index_history_medical.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ยินดีต้อนรับ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

</head>

<body>


    <!-- การนำเข้า Navbar -->
    <div id="content">
        <?php include 'assets/object/navBar.php'?>

    <div class="container my-5">
    <div class="col-md-10">
                    <h4>
                        ข้อมูลการรักษา <?php echo $item["Info_name"]." ".$item["Info_surename"]; ?>
                        
                    </h4>
                </div>
        <?php

                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                

                $sql = "SELECT * FROM ((( `diagnosis` INNER JOIN `patient_info` ON diagnosis.Info_id = patient_info.Info_id) INNER JOIN `defence` ON diagnosis.de_id = defence.de_id) JOIN type_service ON type_service.type_id = defence.type_id)INNER JOIN medic ON diagnosis.medic_id = medic.medic_id
                WHERE patient_info.Info_name='$i'";
                $result = $con->query($sql);
                $n=1;

                // เเสดงข้อมูลจากฐานข้อมูล
                while ($item = mysqli_fetch_assoc($result)) { ?>

        <!-- เเสดงข้อมูลจากฐานข้อมูล -->
        <table style="width:50%"  id="myTable" class="table table-striped table-bordered table-hover table-responsive-sm">
        <!-- Card -->
        <div class="card card-cascade wider reverse" style="width:50%">

            <!-- Card image -->
            <div class="view view-cascade overlay">
                <!-- <img class="img-thumbnail" src="images/logo1.png" alt="Card image cap" height="100" width="250">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a> -->
            </div>
            <div class="card-header" >
                ข้อมูลการรักษาครั้งที่ <?php echo $n; ?>
                </div>
            <!-- Card content -->
            
            
            <tr><th><h6 >รหัส : </th><td><?php echo $item["de_id"]; ?></h6></td></tr>
                <!-- Title -->
                <tr><th><h6 >มาเมื่อวันที่ : </th><td><?php echo $item["di_date"]; ?></h6></td></tr>
                <tr><th><h6 >ชื่อ : </th><td><?php echo $item["Info_name"]; ?></h6></td></tr>
                <!-- Subtitle -->
                <tr><th><h6 >นามสกุล : </th><td><?php echo $item["Info_surename"]; ?></h6></td></tr>
                <tr><th><h6 >ประเภทการรักษา : </th><td><?php echo $item["type_name"]; ?></h6></td></tr>
                <tr><th> <h6>วินิจฉัยอาการ : </th><td><?php echo $item["di_NameSymptom"]; ?></h6></td></tr>
                <tr><th><h6 >แพทย์ที่รักษา: </th><td><?php echo $item["medic_name"]." ".$item["medic_surname"]; ?></h6></td></tr>
               
            </div>
        </div>
        
        </table>
        <!-- <?php 
                      echo "<a class='btn btn-info' href='#' id='download_link' onClick='ExcelReport();''>Download</a>";
                      ?> -->
        <!-- Card -->
        <!-- <a class='btn btn-info'  href='#' id='download_link' onClick='ExcelReport();'>Download</a>  -->
        <?php
        $n++;
                }
                ?>

    </div>

    </div>
</div>
</div>
<?php include 'assets/object/footer.php'?> 
<!-- <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"  ></script>
<script>
function ExcelReport()//function สำหรับสร้าง ไฟล์ excel จากตาราง
    {
        var sheet_name="excel_sheet";/* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
        var elt = document.getElementById('myTable');/*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

        /*------สร้างไฟล์ excel------*/
        var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
        XLSX.writeFile(wb,'report.xlsx');//Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า report.xlsx
    }   
</script> -->



</body>


</html>

