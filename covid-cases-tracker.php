<html>
<head>
<title>Covid-19 Cases</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//use.frontaweome.com/releases/v5.0.7/css/all.css">
</head>
<body>

<table>
<?php
    $data = file_get_contents('https://api.covid19india.org/data.json');
    $coronalive = json_decode($data,true);
?>

<thead>
  <tr>
      <th>dailyconfirmed</th>
	  <th>dailydeceased</th>
	  <th>dailyrecovered</th>
	  <th>totalconfirmed</th>
	  <th>totaldeceased</th>
   	  <th>totalrecovered</th>
  </tr>
</thead>
<tr>
     <td> <?php echo $coronalive['cases_time_series']['dailyconfirmed']; ?></td>
	 <td> <?php echo $coronalive['cases_time_series']['dailydeceased']; ?></td>
     <td> <?php echo $coronalive['cases_time_series']['dailyrecovered']; ?></td>
     <td> <?php echo $coronalive['cases_time_series']['totalconfirmed']; ?></td>
     <td> <?php echo $coronalive['cases_time_series']['totaldeceased']; ?></td>
     <td> <?php echo $coronalive['cases_time_series']['totalrecovered']; ?></td>
 </tr>

</table>
<div class="card-body table-reponsive">
<table class="table table-bordered table-striped">

<thead>
   <tr>
      <th>State/UT</th>
      <th>Confirmed</th>
      <th>Active</th>
      <th>Recoverd</th>
      <th>Deaths</th>
   </tr>
</thead>
<?php
$data = file_get_contents('https://api.covid19india.org/data.json');
  $coronalive = json_decode($data,true);
  $statecount = count($coronalive['statewise']);
  
 
  $i = 1;
  
  
  while($i < $statecount){
      $dayconfirmed =$coronalive['statewise'][$i]['deltaconfirmed'];
      $dayrecoverd =$coronalive['statewise'][$i]['deltarecovered'];
      $daydeaths =$coronalive['statewise'][$i]['deltadeaths'];
      $statename =$coronalive['statewise'][$i]['state'];
	  $dayrecoverd =$coronalive['statewise'][$i]['deltarecovered'];
    
?>
 <tr>
     <td> <?php echo $statename; ?></td>
	 <td> <?php echo $coronalive['statewise'][$i]['confirmed']; ?></td>
     <td> <?php echo $coronalive['statewise'][$i]['active']; ?></td>
     <td> <?php echo $coronalive['statewise'][$i]['recovered']; ?></td>
     <td> <?php echo $coronalive['statewise'][$i]['deaths']; ?></td>
 </tr>
 <?php
     $i++;
     } 
 ?>
</table></div>
</body>
</html>