<?php
 session_start();
 include 'assets/php/connect.php';
 if(!isset($_SESSION['staff_id'])) header("location:index.php");
 
if(isset($_REQUEST["term"])){
    
    // $sql = "SELECT * FROM `queue` WHERE queue_id LIKE '%{$_REQUEST['term']}%' OR queue_date LIKE '%{$_REQUEST['term']}%' OR queue_time LIKE '%{$_REQUEST['term']}%'
    // OR `type_id` LIKE '%{$_REQUEST['term']}%'  OR mem_id LIKE '%{$_REQUEST['term']}%'";


$sql = "SELECT queue.queue_id,queue.queue_date,queue.queue_time,type_service.type_name,member.f_name,member.l_name FROM `queue` 
JOIN `type_service` ON queue.type_id=type_service.type_id 
JOIN `member` ON queue.mem_id=member.mem_id where queue_id LIKE '%{$_REQUEST['term']}%' OR queue_date LIKE '%{$_REQUEST['term']}%' OR queue_time LIKE '%{$_REQUEST['term']}%'
    OR `type_name` LIKE '%{$_REQUEST['term']}%'  OR f_name LIKE '%{$_REQUEST['term']}%' OR l_name LIKE '%{$_REQUEST['term']}%'";

    $sum=0;
    $query = $con->query($sql);
    $tt = "
    <div class='mb-3 col-lg-12' id='demo'>
    <table class='table table-striped table-bordered table-hover table-responsive-sm' style='width:100%'>
        <thead align='center'>
            <tr class='table-primary'>
                <th>รหัสการจองคิว</th>
                <th>วันที่จอง</th>
                <th>เวลาที่จอง</th>
                <th>ประเภทการรักษา</th>
                <th>ชื่อผู้จอง</th>
                <th>การทำงาน</th>
            </tr>
        </thead>
        <tbody>
        <div class='float-right '>
                       
        <form method ='post'action='./index_queue.php' >
                เลือกวัน : <input type='date'  id='start' name='trip-start'  class='form-control-sm' >
                  <input type='submit' class='btn btn-primary' value='ตกลง' >
                  
                </form>
                
                <button  class='btn btn-success' class='float-right' onclick=b()>แสดงข้อมูลทั้งหมด</button>
                </div>

                    <br>
        <div> 
        
        <div class='container'>
          <div class='row hidden-md-up'>";
          if(isset($_POST['trip-start'])){
            $a = (explode("-",$_POST['trip-start']));

            $date= $a[2]."-".$a[1]."-".$a[0];
           // echo $date;
            $sql = "SELECT queue.queue_id,queue.queue_date,queue.queue_time,type_service.type_name,member.f_name,member.l_name FROM `queue` 
            JOIN `type_service` ON queue.type_id=type_service.type_id 
            JOIN `member` ON queue.mem_id=member.mem_id where queue.queue_date = '$date' ";
          }
          if(isset($_REQUEST['b'])){
            unset($_POST);
            echo "<script>window.location = 'index_queue.php'</script>";
          }
        while ($result =$query->fetch_assoc()) { 
            $sum++;
            $d = explode("-",$result['queue_date']);

            $date=$d[0]."-".$d[1]."-".($d[2]+543);
            $tt .= "<tr><td>".$result['queue_id'];
            $tt .= "</td><td>".$date;
            $tt .= "</td><td>".$result['queue_time'];;
            $tt .=  "</td><td>".$result['type_name'];
            $tt .=  "</td><td>".$result['f_name']." ".$result['l_name'];
            $tt .=  "</td> 
            <td><center><a  class='btn btn-warning' onClick=update('".$result['queue_id']."')><i class='fas fa-edit'> </i></a>
            <a  class='btn btn-danger' onClick=remove('".$result['queue_id']."')><i class='fas fa-trash'> </i></a></td>
            </tr>";
            $n++;
         } ;

         $tt .= "</div>
         </div>
       </div>
       </tbody>
       <tfoot>
       <tr align='center'>
       <td colspan='5'>
           รวม
       </td>
       <td >
          $sum รายการ
       </td>
       </tr>
       
   </tfoot>
   </table>

   </div>";

   echo $tt;
}
 
// close connection
mysqli_close($link);
?>