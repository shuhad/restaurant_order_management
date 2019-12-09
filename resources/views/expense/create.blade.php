@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">New Expenses</div>
				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'expense')) !!}

					<div class="form-group">
					{!! Form::label('categoryID', trans('Category').' *') !!}

						<?php echo Form::select('categoryID', $categories, null, array('class' => 'form-control'));?>

					</div>

					<div class="form-group">
					Details
					{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					Taka
					{!! Form::number('price', Input::old('price'), array('class' => 'form-control')) !!}
					</div>

					

					

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection