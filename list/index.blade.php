!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }
        .m-b-1em {
            margin-bottom: 1em;
        }
        .m-l-1em {
            margin-left: 1em;
        }
        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>List Blogs </h1>
            <br>

             {{  session()->get('Message')  }}



        </div>

        @auth('User')
         {{ 'Welcome , '.auth('User')->user()->name}}
         @endauth
         <br>

        <a href="{{url('/ToDoList/create')}}">+ Blog</a>

        @auth('User')

        ||  <a href="{{url('/logout')}}">LogOut</a>

        @endauth





        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>StartDate</th>
                <th>EndDate</th>
                <th>Image</th>
                @auth('User')
                <th>action</th>
                @endauth

            </tr>


            @foreach ($data as  $key => $value)

           <tr>
                 <td>{{$value->id}}</td>
                 <td>{{$value->title}}</td>
                 <td>{{ substr($value->description,0,20)}}</td>
                 <td>{{$value->startdate}}</td>
                 <td>{{$value->enddate}}</td>

                 <td> <img src="{{asset('images/'.$value->image)}}" alt="" height="50px" width="50px">  </td>

                 <td>{{$value->name}}</td>
  @auth('User')

                 <td>
                    <a href='' data-toggle="modal" data-target="#modal_single_del{{$key}}" class='btn btn-danger m-r-1em'>Remove </a>
                 <a href='{{url('/ToDoList/'.$value->id.'/edit')}}' class='btn btn-primary m-r-1em'>Edit</a>

                </td>
@endauth

           </tr>






            <div class="modal" id="modal_single_del{{$key}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">delete confirmation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                                 </button>
                                  </div>

                                  <div class="modal-body">
                                    Remove {{ $value->title  }} !!!!
                                  </div>
                                  <div class="modal-footer">
                                      <form action="{{url('/ToDoList/'.$value->id)}}" method="post">
                                            @csrf
                                            @method('delete')

                                          <div class="not-empty-record">
                                              <button type="submit" class="btn btn-primary">Delete</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>





           @endforeach

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>
