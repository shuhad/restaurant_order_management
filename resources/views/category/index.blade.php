@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">List Category</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('expense-category/create') }}">New Category</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Category ID</td>
            <td>Category Name</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($category as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->categoryName }}</td>
            <td>

                <a class="btn btn-small btn-info" href="{{ URL::to('expense-category/' . $value->id . '/edit') }}">Edit</a>
                {!! Form::open(array('url' => 'expense-category/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
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
@endsection