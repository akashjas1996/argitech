<?php
   include '../inc/dbconnection.php';
   if(isset($_POST['category']))
   {
       if($_POST['category']=='member'){
           if(isset($_POST['entry_id']))
           {
                $member_id = $_POST['entry_id'];
                $query_del_mem = "DELETE FROM `family_member` WHERE member_id='$member_id'";
                $res1 = mysqli_query($link, $query_del_mem);
            }
        }
        else if($_POST['category']=='land'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `land_holding` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

        else if($_POST['category']=='crop'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `crop_cultivation` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

        else if($_POST['category']=='income'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `income_details` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

        else if($_POST['category']=='dailywage'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `daily_wage` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

        else if($_POST['category']=='livestock'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `livestock` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

        else if($_POST['category']=='enterprise'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `enterprise` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }

         else if($_POST['category']=='allied'){
            if(isset($_POST['entry_id']))
            $entry_id = $_POST['entry_id'];
            $query_del_land = "DELETE FROM `allied` WHERE entry_id='$entry_id'";
            $res_del_mem = mysqli_query($link, $query_del_land);
        }
   
   } 
?>