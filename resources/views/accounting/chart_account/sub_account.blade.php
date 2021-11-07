@foreach($subcategories as $subcategory)
 <ul>
    <li>{{$subcategory->name}} <span style="float:right;">@include('accounting.chart_account.bal',['chartAccount' => $subcategory->id])</span></li> 
  @if(count($subcategory->childs))
    @include('accounting.chart_account.sub_account',['subcategories' => $subcategory->childs])
  @endif
 </ul> 
@endforeach