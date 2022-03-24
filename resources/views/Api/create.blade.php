@extends('Api.layout')
@section('content')
<?php

error_reporting(0);
$servername = "localhost";
$username="root";
$password = "";
$dbname = "tcs_payment_token";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
  die("connection failed:" . $conn->connect_error);
}
?>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="card">
  <div class="card-header" style="text-align:center;font-weight:bold; font-size:20px">Add New API</div>
  <div class="card-body">
      
      <form action="{{ url('Api') }}" method="post">
        {!! csrf_field() !!}
        <label>Process Name</label></br>
        <input type="text" name="proccessName" id="proccessName" class="form-control" required></br>
        <label>API Title</label></br>
        <input type="text" name="apiTitle" id="apiTitle" class="form-control" required></br>
        <label>API Type</label></br>
        <select name="apiType" id="apiType" class="form-control" required></br>
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="get">GET</option>
        <option value="post">POST</option>
</select></br>
        <!-- <input type="text" name="apiType" id="apiType" class="form-control" required></br> -->
        <label>API Url</label></br>
        <input type="url" name="apiUrl" id="apiUrl" class="form-control" required ></br>
        <label>Token Type</label></br>
        <select name="tokenType" id="tokenType" onChange="changeStatus()" class="form-control" required ></br>
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="expiry">Expiry</option>
        <option value="non-expiry">Non-Expiry</option>
</select></br>
        <!-- <input type="text" name="tokenType" id="tokenType" class="form-control"></br> -->
        <div id="tokenLabel">
        <label>Token</label></br>
        <input type="text" name="token" id="token" class="form-control"></br>
         </div>
        <label>Int API</label></br>
        <input type="text" name="intApi" id="intApi" class="form-control" required></br>
        <label>Status</label></br>
        <select name="status" id="status" class="form-control" required></br>
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="active">Active</option>
        <option value="inactive">In-Active</option>
</select></br>
        <label>Application Manager</label></br>
        <select type="text" name="applicationManager" id="applicationManager" class="form-control" required >
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <?php
                        $sql = mysqli_query($conn, "SELECT distinct NAME From am_application");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value='". $row['NAME'] ."'>" .$row['NAME'] ."</option>" ;
                          print_r( $row['NAME'] );
                        }
                      ?>
        </select>
        </br>
        <!-- <input type="text" name="status" id="status" class="form-control" required></br> -->
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>

<!-- <script>window.onload = function() { document.getElementById('token').style.display = 'none'; }</script> -->
<script>
 window.onload = function() { document.getElementById('token').style.display = 'none'; }
 window.onload = function() { document.getElementById('tokenLabel').style.display = 'none'; }
 

function changeStatus(){
  var tokens = document.getElementById("tokenType").value;

  //console.log("Insie",tokens);
  
  if(tokens == "expiry"){
  
    //console.log("inside If");
   // document.getElementById("token").style.visibility="hidden";
   $("#token").hide();
   $("#tokenLabel").hide();
  }
  else{
   // console.log("inside else")
    $("#token").show();
    $("#tokenLabel").show();
  }

}
</script>
@stop