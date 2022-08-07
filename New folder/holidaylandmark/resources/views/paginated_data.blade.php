@if(sizeof($user) >0)
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


@else

<tr>

    <th></th>
    <th></th>
    <th></th>
    <th style="font-size: 22px; color:red;">Data not found</th>
    <th></th>
    <th></th>

</tr>

@endif
