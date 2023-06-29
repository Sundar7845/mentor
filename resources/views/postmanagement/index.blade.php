@extends('layouts.layout')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Top Question</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
</head>
<body>
<div class = "content-wrapper">
    <div class="container">
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Post Management</h2>
                </div>
    
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                <p>{{ $message }}</p>
               
            </div>
        @endif
    
        <table class="table table-hover" id="myTable">
    <thead style="background-color:#007bff">
    <tr>
                <th>Id</th>
                <th>Posted By</th>
                <th>Company</th>
                <th>Post Type</th>
                <th>Title</th>
                <th>Comment</th>
                <th>qualification</th>
                <th>Experience</th>
                <th>Salary min</th>
                <th>Salary max</th>
                <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
       
                <td>{{$post->id}}</td>
                <td>{{$post->firstname}}  {{$post->lastname}}</td>
                <td>{{$post->company_name}}</td>
                <td>{{$post->type}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->comment}}</td>
                <td>{{$post->qualification}}</td>
                <td>{{$post->experience}}</td>
                <td>{{$post->salary_min}}</td>
                <td>{{$post->salary_max}}</td>
                <td>

                

                <form action="{{ route('post.destroy',$post->id) }}" method="GET">

                @csrf
                @method('DELETE')

                <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        </form>
                    </td>
    </tr>
    @endforeach

    </tbody>
    </table>
</div>
</div>
</div>
</div>
     
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record  {{$post->title}}?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
    </body>
</html>
@endsection
