@extends('app')

@section('htmlheader_title')
    User INfo
@endsection

<div>
<?php
if (isset($user)){
?>
<html>
<head>
<h2><header>User INformation</header></h2>
</head>
<body>
<div class="table-responsive">
<table class="table table-hover">
	<tr>
	<td><h4>Name:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->user_name }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Email ID:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->email_id }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Contact Number:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->phone_no }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Academy:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->academics }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Latitude:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->latitude }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Longitude:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->longitude }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Descripton:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->description }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Creation Time:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->created_at }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Last Updated:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	<td>{{ $user->updated_at }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
	</tr>
	<tr>
	<td><h4>Profile Pic:</h4></td>&nbsp;&nbsp;&nbsp;&nbsp;
	 <?php 
              $n1			=  $user->id;
        	  $n2			=  ".jpg"; ?>
	 <td><img src= "{{ URL::to('/') }}/uploads/<?php echo $n1.$n2;?>" alt="" width="62" height="62" ></td>
	</tr>
	</table>
<?php }?>
</div>
</body>
</html>
</div>