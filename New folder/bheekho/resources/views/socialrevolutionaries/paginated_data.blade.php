@if(sizeof($socialrevolutionaries) > 0)
@foreach($socialrevolutionaries as $row)
   <tr>
    <td scope="row">{{$row->name}}</td>
                <td scope="row">{{$row->country_name}}</td>
                <td scope="row">{{$row->state_name}}</td>
                 <td scope="row">{{$row->city_name}}</td>
                  <td scope="row">{{$row->concern}}</td>   
    
    <td style="text-align:center;"> 
        <a href="{{action('SocialRevolutionaries\SocialRevolutionaryController@show', $row->request_id)}}" class="btn btn-primary">View Details</a>
        <a href="" class="btn btn-primary">Help</a>  
        
            
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
        {!! $socialrevolutionaries->links('vendor.pagination.bootstrap-4') !!} 
       </td>
      </tr>
