@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('report-sale.reports')}} - {{trans('report-sale.sales_report')}}</div>

				<div class="panel-body">
                <form method="post" action="{{ url('reports/searched') }}" class="hidden-print">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                           From  <input type="date" class="form-control" name="fromdate" placeholder="from date" >

                        </div>
                        <div class="col-md-4">
                           To <input type="date" class="form-control" name="todate" placeholder="from date" >
                        </div>
                        <div class="col-md-4">&nbsp;
                            <input type="submit" class="btn btn-success btn-block" value="Submit"/>
                        </div>
                    </div>
                </form>
                <br/>

               
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('report-sale.sale_id')}}</td>
            <td>{{trans('report-sale.date')}}</td>
            <td>{{trans('report-sale.items_purchased')}}</td>
            <td>{{trans('report-sale.sold_to')}}</td>
            <td>{{trans('report-sale.total')}}</td>
            <td>Discount</td>
            <td>{{trans('report-sale.payment_type')}}</td>
            <td>{{trans('report-sale.comments')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
        <?php $mytotalsale=0; $thecost=0;$totalDiscount=0 ?>
    @foreach($saleReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('sale_items')->where('sale_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->customer->name }}</td>
            <td>{{$mytotalsale1=DB::table('sale_items')->where('sale_id', $value->id)->sum('total_selling')}}</td>
            <td>{{ $theDiscount=DB::table('sale_items')->where('sale_id', $value->id)->sum('total_selling')-DB::table('sales')->where('id', $value->id)->sum('discount')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedSales{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">
                    {{trans('report-sale.detail')}}</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedSales{{ $value->id }}">
                <td colspan="10">
                    <table class="table">
                        <tr>
                            <td>{{trans('report-sale.item_id')}}</td>
                            <td>{{trans('report-sale.item_name')}}</td>
                            <td>{{trans('report-sale.quantity_purchase')}}</td>
                            <td>{{trans('report-sale.total')}}</td>
                            
                        </tr>
                        @foreach(ReportSalesDetailed::sale_detailed($value->id) as $SaleDetailed)
                        <tr>
                            <td>{{ $SaleDetailed->item_id }}</td>
                            <td>{{ $SaleDetailed->item->item_name }}</td>
                            <td>{{ $SaleDetailed->quantity }}</td>
                            <td>{{ $SaleDetailed->selling_price * $SaleDetailed->quantity}}</td>

                             
                        </tr>
                        @endforeach
                        <tr>
                            <td>-</td>
                            <td>Discount</td>
                            <td>-</td>
                            <td>{{$theDiscount}}</td>
                            <td>-</td>
-                        </tr>
                    </table>
                    <a class="btn btn-xs btn-danger pull-right"  href="{{ url('reports/deletesale?id='.$value->id) }}">Delete This Sale</a>
                </td>
            </tr>
            <?php $mytotalsale+= $mytotalsale1;
            $thecost+=$thecost;
            $totalDiscount+=$theDiscount; ?>
    @endforeach
    </tbody>
</table>
<br/>

<div class="row">
                        <div class="col-md-6 text-center">
                            <div class="well well-sm">{{trans('report-sale.grand_total')}} Sale : {{$mytotalsale}}</div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="well well-sm">{{trans('report-sale.grand_total')}} Discount : {{$totalDiscount}}</div>
                        </div>
                        
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection