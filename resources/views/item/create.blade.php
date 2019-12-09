@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('item.new_item')}}</div>

				<div class="panel-body">
					@if (Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'items', 'files' => true)) !!}

					

					<div class="form-group">
					{!! Form::label('item_name', trans('item.item_name').' *') !!}
					{!! Form::text('item_name', Input::old('item_name'), array('class' => 'form-control')) !!}
					</div>

				

					

					

					

					<div class="form-group">
					{!! Form::label('selling_price', trans('Price').' *') !!}
					{!! Form::text('selling_price', Input::old('selling_price'), array('class' => 'form-control')) !!}
					</div>

					
					{!! Form::submit(trans('item.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection