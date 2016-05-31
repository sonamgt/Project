@extends('app')

@section('htmlheader_title')
    Home
@endsection

<div>
<h3><a href="{{ url('/add') }}">Add User</a></h3>
<h3><a href="{{ url('/explore') }}">Explore</a></h3>
</div>

<div class="table-responsive">
<?php
if (isset($users)){
	$count = 1;
?>

	<table  class="table table-hover">
	  <thead>
		    <tr>
		      <th>No.</th>
		      <th>User Name</th>
		      <th>Email Id</th>
		      <th>Contact No</th>
		      <th style= "text-align: center;">Action</th>
		    </tr>
    </thead>
		@foreach($users as $user)
			<tr> 
				<td>{{ $count++ }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
				<td>{{ $user->user_name }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
				<td>{{ $user->email_id }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
				<td>{{ $user->phone_no }}</td>&nbsp;&nbsp;&nbsp;&nbsp;
				<td><a href="{{ URL::route('getupdate',$user->id)}}">Update</a></td>&nbsp;&nbsp;
				<td><a href="{{ URL::route('getdelete',$user->id)}}">Delete</a></td>&nbsp;&nbsp;
			</tr>
	    @endforeach
	</table>
 <?php 
}
 ?>   
	

</div>