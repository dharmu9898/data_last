@if(sizeof($touroperator) > 0)

    @foreach ($touroperator as $tour)
        <tr>
            <td style="font-size:20px;">{{ $tour->emailid }}</td>
            <td style="font-size:20px;">{{ $tour->Name }}</td>
            <td style="font-size:20px;">{{ $tour->Phoneno }}</td>
            
            <td style="font-size:20px;">{{ $tour->Address }}</td>
            
            <td style="font-size:20px;">{{ $tour->TripTitle }}</td>
 
                           

            <td style="font-size:20px;"> something<input type="checkbox" style="width: 2.0em;height: 2.0em; border: 1px solid #a9a9a9;" value="" name="">   </td>
                           
<td style="text-align:center;"> 
    


       <form action="" method="get">
   
                    
    
                    <a style="color:20px;" class="btn btn-light" href="{{ route('touroperator.confirm',$tour->id) }}">Confirm</a>
   
                   
      
                  
                </form>
            
    </td>



        </tr>
        @endforeach

   @else
           <tr>
             <td colspan="8">
                  <p style="text-align:center;">No Data found</p>
            </td>
            </tr>
      @endif 

      <tr>
       <td colspan="6" align="center">
        {!! $touroperator->links('vendor.pagination.bootstrap-4') !!} 
       </td>
      </tr>
