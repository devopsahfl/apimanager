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
    <div class="container">
        <div class="row">
 
            <div class="container">
                <div class="card">
                    <div class="card-header" style="padding-right:450px;padding-left:450px;"><h2>API  Manager</h2></div>
                        </form>
                    </div>
                    <div class="cardSearch" style="padding-left:450px;">
                                        <form action="" class="col-4">
                                        <div class="form-group">
                                        <label><b>Search By Process Name</b ></label>
                                            <select type="search" name="search" id="" class="form-control" value="{{$search}}">
                                            <option disabled="disabled" selected="selected" >--Choose Option--</option>
                                        <?php
                                        $sql = mysqli_query($conn, "SELECT distinct proccessName From api_management");
                                        $row = mysqli_num_rows($sql);
                                        while ($row = mysqli_fetch_array($sql)){
                                        echo "<option value='". $row['proccessName'] ."'>" .$row['proccessName'] ."</option>" ;
                                        print_r( $row['proccessName'] );
                                        }
                                    ?>
                                </select>
                                            
                                            <button type="submit"class="btn btn-primary" style="text-align:center;position:relative; -ms-transform:translate(50%, 50%); transform:translate(60%, 60%);">Search</button>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="card-body">
                                    <a href="{{ url('/Api/create') }}" class="btn btn-success btn-sm" title="Add New Source">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                     
                        
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">SR NO</th>
                                        <th scope="col">Process Name</th>
                                        <th scope="col">API Title</th>
                                        <th scope="col">API Type</th>
                                        <th scope="col">API Url</th>
                                        <th scope="col">Token Type</th>
                                        <th scope="col">Token</th>
                                        <th scope="col">Int API</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Application Manager</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($Api as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->proccessName }}</td>
                                        <td>{{ $item->apiTitle }}</td>
                                        <td>{{ $item->apiType }}</td>
                                        <td>{{ $item->apiUrl }}</td>
                                        <td>{{ $item->tokenType }}</td>
                                        <td>{{ $item->token }}</td>
                                        <td>{{ $item->intApi }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->applicationManager }}</td>
 
                                        <td>
                                            <a href="{{ url('/Api/' . $item->srNo) }}" title="View Api"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/Api/' . $item->srNo . '/edit') }}" title="Edit Api"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                        <div class="col">
                                            <form method="POST" action="{{ url('/Api' . '/' . $item->srNo) }}" accept-charset="UTF-8">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <!-- <button type="submit" class="btn btn-danger btn-sm" title="Delete Api" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button> -->
                                            </form>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection