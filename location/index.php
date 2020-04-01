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
      <th>GP</th>


       <?php 
     echo '<td>';
     $query_gp1 = "SELECT DISTINCT gp FROM family WHERE state='Jharkhand' AND dist='Dhanbad'";
     $res_gp1 = mysqli_query($link, $query_gp1);
     while($row_gp1 = mysqli_fetch_assoc($res_gp1)){
      echo '<a href="#">';
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
      echo '<a href="#">';
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
      echo '<a href="#">';
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
      echo '<a href="#">';
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
      echo '<a href="#">';
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
      echo '<a href="#">';
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
      echo '<a href="#">';
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
<button class="btn btn-default">Bamnipal</i></button>
<button class="btn btn-default">Gomardih</i></button>
<button class="btn btn-default">Gopalpur</i></button>
<button class="btn btn-default">Jamadoba</i></button>
<button class="btn btn-default">Jamshedpur</i></button>
<button class="btn btn-default">Joda</i></button>
<button class="btn btn-default">Kalinga Nagar</i></button>
<button class="btn btn-default">Noamundi</i></button>
<button class="btn btn-default">Sukinda</i></button>
<button class="btn btn-default">West Bokaro</i></button>
</div>
    </div>
</div>

<script type="text/javascript">

</script>

<?php include '../footer.php'; ?>