@if(sizeof($allrequests) > 0)
@foreach($allrequests as $row)
              <tr>
               <td scope="row">{{$row->name}}</td>
                <td scope="row">{{$row->country_name}}</td>
                <td scope="row">{{$row->state_name}}</td>
                 <td scope="row">{{$row->city_name}}</td>
                  <td scope="row">{{$row->concern}}</td>
    
    
    
              <td style="text-align:center;"> 
                  <a href="{{action('Admin\AdminRequestController@show', $row->request_id)}}" class="btn btn-primary">View Request</a>
                  <a href="{{action('Admin\AdminRequestController@destroy', $row->request_id)}}" class="btn btn-primary">Delete Request</a>
            
              </td>
             </tr>
            @endforeach
            @else
           <tr>
             <td colspan="8">
                  <p style="text-align: center;">No Data found</p>
            </td>
            </tr>
            @endif
            <tr>
       <td colspan="6" align="center">
        {!! $allrequests->links('vendor.pagination.bootstrap-4') !!} 
       </td>
      </tr>



