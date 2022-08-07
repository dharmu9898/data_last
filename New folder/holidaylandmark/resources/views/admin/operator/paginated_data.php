                     @foreach($users as $index => $user)
                                                <tr>

                                                    <td> {{$index + $users->firstItem()}}</td>
                                                    <td class="mob text-capitalize">{{$user->name}} </td>
                                                    <td>{{$user->email}}</td>
                                                    <td style="text-align:center;"> 
    


    <form action="{{route('admin.operator.destroy', $user->id)}}" method="get">

                 <a class="btn btn-info" href="{{ route('admin.operator.show',$user->id) }}">Show</a>
 
                 <a class="btn btn-primary" href="{{ route('admin.operator.edit',$user->id) }}">Edit</a>

                 @csrf
                 @method('DELETE')
   
                 <button type="submit" class="btn btn-danger">Delete</button>
             </form>
         
 </td>
                                                </tr>
                                            @endforeach



                                            
    
                                          