@if(sizeof($socialmembers) > 0)
@foreach($socialmembers as $row)
              <tr>
                  <td scope="row">{{$row->name}}</td>
                  <td scope="row">{{$row->country_name}}</td>
                     <td scope="row">{{$row->state_name}}</td>
                      <td scope="row">{{$row->city_name}}</td>
                     <td scope="row">{{$row->concern}}</td>
                     

                   <td style="text-align:center;"> 
                      <a href="{{action('SocialMember\SocialMemberController@show', $row->request_id)}}" class="btn btn-primary">View Request</a>
                       <a href="{{action('SocialMember\SocialMemberController@destroy', $row->request_id)}}" class="btn btn-primary">Delete</a>
                                  
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

