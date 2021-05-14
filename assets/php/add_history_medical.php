<?php
session_start();
include "connect.php";

$id = $_POST['id'];
$type = $_POST['type'];
$patient = $_POST['patient'];


$diagid = $_POST['diagid'];
$nowdate = $_POST['nowdate'];
$nowtime = $_POST['nowtime'];
$namemed = $_POST['namemed'];
$name = $_POST['name'];

$nextdate = $_POST['nextdate'];
$nexttime = $_POST['nexttime'];
$ntid = $_POST['ntid'];




    
               $sql = "INSERT INTO `defence`(de_id,`type_id`,Info_id) VALUES('$id','$type','$patient')";

                if($con->query($sql)){
                    $sqldiag = "INSERT INTO `diagnosis` (di_id,di_NameSymptom,medic_id,Info_id,di_date,di_time,de_id)  VALUES('$diagid','$name','$namemed','$patient','$nowdate','$nowtime','$id')";
                    if($con->query($sqldiag)){
                        $sqlnt = "INSERT INTO `nexttime` (nt_id,nt_date,nt_time,de_id)  VALUES('$ntid','$nextdate','$nexttime','$id')";
              
                          if($con->query($sqlnt)){
                            $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
                            header("location:../../add_history_medical.php");
                          }else{
                            $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลรักษาผิดพลาด " . $con->error;
              
                            $deldef = "DELETE from `defence` where `de_id` = '$id'";
                            $con->query($deldef);
              
              
                            $deldiag = "DELETE from `diagnosis` where di_id = '$diagid'";
                            $con->query($deldiag);
              
                            $delnt = "DELETE from `nexttime` where nt_id = '$ntid'";
                            $con->query($delnt);
                            header("location:../../add_history_medical.php");
                          }
                    }else{
                        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลวินิจผิดพลาด " . $con->error;
              
                        $deldef = "DELETE from `defence` where `de_id` = '$id'";
                        $con->query($deldef1);
              
              
                        
                        header("location:../../add_history_medical.php");
                    }
                }
                else{
                    $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จเนื่องจากข้อมูลที่อยู่ผิดพลาด " . $con->error;
                    $deldef = "DELETE from `defence` where `de_id` = '$id'";
                    $con->query($deldef2);
                    header("location:../../add_history_medical.php");
                }
                
               

            //    if($con->query($sql)){
            //        $_SESSION['suc'] = "เพิ่มข้อมูลสำเร็จ";
            //        header("location:../../add_history_medical.php");
            //    }
            //    else{
            //        $_SESSION['error'] = "เพิ่มข้อมูลไม่สำเร็จ " . $con->error;
            //        header("location:../../add_history_medical.php");
            //    }
           



  


         





    
    