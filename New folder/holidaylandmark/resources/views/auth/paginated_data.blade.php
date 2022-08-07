@foreach ($user as $use)
        <tr>
            <td>{{ $use->country_name }}</td>
            <td>{{ $use->state_name }}</td>
            <td>{{ $use->city_name }}</td>
            <td>{{ $use->emailid }}</td>
            <td>{{ $use->Phoneno }}</td>
            <td>{{ $use->triptitle }}</td>
            <td>{{ $use->Noofdays }}</td>
            <td>{{ $use->location }}</td>
         
           
        </tr>
        @endforeach