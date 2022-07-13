@extends('layouts.backend.app')
@section('content')


    <!-- table start  -->
<div class="col-md-12">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-danger">Error</span> {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">x</span></button>

    </div>

    @endforeach

    @endif
    <div class="card">

         <div class="card-header">
            <strong class="card-title">Category</strong>
            <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#aa" >Add Category</a>
         </div>
         <!-- /.card-header  -->
         <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                   <thead>
                        <tr>
                             <th>Id</th>
                             <th>Name</th>
                             <th>Slug</th>
                             <th>description</th>
                             <th>Image</th>
                             <th>Action</th>
                        </tr>
                   </thead>
                    <tbody>
                    @foreach ($data as $a)
                         <tr>
                             <td>{{$a->id}}</td>
                             <td>{{$a->name}}</td>
                             <td>{{$a->slug}}</td>
                             <td>{{$a->discription}}</td>
                             <td><img src="{{url('/upload/'.$a->image)}}" alt="image" style="width: 70px"; ></td>
                             <td>
                                <button class="btn btn-primary mb-1" data-toggle="modal" data-target="#view_model-{{ $a->id }}"><i class="fa fa-eye"></i></button>
                                <button class="btn btn-secondary mb-1" data-toggle="modal" data-target="#edit_model-{{ $a->id }}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#delete_model-{{ $a->id }}"><i class="fa fa-trash-o"></i></button>
                             </td>
                         </tr>
                    @endforeach
                    </tbody>

                </table>
         </div>
    </div>   <!-- /.card-body -->
</div>
    <!-- /.card -->
    <!-- table end -->

<!-- login modal-->
<section>
    <div class="modal fade" id="aa">
         <div class="modal-dialog">
              <div class="modal-content">
                   <div class="modal-header">
                        <h5 class="modal-title" id="">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal">
                             <span>&times;</span>
                        </button>

                   </div>
                   <div class="modal-body">

                        <form action="{{url('/category_insert')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                  <label>Name:</label>
                                  <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Slug:</label>
                                <input type="text" name="slug" class="form-control">
                           </div>
                             <div class="form-group">
                                  <label>Description:</label>
                                  <input type="text" name="description" class="form-control">
                             </div>
                             <div class="form-group">
                                  <label>Image:</label>
                                  <input type="file" name="image" class="form-control">
                             </div>
                            <button type="submit" class="btn btn-success">Submit</button>

                        </form>
                   </div> <!-- modal body div end-->

              </div><!-- modal content div end-->
         </div>
         <!--modal dialog div end-->
    </div>
    <!--modal fade div end-->

</section>
<!-- login modal end-->

@foreach ($data as $a)



<!------------------------------------------View Model------------------------------------------------>
<!--View Modal -->
<div class="modal fade" id="view_model-{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Name</label>
                      </div>
                      <div class="col-12 col-md-9">
                          <p class="form-control-static">{{$a->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Slug</label></div>
                        <div class="col-12 col-md-9">
                          <p class="form-control-static">{{ $a->slug }}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">description</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <p class="form-control-static">{{ $a->description }}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <img src="{{url('/upload/'.$a->image)}}" alt="image" style="width: 70px";>
                            {{-- <p class="form-control-static"><img src="{{ $a->image }}" alt=""></p> --}}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$a->created_at}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$a->updated_at}}</p>
                        </div>
                    </div>

                </div>
            </div> <!-----model body end----->
        </div>
    </div>
</div>
<!---View Model end------>


<!------------------------------------------Edit Model------------------------------------------------>
<!--Edit Modal -->
 <div class="modal fade" id="edit_model-{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
        <div class="modal-body">
            <form action="{{ url('admin/category/update',$a->id) }}" method="post" id="" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="name" value="{{ $a->name }}" >
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="slug" value="{{ $a->slug }}" >
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="description" value="{{ $a->description }}" >
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <img src="{{url('/upload/'.$a->image)}}" alt="image" style="width: 70px"; >
                                    <input type="file" class="form-control" placeholder="" name="image">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Update</button>


            </form>
        </div><!-----model body---->

      </div>
    </div>
</div>
<!---Edit Model end------>

<!------------------------------------------Delete Model------------------------------------------------>
<!--Delete Modal -->
<div class="modal fade" id="delete_model-{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
        <div class="modal-body"><!--- model start--->
          <p>The user will be deleted !!!</p>
        </div><!-----model body end------->
        <div class="modal-footer"><!--- footer start--->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            <form action="{{ url('admin/category/delete',$a->id) }}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm</button>
            </form>

        </div><!--- footer end--->

      </div>
    </div>
</div>
<!---Delete Model end------>
@endforeach


@endsection
