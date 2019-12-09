@extends('app')

@section('content')
<div class="container" >
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
					Welcome {{ Auth::user()->name }}
					<hr />
					<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{trans('dashboard.statistics')}}</h3>
  </div>
  <div class="panel-body">
    <div class="row">
    	<div class="col-md-6">
    		<div class="well">{{trans('dashboard.total_items')}} : {{$items}}</div>
    	</div>
    	<div class="col-md-6">
    		<div class="well">{{trans('dashboard.total_sales')}} : {{$sales}}</div>
    	</div>
    	
    </div>
  
    

</div>
</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
