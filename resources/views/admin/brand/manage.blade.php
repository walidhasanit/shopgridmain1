@extends('master.admin.master')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category Datatable</h4>
                        </div>
                        <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>Brand Name</th>
                                        <th>Brand Description</th>
                                        <th>Brand Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->description}}</td>
                                        <td>
                                            <img src="{{asset($brand->image)}}" alt="" height="50" width="60"/>
                                        </td>
                                        <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <a href="{{route('edit.brand', ['id' => $brand->id])}}">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete.brand', ['id' => $brand->id])}}">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
