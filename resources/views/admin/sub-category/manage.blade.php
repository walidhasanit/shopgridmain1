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
                                        <th>Category Name</th>
                                        <th>Sub Category Name</th>
                                        <th>Category Description</th>
                                        <th>Category Image</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sub_categories as $sub_category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{isset($sub_category->category->name) ? $sub_category->category->name : ''}}</td>
                                            <td>{{$sub_category->name}}</td>
                                            <td>{{$sub_category->description}}</td>
                                            <td>
                                                <img src="{{asset($sub_category->image)}}" alt="" height="60" width="70"/>
                                            </td>
                                            <td>{{$sub_category->status == 1 ? 'Published' : 'Unpublished' }}</td>

                                            <td>
                                                <a href="{{route('sub-category.edit', ['id' => $sub_category->id])}}">
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('sub-category.delete', ['id' => $sub_category->id])}}" onclick="return confirm('are you sure to delete this.')  ">
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
