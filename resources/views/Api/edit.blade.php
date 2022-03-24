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
<div class="card">
  <div class="card-header">Contact US Page</div>
  <div class="card-body">
      
      <form action="{{ url('Api/' .$Api->srNo) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="srNo" id="srNo" value="{{$Api->srNo}}" id="srNo" />
        <label>Process Name</label></br>
        <input type="text" name="proccessName" id="proccessName" value="{{$Api->proccessName}}" class="form-control"></br>
        <label>Api Title</label></br>
        <input type="text" name="apiTitle" id="apiTitle" value="{{$Api->apiTitle}}" class="form-control"></br>
        <label>Api Type</label></br>
        <select type="text" name="apiType" id="apiType" value="{{$Api->apiType}}" class="form-control">
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="get">GET</option>
        <option value="post">POST</option>
        </select></br>
        <!-- <input type="text" name="apiType" id="apiType" value="{{$Api->apiType}}" class="form-control"></br> -->
        <label>Api Url</label></br>
        <input type="text" name="apiUrl" id="apiUrl" value="{{$Api->apiUrl}}" class="form-control"></br>
        <label>Token Type</label></br>
        <select type="text" name="tokenType" id="tokenType" value="{{$Api->tokenType}}" class="form-control">
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="expiry">Expiry</option>
        <option value="non-expiry">Non-Expiry</option>
        </select></br>
        <!-- <input type="text" name="tokenType" id="tokenType" value="{{$Api->tokenType}}" class="form-control"></br> -->
        <label>Token</label></br>
        <input type="text" name="token" id="token" value="{{$Api->token}}" class="form-control"></br>
        <label>Int Api</label></br>
        <input type="text" name="intApi" id="intApi" value="{{$Api->apiUrl}}" class="form-control"></br>
        <label>Status</label></br>
        <select type="text" name="status" id="status" value="{{$Api->status}}" class="form-control">
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
        <option value="active">Active</option>
        <option value="inactive">DeActive</option>
        </select></br>
        <!-- <input type="text" name="status" id="status" value="{{$Api->status}}" class="form-control"></br> -->
        <label>Application Manager</label></br>
        <select type="text" name="applicationManager" id="applicationManager" value="{{$Api->applicationManager}}" class="form-control">
        <option disabled="disabled" selected="selected" >--Choose Option--</option>
                      <?php
                        $sql = mysqli_query($conn, "SELECT distinct NAME From am_application");
                        $row = mysqli_num_rows($sql);
                        while ($row = mysqli_fetch_array($sql)){
                        echo "<option value='". $row['NAME'] ."'>" .$row['NAME'] ."</option>" ;
                          print_r( $row['NAME'] );
                        }
                      ?>
        </select></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop