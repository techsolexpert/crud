<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Crud Form</h2>
  <form class="form-horizontal" method="post" action="{{ url('update/'.$data->id) }}" enctype="multipart/form-data">
@csrf
 <div class="form-group">
      <label class="control-label col-sm-2" for="name" >Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" value="{{ $data->name }}" placeholder="Enter Name" name="name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" value="{{ $data->email }}" placeholder="Enter email" name="email">
      </div>
    </div>
    
    <div class="form-group"> 
                <label class="control-label col-sm-2" for="pwd">Qualification :</label>
      <div class="col-sm-10">
        <div class="checkbox">
          
           <label><input type="checkbox" value="10th" name="qualification[]"> 10th</label>
          <label><input type="checkbox" value="12th" name="qualification[]">12th</label>

         
        </div>
      </div>
    </div>

     <div class="form-group"> 
                <label class="control-label col-sm-2" for="pwd">Department :</label>
      <div class="col-sm-10">
        <select name="department" class="form-control">
            <option value="Department 1">Department 1</option>
             <option value="Department 2">Department 2</option>
              <option value="Department 3">Department 3</option>
        </select>
      </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Gender :</label>
      <div class="col-sm-10">
        <div class="checkbox">
          <label><input type="radio" name="gender" value="Male" <?php if($data->gender=='Male'){echo "checked";} ?>> Male</label>
          <label><input type="radio" name="gender" value="Female" <?php if($data->gender=='Female'){echo "checked";} ?>> Female</label>
        </div>
      </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Gallary :</label>
      <div class="col-sm-10">
               <input type="file" class="form-control" id="gallary" placeholder="Enter email" name="gallary">

      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
