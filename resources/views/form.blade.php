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
  <form class="form-horizontal" action="{{ route('crud.store')}}" method="post" enctype="multipart/form-data">
    @csrf

 <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
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
          <label><input type="radio" name="gender" value="Male"> Male</label>
          <label><input type="radio" name="gender" value="Female"> Female</label>
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


<!-- table show list -->

<div class="container">
  <h2>List of inserted Data</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Department</th>
        <th>Qualification</th>
        <th>Gender</th>
        <th>Gallary</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>

       @if(!empty($data))
       @foreach($data as $d)
      <tr>
        <td>{{ $d->name }}</td>
        <td>{{ $d->email }}</td>
        <td>{{ $d->department }}</td>
        <td>{{ $d->qualification }}</td>
        <td>{{ $d->gender }}</td>
        <td><a href="uploads/{{ $d->gallary }}" target="_blank">See Gallary</a></td>
        <td><a href="{{ url('crud'.'/'.$d->id.'/edit') }}">Update</a> / <a href="{{ url('form/delete/'.$d->id) }}" onclick="confirm('Are you sure you want to delete this item?');">delete</a></td>
      </tr>
      @endforeach
      @endif
     
    </tbody>
  </table>
</div>


</body>
</html>

