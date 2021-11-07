
   @foreach($subcategories as $subcategory)
 <tr>
    <td><a href="{{ route('account.receivable',['chart_account_id'=>$subcategory->id,'from'=>$from,'to'=>$to]) }}">{{$subcategory->name}} </a></td>
    <td><b > <?php  echo  opening_bal($subcategory->id,$from);?> </b></td>
    
    <td><span style="float:right;"> <?php  echo  child_total($subcategory->id,$from,$to)-opening_bal($subcategory->id,$from);;?> </span></td> 
  @if(count($subcategory->childs))
    @include('accounting.ledger.sub_account',['subcategories' => $subcategory->childs,'from'=>$from,'to'=>$to])
  @endif
 </tr> 
@endforeach 



