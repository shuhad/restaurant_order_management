@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('report-receiving.reports')}} - {{trans('report-receiving.receivings_report')}}</div>

				<div class="panel-body">

 <form method="post" action="{{ url('reports/receivingsearched') }}" class="hidden-print">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                           From  <input type="date" class="form-control" name="fromdate" placeholder="from date" >

                        </div>
                        <div class="col-md-3">
                           To <input type="date" class="form-control" name="todate" placeholder="from date" >
                        </div>
                        <div class="col-md-3">
                           Supplier
{!! Form::select('supplier', $suppliers, null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}

                            
                        </div>
                        <div class="col-md-3">&nbsp;
                            <input type="submit" class="btn btn-success btn-block" value="Submit"/>
                        </div>
                    </div>
                </form>
<?php $theDue1=0; ?>                
                <br/>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('report-receiving.receiving_id')}}</td>
            <td>{{trans('report-receiving.date')}}</td>
            <td>{{trans('report-receiving.items_received')}}</td>
            <td>{{trans('report-receiving.supplied_by')}}</td>
            <td>{{trans('report-receiving.total')}}</td>
            <td>Paid</td>
            <td>Due</td>
            <td>{{trans('report-receiving.comments')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($receivingReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('receiving_items')->where('receiving_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->supplier->company_name }}</td>
            <td>{{DB::table('receiving_items')->where('receiving_id', $value->id)->sum('total_cost')}}</td>
            <td>{{ DB::table('receivings')->where('id', $value->id)->sum('paidAmount')}}</td>
            <td>{{ $theDue= DB::table('receiving_items')->where('receiving_id', $value->id)->sum('total_cost') - DB::table('receivings')->where('id', $value->id)->sum('paidAmount') }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedReceivings{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">{{trans('report-receiving.detail')}}</a> <a class="btn btn-small btn-success" href="{{ url('reports/clearreceived?id='.$value->id) }}" > Clear this payment</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedReceivings{{ $value->id }}">
                <td colspan="9">
                    <table class="table">
                        <tr>
                            <td>{{trans('report-receiving.item_id')}}</td>
                            <td>{{trans('report-receiving.item_name')}}</td>
                            <td>{{trans('report-receiving.item_received')}}</td>
                            <td>{{trans('report-receiving.total')}}</td>
                        </tr>
                        @foreach(ReportReceivingsDetailed::receiving_detailed($value->id) as $receiving_detailed)
                        <tr>
                            <td>{{ $receiving_detailed->item_id }}</td>
                            <td>{{ $receiving_detailed->item->item_name }}</td>
                            <td>{{$receiving_detailed->cost_price}} x {{ $receiving_detailed->quantity }}</td>
                            <td>{{ $receiving_detailed->quantity * $receiving_detailed->cost_price}}                
</td>
                        </tr>
                        @endforeach

                    </table>
                </td>
            </tr>
<?php $theDue1+=$theDue;?>
    @endforeach
    </tbody>
</table>

<div class="well well-sm text-center"><strong>Total Due : {{$theDue1}}</strong></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection