
@foreach($user as $index => $user)
                                                <tr>

                                                    
                                                    <td class="mob text-capitalize">{{$user->name}} </td>
                                                    <td>{{$user->country_name}}</td>
                                                    <td>{{$user->state_name}}</td>
                                                    <td>{{$user->city_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                   
                                                    <td style="text-align:center;"> 
    


    
                 <a style="color:white;" class="btn btn-primary" href="{{ route('touroperator.editprofile',$user->id) }}">Edit</a>
                 <a style="color:white;" class="btn btn-success" href="{{ route('touroperator.showprofile',$user->id) }}">Show</a>
    
                 @csrf
                 @method('DELETE')
   
                
         
 </td>
                                                </tr>
                                            @endforeach


