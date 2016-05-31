@extends('app')

@section('htmlheader_title')
    Home
@endsection

<html>
    <head>
    <title>Insert Data</title>
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

<h2>Add Record</h2>
      
<form action="{{ url('/add') }}" enctype='multipart/form-data'   method="POST">
    
<table>
    
    <tr>
        <td>Enter Name:</td>
        <td><input type="text" class="form-control" name="uname"/></td>
    </tr>
    
    <tr>
        <td>Enter Academy:</td>
        <td><input type="text" class="form-control" name="academics"/></td>
    </tr>
    
    <tr>
        <td>Enter EmailID:</td>
        <td><input type="email" class="form-control" name="emailId"/></td>
    </tr>
    
    <tr>
        <td>Enter Phone no:</td>
        <td><input type="text" class="form-control" name="Phone"/></td>
    </tr>
    
    <tr>
        <td>Enter Latitude:</td>
        <td><input type="text" class="form-control" name="lati"/></td>
    </tr>
    <tr>
        <td>Enter Longitude:</td>
        <td><input type="text" class="form-control" name="long"/></td>
    </tr>
    
    <tr>
	    <td>Enter Description </td>
	    <td><textarea id="descrisp" rows="4" cols="50" name="description" ></textarea></td>
    </tr>
    <tr>
        <td>Select image to upload:</td>
        <td><input type="file" name="fileToUpload" id="fileToUpload"/></td>
    </tr>
    
    <tr>
        <td> </td>
        <td><br><input type="submit" class="btn btn-primary" name="submit" value="Add Record"/></td>
    </tr>
    
    </table>
      
</form>
    </body></html>