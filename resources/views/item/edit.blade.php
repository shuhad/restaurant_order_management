@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('item.update_item')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($item, array('route' => array('items.update', $item->id), 'method' => 'PUT', 'files' => true)) !!}

					

					<div class="form-group">
					{!! Form::label('item_name', trans('item.item_name')) !!}
					{!! Form::text('item_name', null, array('class' => 'form-control')) !!}
					</div>

					

					

					

					

					<div class="form-group">
					{!! Form::label('selling_price', trans('Price')) !!}
					{!! Form::text('selling_price', null, array('class' => 'form-control')) !!}
					</div>

					

					{!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection