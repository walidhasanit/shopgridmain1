@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Unit Form</h4>
                    </div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('brand.new')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" placeholder="Brand Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Brand Description</label>
                                <div class="col-sm-10">
                                    <textarea  name="description" class="form-control" placeholder="Brand Description"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Brand Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Publication Status</div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="1" checked>Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="0">Unpublished
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Crate new Brand</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
