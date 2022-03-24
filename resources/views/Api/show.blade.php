@extends('Api.layout')
@section('content')
 
 
<div class="card-center" style="padding-right:300px;padding-left:300px;">
  <div class="card-header" style="padding-right:250px;padding-left:250px;"><h2>API Details</h2></div>
  <div class="card-body-center">
   
 
        <div class="card-center" style="padding-right:50px;padding-left:50px;">
        <p class="card-texts"><b>Process Name</b> : {{ $Api->proccessName }}</p>
        <p class="card-texts"><b>API Title</b> : {{ $Api->apiTitle }}</p>
        <p class="card-texts"><b>API Type</b> : {{ $Api->apiType }}</p>
        <p class="card-texts"><b>API Url</b> : {{ $Api->apiUrl }}</p>
        <p class="card-texts"><b>Token Type</b> : {{ $Api->tokenType }}</p>
        <p class="card-texts"><b>Token</b> : {{ $Api->token }}</p>
        <p class="card-texts"><b>Int API</b> : {{ $Api->intApi }}</p>
        <p class="card-texts"><b>Status</b> : {{ $Api->status }}</p>
        <p class="card-texts"><b>Application Manager</b> : {{ $Api->applicationManager }}</p>
  </div>
  
    </hr>
  
  </div>
</div>