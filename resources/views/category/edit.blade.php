@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Update Category</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($category, array('route' => array('expense-category.update', $category->id), 'method' => 'PUT')) !!}
					<div class="form-group">
					{!! Form::label('name', trans('Category Name').' *') !!}
					<input type="text" name="name" id="category_name" class="form-control" value="{{ $category->categoryName }}" />
					</div>

					

					

					{!! Form::submit(trans('Update'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection