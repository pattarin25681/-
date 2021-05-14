<?php
  session_start();
  include 'assets/php/connect.php';
  if(!isset($_SESSION['staff_id'])) header("location:index.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-874">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>





<div class="wrapper">
    <!-- Sidebar -->
    <!-- <?php include 'assets/object/sidebar2.php'?> -->
    <!-- Page Content -->
    
    <div id="content">
        <?php include 'assets/object/navBar.php'?>
        
        
        
                   










                   
                    <?php 
                      echo "<a href='#' id='download_link' onClick='ExcelReport();''>Download</a>";
                      ?>


<!-- เรียกใช้ javascript สำหรับ export ไฟล์ excel  -->
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"  ></script>
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
</script>
<style type="text/css">

table {
border-collapse: collapse;
width:40%;
}

table, th, td {
border: 1px solid black;
}

</style>
        









        
    </div>
</div>
                
      


      



      
      
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>



<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<script>
    $(document).ready(function () {

       
       

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });


    });
</script>
</body>
</html>






  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>