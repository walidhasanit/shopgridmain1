@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category Form</h4>
                    </div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('update.category', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$category->name}}" name="name" class="form-control" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Category Description</label>
                                <div class="col-sm-10">
                                    <textarea  name="description" class="form-control" placeholder="Category Description">{{$category->description}}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Category Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control-file">
                                    <img src="{{asset($category->image)}}" alt="" height="60" width="70" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Publication Status</div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" {{$category->status == 1 ? 'checked' : ''}}  name="status" value="1" >Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" {{$category->status == 0 ? 'checked' : ''}} name="status" value="0">Unpublished
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update new Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
