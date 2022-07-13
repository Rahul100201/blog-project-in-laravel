@extends('layouts.backend.app')
@section('content')



<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          Create Post
        </div>
        <div class="card-body">
            <form action="{{url('/post_insert')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                      <label>Title:</label>
                      <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label>Category:</label>
                    <select class="form-control m-bot15" name="category">
                       @foreach($categories as $a)
                        <option value="{{$a->id}}">{{$a->name}}</option>
                       @endForeach
                     </select>
               </div>

                <div class="form-group">
                   <label>Tags:</label>
                   <input type="text" name="tags" class="form-control">

                </div>

                <div class="form-group">
                  <label>Stutus:</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="status" id="">
                    <label class="form-check-label" for="">
                       Published
                    </label>
                   </div>
                </div>


                 <div class="form-group">
                      <label>Image:</label>
                      <input type="file" name="image" class="form-control">
                 </div>

                 <div class="form-group">
                    <label>Body:</label>
                    <textarea class="form-control" name="body" id="" cols="30" rows="5"></textarea>
               </div>

                <button type="submit" class="btn btn-success">Submit</button>

            </form>

        </div>
      </div>
</div>
@endsection
