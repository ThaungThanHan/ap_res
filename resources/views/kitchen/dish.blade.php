@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kitchen Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes</h3>
                <a href="/dishes/create" class="btn btn-success" style="float:right">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if (session('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
              @endif
                <table id="dishes" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($dishes as $dish)
                    <tr>
                      <td>{{$dish->name}}</td>
                      <td>{{$dish->category->name}}</td>
                      <td>{{$dish->created_at}}</td>
                      <td>
                      <div class="form-row">
                        <a style="height:40px; margin-right:10px;"href="/dishes/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                        <form action="/dishes/{{$dish->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this item?')">Delete</button>
                        </form>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
</div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
  $(function () {
    $("#dishes").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"pageLength":2,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#dishes_wrapper .col-md-6:eq(0)');
    $('#dishes').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
