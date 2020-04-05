<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>
<head>

<link rel="stylesheet" href="
https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .canvasjs-chart-credit{
        display: none;
    }
</style>
<h1></h1>

<div class="container-fluid">
  <center> <h2>Region Wise</h2> </center>
  <br>
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
       <td align="center" colspan="6"> <a href="../report/?state=Jharkhand"> Jharkhand </a> </td>
       <td align="center" colspan="4"> <a href="../report/?state=Odisha"> Odisha </a> </td>
    </tr>

    <tr>
      <th scope="row">District</th>
       <td > <a href="../report/?dist=Dhanbad"> Dhanbad </a> </td>
       <td> <a href="../report/?dist=Ramgarh">  Ramgarh </a> </td>
       <td> <a href="../report/?dist=Bokaro">  Bokaro </a> </td>
       <td> <a href="../report/?dist=East Singhbhum">  East Singhbhum </a> </td>
       <td> <a href="../report/?dist=West Singhbhum">  West Singhbhum </a> </td>
       <td> <a href="../report/?dist=Saraikela-Kharnsawan">  Saraikela-Kharnsawan </a> </td>
       <td> <a href="../report/?dist=Jajpur">  Jajpur </a> </td>
       <td> <a href="../report/?dist=Keonjhar">  Keonjhar </a> </td>
       <td> <a href="../report/?dist=Ganjam">  Ganjam </a> </td>
       <td> <a href="../report/?dist=Sundargarh">  Sundargargh </a> </td>
    </tr>

    <tr>
      <th scope="row">Block</th>
       <td> 
            <a href="../report/?block=Dhanbad"> Dhanbad </a> <br><br>
            <a href="../report/?block=Tundi"> Tundi </a> <br><br>
            <a href="../report/?block=Baghmara"> Baghmara </a> <br><br>
            <a href="../report/?block=Balipur"> Baliapur </a> <br><br>
            <a href="../report/?block=Nirsa"> Nirsa </a> <br><br>

       </td>
       <td> 
        <a href="../report/?block=Ramgarh"> Ramgarh </a> <br><br>
        <a href="../report/?block=Mandu"> Mandu </a> <br><br>
       </td>
       <td> 
        <a href="../report/?block=Gomia"> Gomia </a> <br><br>
        <a href="../report/?block=Chandankyari"> Chandankyari </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Jamshedpur"> Jamshedpur </a> <br><br>
        <a href="../report/?block=Boram"> Boram </a> <br><br>
        <a href="../report/?block=Patamda"> Patamda </a> <br><br>
        <a href="../report/?block=Potka"> Potka </a> <br><br>
        <a href="../report/?block=Baghmara"> Bahargora </a> <br><br>
        <a href="../report/?block=Ghatsila"> Ghatsila </a> <br><br>
        <a href="../report/?block=Gurabandha"> Gurabandha </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Noamundi"> Noamundi </a> <br><br>
        <a href="../report/?block=Chaibasa"> Chaibasa </a> <br><br>
        <a href="../report/?block=khuntpani"> khuntpani </a> <br><br>
        <a href="../report/?block=Goilkera"> Goilkera </a> <br><br>
        <a href="../report/?block=Manjhari"> Manjhari </a> <br><br>
        <a href="../report/?block=Tantnagar"> Tantnagar </a> <br><br>
        <a href="../report/?block=Chkradharpur"> Chkradharpur </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Saraikela"> Saraikela </a> <br><br>
        <a href="../report/?block=Kharsawan"> Kharsawan </a> <br><br>
        <a href="../report/?block=Ichagarh"> Ichagarh </a> <br><br>
        <a href="../report/?block=Kuchai"> Kuchai </a> <br><br>
        <a href="../report/?block=Rajnagar"> Rajnagar </a> <br><br>
        <a href="../report/?block=Kukru"> Kukru </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Danagadi"> Danagadi </a> <br><br>
        <a href="../report/?block=Sukinda"> Sukinda </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Joda"> Joda </a> <br><br>
        <a href="../report/?block=Harichandanpur"> Harichandanpur </a> <br><br>
        <a href="../report/?block=Ghasipura"> Ghasipura </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Rangailunda"> Rangailunda </a> <br><br>
        <a href="../report/?block=Chatrapur"> Chatrapur </a> <br><br>
        <a href="../report/?block=Hinjlicut"> Hinjlicut </a> <br><br>
        <a href="../report/?block=Asca"> Asca </a> <br><br>
        <a href="../report/?block=Dighapondi"> Dighapondi </a> <br><br>
        <a href="../report/?block=Purshottampur"> Purshottampur </a> <br><br>
       </td>

       <td> 
        <a href="../report/?block=Rajgangpur"> Rajgangpur </a> <br><br>
        <a href="../report/?block=Kutra"> Kutra </a> <br><br>
       </td>


       
    </tr>
    <tr>
      <th>GP</th>


       <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='Dhanbad'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="../report/?GP="'. echo $row_gp1['gp'].'>';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

      <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='Ramgarh'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
       echo '<a href="../report/?GP="'.echo $row_gp1['gp'].'>';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

      <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='Bokaro'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
       echo '<a href="../report/?GP="'. echo $row_gp1['gp'].'>';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

      <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='East Singhbhum'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="../report/?GP='.$row_gp1['gp'].'"';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

      <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='West Singhbhum'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="../report/?GP="'. echo $row_gp1['gp'].'>';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

      <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='Saraikela-Kharnsawan'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="../report/?GP="'. echo $row_gp1['gp'].'>';
      echo $row_gp1['gp'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>
    </tr>

    
    <tr>
     <th>Village</th>
     <!-- GPs in Jharkhand, Dhanbad -->
     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='Dhanbad'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='Ramgarh'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='Bokaro'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='East Singhbhum'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>
     
     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='West Singhbhum'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Jharkhand' AND dist='Saraikela-Kharnsawan'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="../report/?village="'.$row_gp1['village'].'>';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Odisha' AND dist='Jajpur'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Odisha' AND dist='Keonjhar'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Odisha' AND dist='Ganjam'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>

     <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT village FROM family WHERE state='Odisha' AND dist='Sundargargh'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
      echo $row_gp1['village'];
      echo '</a>';
      echo '<br>';
     }
     echo '</td>';
     ?>
    </tr>
  </tbody>
</table>
<br>
<hr>


<center> <h2>TSRDS Operational Area Wise</h2> </center>
<br>
<style type="text/css">
  .btn{
    margin:5px;
  }

</style>
<div style="display: flex; justify-content: center;">
<a href="../report/?op=Bamnipal"> <button class="btn btn-default">Bamnipal</i></button> </a>
<a href="../report/?op=Gomardih"> <button class="btn btn-default">Gomardih</i></button> </a>
<a href="../report/?op=Gopalpur"> <button class="btn btn-default">Gopalpur</i></button> </a>
<a href="../report/?op=Jamadoba"> <button class="btn btn-default">Jamadoba</i></button> </a>
<a href="../report/?op=Jamshedpur"> <button class="btn btn-default">Jamshedpur</i></button> </a>
<a href="../report/?op=Joda"> <button class="btn btn-default">Joda</i></button> </a>
<a href="../report/?op=Kalinga Nagar"> <button class="btn btn-default">Kalinga Nagar</i></button> </a>
<a href="../report/?op=Noamundi"> <button class="btn btn-default">Noamundi</i></button> </a>
<a href="../report/?op=Sukinda"> <button class="btn btn-default">Sukinda</i></button> </a>
<a href="../report/?op=West Bokaro"> <button class="btn btn-default">West Bokaro</i></button> </a>
</div>
    </div>
</div>

<script type="text/javascript">

</script>

<?php include '../footer.php'; ?>