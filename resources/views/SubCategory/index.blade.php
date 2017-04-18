@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h1>Categories</h1>
        </div>
        <div class="pull-right">
            @permission('create-Category')
            <a class="btn btn-success" href="{{ route('Category.create') }}"> Create New Item</a>
            @endpermission
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table id="demo-table"
       data-show-refresh="true"
       data-show-toggle="true"
       data-toggle="table"
       data1-url="data1.json"

       data-pagination="true" 
       data-search="true"
       data-sort-order="desc"
       data-show-columns="false"
       class="table table-striped"
       data-show-export="true"
       data-export-types="['pdf']">
    <thead>    
        <tr>
            <th data-field="Name" data-align="right" data-sortable="true"width="280px">Name</th>
            <th data-field="category" data-align="right" data-sortable="true"width="280px">Category</th>
            <th data-field="Action" data-align="right" data-sortable="true"width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($SubCategories as $SubCategory)	
        <tr>
            <td>                                     <div class="co-md-4">     
                    {{$SubCategory->SubCategory }}
                </div>
            </td>
            <td>

                <div class="co-md-4">     

                    <h2>{{ $SubCategory->Category->Category }}</h2>

                </div>
                </td>
                <td>
                <div class="col-md-4">
                    <div class=""><a class="btn btn-info" href="{{ route('SubCategory.show',$SubCategory->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('SubCategory.destroy',$SubCategory->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','url' => ['/'],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
               
                    </div>
                </div>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection