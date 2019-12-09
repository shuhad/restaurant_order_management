<!DOCTYPE html>
<html ng-app="tutapos">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lazeez</title>
	<link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/footer.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="http://tutahosting.net/wp-content/uploads/2015/01/tutaico.png" type="image/x-icon" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Lazeez</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">{{trans('menu.dashboard')}}</a></li>
					@if (Auth::check())
						<!-- <li><a href="{{ url('/customers') }}">{{trans('menu.customers')}}</a></li> -->
						
						@if(Auth::user()->id != 3)

								
								
						<li><a href="{{ url('/items') }}">{{trans('menu.items')}}</a></li>
						
						<!--<li><a href="{{ url('/item-kits') }}">{{trans('menu.item_kits')}}</a></li>-->
						@endif
						<li><a href="{{ url('/sales') }}">{{trans('menu.sales')}}</a></li>
						<li><a href="{{ url('/customers') }}">{{trans('menu.customers')}}</a></li>
						@if(Auth::user()->id != 3)
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{trans('menu.reports')}} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/reports/sales') }}">{{trans('menu.sales_report')}}</a></li>
								<li><a href="{{ url('/reports/expense') }}">Expense Report</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/employees') }}">{{trans('menu.employees')}}</a></li>
						@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Expenses <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/expense/create') }}">Add Expenses</a></li>
								<li><a href="{{ url('/expense-category') }}">Expenses Category</a></li>
							</ul>
						</li>

					@endif
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								
								<!-- <li><a href="{{ url('/tutapos-settings') }}">{{trans('menu.application_settings')}}</a></li> -->
								<li><a href="{{ url('/auth/logout') }}">{{trans('menu.logout')}}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<footer class="footer hidden-print">
      <div class="container">
        <p class="text-muted">Lazeez</a>.
        </p>
      </div>
    </footer>
	<!-- Scripts -->
	<script src="{{ asset('/js/jquery.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#myDatatable').DataTable();
} );
</script>
</body>
</html>
