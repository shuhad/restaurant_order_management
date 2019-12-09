@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">List of expenses</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('expense/create') }}">Add New</a>
				<hr />
@if (Session::has('message'))
	<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Date</td>
            <td>Details</td>
            <td>Price</td>
           <!--  <td>&nbsp;</td> -->
        </tr>
    </thead>
    <tbody>
    @foreach($expense as $value)
        <tr>
            <td>
                {{date('d M Y', strtotime($value->created_at))}}
                </td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->price }}</td>
           <!--  <td>

                 <a class="btn btn-small btn-info" href="{{ URL::to('expense/' . $value->id . '/edit') }}"> Edit </a> 
                {!! Form::open(array('url' => 'expense/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                     {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td> -->
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