<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>

<style>
    .canvasjs-chart-credit{
        display: none;
    }
</style>
<h1></h1>

<div class="container-fluid">
    <div class="row">
        <table class="table table-striped table-bordered">
  <!-- <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
      <th scope="col">Block</th>
      <th scope="col">GP</th>
      <th scope="col">Village</th>
      <th scope="col">Unit</th>

    </tr>
  </thead> -->
  <tbody>
    <tr>
      <th scope="row">State</th>
       <td align="center" colspan="6"> <a href="#"> Jharkhand </a> </td>
       <td align="center" colspan="4"> <a href="#"> Odisha </a> </td>
    </tr>

    <tr>
      <th scope="row">District</th>
       <td > <a href="#"> Dhanbad </a> </td>
       <td> <a href="#">  Ramgarh </a> </td>
       <td> <a href="#">  Bokaro </a> </td>
       <td> <a href="#">  East Singhbhum </a> </td>
       <td> <a href="#">  West Singhbhum </a> </td>
       <td> <a href="#">  Saraikela-Kharnsawan </a> </td>
       <td> <a href="#">  Jajpur </a> </td>
       <td> <a href="#">  Keonjhar </a> </td>
       <td> <a href="#">  Ganjam </a> </td>
       <td> <a href="#">  Sundargargh </a> </td>
    </tr>

    <tr>
      <th scope="row">Block</th>
       <td> 
            <a href="#"> Dhanbad </a> <br><br>
            <a href="#"> Tundi </a> <br><br>
            <a href="#"> Baghmara </a> <br><br>
            <a href="#"> Baliapur </a> <br><br>
            <a href="#"> Nirsa </a> <br><br>

       </td>
       <td> 
        <a href="#"> Ramgarh </a> <br><br>
        <a href="#"> Mandu </a> <br><br>
       </td>
       <td> 
        <a href="#"> Gomia </a> <br><br>
        <a href="#"> Chandankyari </a> <br><br>
       </td>

       <td> 
        <a href="#"> Jamshedpur </a> <br><br>
        <a href="#"> Boram </a> <br><br>
        <a href="#"> Patamda </a> <br><br>
        <a href="#"> Potka </a> <br><br>
        <a href="#"> Bahargora </a> <br><br>
        <a href="#"> Ghatsila </a> <br><br>
        <a href="#"> Gurabandha </a> <br><br>
       </td>

       <td> 
        <a href="#"> Noamundi </a> <br><br>
        <a href="#"> Chaibasa </a> <br><br>
        <a href="#"> khuntpani </a> <br><br>
        <a href="#"> Goilkera </a> <br><br>
        <a href="#"> Manjhari </a> <br><br>
        <a href="#"> Tantnagar </a> <br><br>
        <a href="#"> Chkradharpur </a> <br><br>
       </td>

       <td> 
        <a href="#"> Saraikela </a> <br><br>
        <a href="#"> Kharsawan </a> <br><br>
        <a href="#"> Ichagarh </a> <br><br>
        <a href="#"> Kuchai </a> <br><br>
        <a href="#"> Rajnagar </a> <br><br>
        <a href="#"> Kukru </a> <br><br>
       </td>

       <td> 
        <a href="#"> Danagadi </a> <br><br>
        <a href="#"> Sukinda </a> <br><br>
       </td>

       <td> 
        <a href="#"> Joda </a> <br><br>
        <a href="#"> Harichandanpur </a> <br><br>
        <a href="#"> Ghasipura </a> <br><br>
       </td>

       <td> 
        <a href="#"> Rangailunda </a> <br><br>
        <a href="#"> Chatrapur </a> <br><br>
        <a href="#"> Hinjlicut </a> <br><br>
        <a href="#"> Asca </a> <br><br>
        <a href="#"> Dighapondi </a> <br><br>
        <a href="#"> Purshottampur </a> <br><br>
       </td>

       <td> 
        <a href="#"> Rajgangpur </a> <br><br>
        <a href="#"> Kutra </a> <br><br>
       </td>


       
    </tr>

    <tr>
      <th scope="row">GP</th>
       <td> 

        <?php 
        $query_gp11 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Dhanbad' AND block='Dhanbad'";
        $res_gp11 = mysqli_query($link, $query_gp11);
        while($row_gp11 = mysqli_fetch_assoc($res_gp11)){
          echo ' <a href="#"> '.$row_gp11['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp12 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Dhanbad' AND block='Tundi'";
        $res_gp12 = mysqli_query($link, $query_gp12);
        while($row_gp1 = mysqli_fetch_assoc($res_gp12)){
          echo ' <a href="#"> '.$row_gp12['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp13 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Dhanbad' AND block='Baghmara'";
        $res_gp13 = mysqli_query($link, $query_gp13);
        while($row_gp1 = mysqli_fetch_assoc($res_gp13)){
          echo ' <a href="#"> '.$row_gp13['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp14 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Dhanbad' AND block='Baliapur'";
        $res_gp14 = mysqli_query($link, $query_gp14);
        while($row_gp14 = mysqli_fetch_assoc($res_gp14)){
          echo ' <a href="#"> '.$row_gp14['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp15 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Dhanbad' AND block='Nirsa'";
        $res_gp15 = mysqli_query($link, $query_gp15);
        while($row_gp5 = mysqli_fetch_assoc($res_gp15)){
          echo ' <a href="#"> '.$row_gp15['gp'].' </a> ';
        }
        ?>
      </td>



      <td> 
        <?php 
        $query_gp16 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Ramgarh' AND block='Ramgarh'";
        $res_gp16 = mysqli_query($link, $query_gp16);
        while($row_gp16 = mysqli_fetch_assoc($res_gp16)){
          echo ' <a href="#"> '.$row_gp16['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp17 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Ramgarh' AND block='Mandu'";
        $res_gp17 = mysqli_query($link, $query_gp17);
        while($row_gp17 = mysqli_fetch_assoc($res_gp17)){
          echo ' <a href="#"> '.$row_gp17['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>
      </td>

       <td> 
        <?php 
        $query_gp18 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Bokaro' AND block='Gomia'";
        $res_gp18 = mysqli_query($link, $query_gp18);
        while($row_gp18 = mysqli_fetch_assoc($res_gp18)){
          echo ' <a href="#"> '.$row_gp18['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp19 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='Bokaro' AND block='Chandankyari'";
        $res_gp19 = mysqli_query($link, $query_gp19);
        while($row_gp19 = mysqli_fetch_assoc($res_gp19)){
          echo ' <a href="#"> '.$row_gp19['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>
      </td>


      <td> 
        <?php 
        $query_gp20 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Jamshedpur'";
        $res_gp20 = mysqli_query($link, $query_gp20);
        while($row_gp20 = mysqli_fetch_assoc($res_gp20)){
          echo ' <a href="#"> '.$row_gp20['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp21 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Boram'";
        $res_gp21 = mysqli_query($link, $query_gp21);
        while($row_gp21 = mysqli_fetch_assoc($res_gp21)){
          echo ' <a href="#"> '.$row_gp21['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp22 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Patamda'";
        $res_gp22 = mysqli_query($link, $query_gp22);
        while($row_gp22 = mysqli_fetch_assoc($res_gp22)){
          echo ' <a href="#"> '.$row_gp22['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp23 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Potka'";
        $res_gp23 = mysqli_query($link, $query_gp23);
        while($row_gp23 = mysqli_fetch_assoc($res_gp23)){
          echo ' <a href="#"> '.$row_gp23['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp24 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Bahargora'";
        $res_gp24 = mysqli_query($link, $query_gp24);
        while($row_gp24 = mysqli_fetch_assoc($res_gp24)){
          echo ' <a href="#"> '.$row_gp24['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp25 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Ghatsila'";
        $res_gp25 = mysqli_query($link, $query_gp25);
        while($row_gp25 = mysqli_fetch_assoc($res_gp25)){
          echo ' <a href="#"> '.$row_gp25['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp26 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='East Singhbhum' AND block='Gurabandha'";
        $res_gp26 = mysqli_query($link, $query_gp26);
        while($row_gp19 = mysqli_fetch_assoc($res_gp26)){
          echo ' <a href="#"> '.$row_gp26['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>
      </td>

      <td> 
        <?php 
        $query_gp50 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Noamundi'";
        $res_gp50 = mysqli_query($link, $query_gp50);
        while($row_gp50 = mysqli_fetch_assoc($res_gp50)){
          echo ' <a href="#"> '.$row_gp50['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp51 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Chaibasa'";
        $res_gp51 = mysqli_query($link, $query_gp51);
        while($row_gp51 = mysqli_fetch_assoc($res_gp51)){
          echo ' <a href="#"> '.$row_gp51['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp52 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='khuntpani'";
        $res_gp52 = mysqli_query($link, $query_gp52);
        while($row_gp52 = mysqli_fetch_assoc($res_gp52)){
          echo ' <a href="#"> '.$row_gp52['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp53 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Goilkera'";
        $res_gp53 = mysqli_query($link, $query_gp53);
        while($row_gp53 = mysqli_fetch_assoc($res_gp53)){
          echo ' <a href="#"> '.$row_gp53['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp54 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Manjhari'";
        $res_gp54 = mysqli_query($link, $query_gp54);
        while($row_gp54 = mysqli_fetch_assoc($res_gp54)){
          echo ' <a href="#"> '.$row_gp54['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>


        <?php 
        $query_gp55 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Tantnagar'";
        $res_gp55 = mysqli_query($link, $query_gp55);
        while($row_gp55 = mysqli_fetch_assoc($res_gp55)){
          echo ' <a href="#"> '.$row_gp55['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>

        <?php 
        $query_gp56 = "SELECT * FROM `family` WHERE state='Jharkhand' AND dist='West Singhbhum' AND block='Chkradharpur'";
        $res_gp56 = mysqli_query($link, $query_gp56);
        while($row_gp56 = mysqli_fetch_assoc($res_gp56)){
          echo ' <a href="#"> '.$row_gp56['gp'].' </a> ';
          echo '<br><br>';
        }
        ?>
      </td>





    </tr>
    <tr>
      <th scope="row">Village</th>
      <td> <a href="#"> Odisha </a> </td>
      <td> <a href="#"> Thornton </a></td>
      <td> <a href="#"> @fat </a> </td>
      <td> <a href="#"> @fat </a> </td>
      <td> <a href="#"> @fat </a> </td>
      <td> <a href="#"> @fat </a> </td>
    </tr>

  </tbody>
</table>
    </div>
</div>

<script type="text/javascript">

</script>

<?php include '../footer.php'; ?>