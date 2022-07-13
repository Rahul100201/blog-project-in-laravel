@extends('layouts.backend.app')
@section('content')
<div class="card-body">
    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
       <thead>
            <tr>
                 <th>Id</th>
                 <th>Post_Id</th>
                 <th>User_Id</th>
                 <th>Comment</th>
                 <th>Action</th>
            </tr>
       </thead>
        <tbody>
        @foreach ($comments as $a )
             <tr>
                 <td>{{$a->id}}</td>
                 <td>{{$a->post_id}}</td>
                 <td>{{$a->user_id}}</td>
                 <td>{{$a->message}}</td>

                 <td>
                    <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#view_model-{{ $a->id }}"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-secondary mb-1" data-toggle="modal" data-target="#edit_model-{{ $a->id }}"><i class="fa fa-pencil"></i></button>
                    <a href="{{ url('delete/'. $a->id) }}" class="btn btn-danger mb-1"><i class="fa fa-trash-o"></i></a>
                 </td>
             </tr>
        @endforeach
        </tbody>

    </table>
</div>
</div>   <!-- /.card-body -->

@endsection
