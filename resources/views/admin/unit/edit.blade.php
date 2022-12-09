@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Unit Form</h4>
                    </div>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('unit.update', ['id' => $unit->id])}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$unit->name}}" name="name" class="form-control" placeholder="Unit Name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Unit Code</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$unit->code}}" name="code" class="form-control" placeholder="Unit Code">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label">Unit Description</label>
                                <div class="col-sm-10">
                                    <textarea  name="description" class="form-control" placeholder="Unit Description">{{$unit->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Publication Status</div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" {{$unit->status == 1 ? 'checked' : ''}} name="status" value="1" >Published
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" {{$unit->status == 0 ? 'checked' : ''}} name="status" value="0">Unpublished
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label  class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update  Unit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
