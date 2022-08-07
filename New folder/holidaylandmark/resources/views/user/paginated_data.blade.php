@foreach ($user as $use)
        <tr>
           
        <td scope="col">{{ $use->name }}</td>
            <td scope="col">{{ $use->email }}</td>
            <td scope="col">{{ $use->Phoneno }}</td>
            <td scope="col" >{{ $use->Address }}</td>
           
            <td scope="col" >{{ $use->TripTitle }}</td>
         
           
           <td  scope="col" style="color:white;"> <a href="{{route('user.show', $use->TripTitle)}}" class=" btn btn-primary "> Show  </a></td>
           
        </tr>
        @endforeach



     
