@extends('layouts.backend.app')
@section('content')


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
            <strong class="card-title">Post</strong>
            <a href="{{ url('Admin/Post/Create') }}" class="btn btn-info pull-right">Add Post</a>
            {{-- <a href="" class="btn btn-info pull-right" data-toggle="modal" data-target="#aa" >Add Category</a> --}}
         </div>
         <!-- /.card-header  -->
         <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                   <thead>
                        <tr>
                             <th>#</th>
                             <th>Title</th>
                             <th>Slug</th>
                             <th>View & Likes</th>
                             <th>Created_At</th>
                             <th>Action</th>
                        </tr>
                   </thead>
                    <tbody>
                    @foreach ($post as $a)
                         <tr>
                             <td>{{ $a->id }}</td>
                             <td>{{ $a->title }}</td>
                             <td>{{ $a->slug }}</td>

                             <td></td>
                             <td>{{ $a->created_at }}</td>
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

@foreach ($post as $a)



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
                              <p class="form-control-static">{{$a->title}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Slug</label></div>
                            <div class="col-12 col-md-9">
                              <p class="form-control-static">{{ $a->slug }}</p>
                            </div>
                    </div>

                    <div class="row form-group">
                        @if ($a->tags)
                        <div class="col col-md-3"><label class=" form-control-label">Tag</label></div>
                        @foreach ($a->tags as $tag)
                            <a href="#" class="btn btn-outline-primary btn-flat btn-sm">{{$tag->name}}</a>
                        @endforeach

                        @endif
                    </div>
                    <div class="row form-group">
                     <div class="col col-md-3"><label class=" form-control-label">Image</label></div>
                        <div class="col-12 col-md-9">
                            <img src="{{url('/upload/post/'.$a->image)}}" alt="image" style="width: 70px";>
                          </div>
                    </div>
                    <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <p>{{ $a->category->name }}</p>
                    </div>
                    </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Discription</label>
                            </div>
                            <div class="col-12 col-md-9">
                              <p class="form-control-static">{{ $a->body }}</p>
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
                <form method="post" action="{{ url('admin/post/update/'.$a->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" value="{{ $a->title }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="category" id="">
                          @foreach ($categories as $c)
                          <option {{ $c->id ==  $a->category_id ? 'selected' : ''}} value="{{ $c->id }}">{{ $c->name }}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Tags</label>
                        <div class="col-sm-10">
                          {{-- <input type="text" class="form-control" name="tag">
                            @foreach ($a->tags as $key=>$tag)
                              {{ $key+1 < count($a->tags) ? $tag->name. ' , ' : }}

                             @endforeach --}}

                             <input type="text" id="tag" name="tags" placeholder="Tag (separated by ,)" class="form-control" value="@foreach($a->tags as $key=>$tag) {{$key+1 < count($a->tags) ? $tag->name. ',' : $tag->name}} @endforeach">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10 ">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="published" id="flexCheckDefault" name="status"
                                {{ $a->status == '1' ? 'checked' : ''}}  >
                                <label class="form-check-label" for="flexCheckDefault">
                                  Published
                                </label>
                              </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            {{-- <img src="{{url('/upload/post'.$a->image)}}" alt="image" style="width: 70px"; > --}}
                          <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Body</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="body" id="" >{{ $a->body }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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

                <form action="{{ url('admin/post/delete',$a->id) }}"method="POST">
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
