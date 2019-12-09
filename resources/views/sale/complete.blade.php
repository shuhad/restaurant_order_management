@extends('app')
@section('content')
{!! Html::script('js/angular.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/app.js', array('type' => 'text/javascript')) !!}
<style>
table td {
    border-top: none !important;
}
#invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 1mm;
  margin: 0 auto;
  width: 100%;
  background: #fff;
  font-size: 14px
}
#invoice-POS ::selection {
  background: #f31544;
  color: #fff;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #fff;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: 0.9em;
  font-weight: bold;
  margin-top: 3px;
  margin-bottom: 3px
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p , address{

  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top,
#invoice-POS #mid,
#invoice-POS #bot {
  /* Targets all id with 'col-' */
}
#invoice-POS #top {
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}

#invoice-POS .info {
  display: block;
  margin-left: 0;
  margin-bottom: 10px;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
}
#invoice-POS .service {
}
#invoice-POS .item {
  
}
#invoice-POS .itemtext {
}
#invoice-POS #legalcopy {
}


</style>
<div class="container-fluid">
   
    
    <div class="row">
<?php $mytotalsale=0;?>
<!-- ============================================== -->


  <div id="invoice-POS">
    
    <div  id="top" style="text-align: center;">
      <div class="info"> 
        <img src="images/logo.jpg"/>            
      </div><!--End Info-->
    </div>
    
   <div class="row">
        <div class="col-md-12">
            <?php echo date('d M Y'); ?><br/>
           <!--  {{trans('sale.customer')}}: {{ $sales->customer->name}}<br /> -->
            {{trans('sale.sale_id')}}: SALE{{$saleItemsData->sale_id}}<br />
            <!-- {{trans('sale.employee')}}: {{$sales->user->name}}<br /> -->
        </div>
    </div> 
    
    <div id="bot">

                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item"><h2>Item</h2></td>
                                <td class="Hours"><h2>Qty</h2></td>
                                <td class="Rate"><h2>Sub Total</h2></td>
                            </tr>

<tr>
                <td colspan="3"><hr style="margin-top:  5px;margin-bottom:  5px;"/></td>
              </tr> 
                            @foreach($saleItems as $value)
                <tr class="service">
                    <td class="tableitem"><p class="itemtext">{{$value->item->item_name}} - size : {{$value->item->size}} </p></td>
                    <td class="tableitem"><p class="itemtext">{{$value->selling_price}} X {{$value->quantity}}</p></td>
                    <td class="tableitem"><p class="itemtext">{{$value->total_selling}}</p></td>
                </tr>
<?php $mytotalsale+=$value->total_selling; ?>
                @endforeach


              <tr>
                <td colspan="3"><hr style="margin-top:  5px;margin-bottom:  5px;"/></td>
              </tr>             


                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Sub Total</h2></td>
                                <td class="payment"><h2>{{number_format($mytotalsale,2)}}</h2></td>
                            </tr>
                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Discount</h2></td>
                                <td class="payment"><h2><?php $theDiscount=$mytotalsale-$sales->discount; ?>
                        {{number_format($theDiscount,2)}}</h2></td>
                            </tr>

                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>{{number_format($sales->discount,2)}}</h2></td>
                            </tr>

                        </table>
                    </div><!--End Table-->
<hr style="margin-top:  7px;margin-bottom:  5px;"/>
                    <address align="center" style="text-align: center;">
    Oriental Market, Bondor Bazar,<br/>Sylhet 3100<br/>
    Phone : 01710-233833 <br/>facebook.com/lazeezsylhet <br/>www.lazeezbd.com

</address>
<hr style="margin-top:  7px;margin-bottom:  5px;"/>
                    <div id="legalcopy" style="text-align: center; font-size: 13px; font-style: italic;">
                        <p class="legal">The Prophet Muhammad (s.a.w) said:
An honest and truthful businessman shall be in the shade of the throne of Allah. (Al-Isbihani)
                        </p>
                    </div>

                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->



















<!-- ============================================== -->

























        
    </div>
    
    <hr class="hidden-print"/>
    <div class="row">
        <div class="col-md-8">
            &nbsp;
        </div>
        <div class="col-md-2">
            <button type="button" onclick="printInvoice()" class="btn btn-info pull-right hidden-print">{{trans('sale.print')}}</button> 
        </div>
        <div class="col-md-2">
            <a href="{{ url('/sales') }}" type="button" class="btn btn-info pull-right hidden-print">{{trans('sale.new_sale')}}</a>
        </div>
    </div>
</div>
<hr/>

<script>
function printInvoice() {
    window.print();
}
</script>
@endsection