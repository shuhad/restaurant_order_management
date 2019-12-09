@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('item.list_items')}}</div>

				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('items/create') }}">{{trans('item.new_item')}}</a>
				<hr />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered" id="myDatatable">
    <thead>
        <tr>
            <td>{{trans('item.item_id')}}</td>
            <td>{{trans('item.item_name')}}</td>
            <td>{{trans('item.selling_price')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($item as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->item_name }}</td>
            <td>{{ $value->selling_price }}</td>
            <td>

               
                <a class="btn btn-small btn-info" href="{{ URL::to('items/' . $value->id . '/edit') }}">{{trans('item.edit')}}</a>
                {!! Form::open(array('url' => 'items/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('item.delete'), array('class' => 'btn btn-warning')) !!}
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
