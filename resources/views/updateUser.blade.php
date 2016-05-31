@extends('app')

@section('htmlheader_title')
    Home
@endsection

<html>
    <head>
    <title>Update Data</title>
  <style>
 table,tr,td
      {
          padding:10px;
      }
      h1
      {
          text-align:center;
      }
 </style>
    </head>
<body>

<h2>Update Record</h2>
      
     <form class="form-vertical" action="{{URL::route('postupdate',$userinfo->id)}}" enctype='multipart/form-data'   method="POST">
    	 <div class="form-group">
				<label for="Enter Name" class="col-sm-2 control-label">Enter Name:</label>
				<div class="col-sm-10">
               	 	<input type="text" class="form-control" name="uname" value="{{ $userinfo->user_name }}"/>
               	</div> 
        		<label for="Enter Academics" class="col-sm-2 control-label">Enter Academics:</label>
        		<div class="col-sm-10">	
       				<input type="text" class="form-control" name="academics" value="{{ $userinfo->academics }}"/>
       			</div>
       			<label for="Enter EmailID" class="col-sm-2 control-label">Enter EmailID:</label>
       			<div class="col-sm-10">	
	       			<input type="email" class="form-control" name="emailId" value="{{ $userinfo->email_id }}"/>
	       		</div>	
	       		<label for="Enter Phone no" class="col-sm-2 control-label">Enter Phone no:</label>
	       		<div class="col-sm-10">	
       				<input type="text" class="form-control" name="Phone" value="{{ $userinfo->phone_no }}"/>
       			</div>	
       			<label for="Enter Longitude" class="col-sm-2 control-label">Enter Longitude:</label>
       			<div class="col-sm-10">	
        			<input type="text" class="form-control" name="long" value="{{ $userinfo->longitude }}"/>
        		</div>	
        		<label for="Enter Longitude" class="col-sm-2 control-label">Enter Latitude:</label>
        		<div class="col-sm-10">	
        			<input type="text" class="form-control" name="lati" value="{{ $userinfo->latitude }}"/>
        		</div>
        		<label for="Enter Description" class="col-sm-2 control-label">Enter Description:</label>
        		<div class="col-sm-10">	
	    			<textarea id="descrisp" rows="4" cols="50" name="description" > <?php echo $userinfo->description;?></textarea>
	    		</div>	
	    		<label for="Select image to upload" class="col-sm-2 control-label">Select image to upload:</label>
        	<?php 
              $n1			=  $userinfo->id;
        	  $n2			=  ".jpg"; ?>
	    		<div class="col-sm-10">	
        			<input type="file" name="fileToUpload" id="fileToUpload" /> 
        			<img src= "{{ URL::to('/') }}/uploads/<?php echo $n1.$n2;?>"  alt="" width="62" height="62" >
        		</div>	
        	  <div class="col-sm-10">	
        		<input type="submit" class="btn btn-primary" name="submit" value="Update Record"/>
    		 </div>
       </div> 	
      
</form>
    </body></html>