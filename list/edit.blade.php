<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blogs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <h2>Edit Blog</h2>
  <form  action="{{ url('ToDoList/'.$data->id) }}" method="post" enctype="multipart/form-data">

    @csrf
    @method('put')

  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" value="{{ $data->title }}">
  </div>


  <div class="form-group">
    <label for="exampleInputText">Description</label>
       <textarea  name="description"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >{{old('description')}}</textarea>
  </div>
  <div class="form-group">
    <label for="startDate">start Date</label>
       <input type="date"  name="startdate"  class="form-control"  >{{old('startdate')}}</textarea>
  </div>
  <div class="form-group">
    <label for="EndDate">End Date</label>
       <textarea  name="enddate"  class="form-control" >{{old('enddate')}}</textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputUImage">Image</label>
    <input type="file" name="image">
  </div>

  <img src="{{asset('images/'.$data->image)}}" alt="" height="100px" width="100px">
  <br>

  <button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>

</body>
</html>
