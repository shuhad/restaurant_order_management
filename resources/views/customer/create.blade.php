@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('customer.new_customer')}}</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'customers', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('name', trans('customer.name') .' *') !!}
					{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('email', trans('customer.email')) !!}
					{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('phone_number', trans('customer.phone_number')) !!}
					{!! Form::text('phone_number', Input::old('phone_number'), array('class' => 'form-control')) !!}
					</div>

					

					<div class="form-group">
					{!! Form::label('address', trans('customer.address')) !!}
					{!! Form::text('address', Input::old('address'), array('class' => 'form-control')) !!}
					</div>

					

					{!! Form::submit(trans('customer.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection