@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('report-sale.reports')}} - Expense Report</div>

                <div class="panel-body">
                <form method="post" action="{{ url('reports/expensesearched') }}" class="hidden-print">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-3">
                           From  <input type="date" class="form-control" name="fromdate" placeholder="from date" >

                        </div>
                        <div class="col-md-3">
                           To <input type="date" class="form-control" name="todate" placeholder="from date" >
                        </div>
                        <div class="col-md-3">
                           Categories
{!! Form::select('categories', $categories, null, ['class' => 'form-control', 'placeholder' => 'Please Select']) !!}

                            
                        </div>
                        <div class="col-md-3">&nbsp;
                            <input type="submit" class="btn btn-success btn-block" value="Submit"/>
                        </div>
                    </div>
                </form>
                <br/>

               
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('report-sale.date')}}</td>
            <td>Details</td>
            <td>{{trans('report-sale.total')}}</td>
        </tr>
    </thead>
    <tbody>
        <?php $mytotalsale=0; $thecost=0; ?>
    @foreach($expenseReport as $value)
        <tr>
            <td>{{date( "Y-M-d H:i:s ", strtotime( $value->created_at )+6*3600)}}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $mytotalsale1=$value->price }}</td>

        </tr>
        
            
            <?php $mytotalsale+= $mytotalsale1;
             ?>
    @endforeach
    </tbody>
</table>
<br/>

<div class="row">
                        <div class="col-md-12">
                            <div class="well well-sm text-center"><strong>{{trans('report-sale.grand_total')}} Sale : {{$mytotalsale}}</strong></div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection