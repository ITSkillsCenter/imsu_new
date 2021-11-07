
@php
    
                $child= DB::table('chart_accounts')->select('id','parent_id')->where('parent_id',$chartAccount)->first();
               // echo $child->parent_id;
                $Drtotal_parent=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$chartAccount)->sum('amount');
                $Drtotal_child=DB::table('ledgers')->where('account_type','Dr')->where('chart_account_id',$child->id)->sum('amount');
                
                $Drtotal=$Drtotal_parent+$Drtotal_child;
                
                    $Crtotal_parent=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$chartAccount)->sum('amount');
                    $Crtotal_child=DB::table('ledgers')->where('account_type','Cr')->where('chart_account_id',$child->id)->sum('amount');
                    
                     $Crtotal=$Crtotal_parent+$Crtotal_child;
                     
                    //return 'Dr'.$Drtotal.' Cr'.$Crtotal;
                    
                    if($Drtotal>=$Crtotal){
                        echo $Drtotal-$Crtotal;
                    }else{
                        echo $Crtotal-$Drtotal;
                    }
@endphp