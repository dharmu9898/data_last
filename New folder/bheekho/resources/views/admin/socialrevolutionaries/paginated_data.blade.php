@if(sizeof($social_revolutionaries) > 0)
@foreach($social_revolutionaries as $row)
              <tr>
               <td scope="row">{{$row->name}}</td>
                <td scope="row">{{$row->country_name}}</td>
                <td scope="row">{{$row->state_name}}</td>
                 <td scope="row">{{$row->city_name}}</td>
                  
    
    
    
              <td style="text-align:center;"> 
                  <a href="{{action('Admin\AdminSRController@showsr', $row->id)}}" class="btn btn-primary">View User</a>
                  <a href="{{action('Admin\AdminSRController@destroysr', $row->id)}}" class="btn btn-primary">Delete User</a>
            
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

