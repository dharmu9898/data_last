@if(sizeof($touroperator) > 0)
@foreach ($touroperator as $tour)
<tr>
    <td style="font-size:15px;">{{ $tour->country_name }}</td>
    <td style="font-size:15px;">{{ $tour->state_name }}</td>
    <td style="font-size:15px;">{{ $tour->city_name }}</td>
    <td style="font-size:15px;">{{ $tour->emailid }}</td>
    <td style="font-size:15px;">{{ $tour->Phoneno }}</td>
    <td style="text-align:center;">
        <form action="{{route('touroperator.destroy',$tour->id)}}" method="get">
            <a class="btn btn-primary" href="{{ route('touroperator.show',$tour->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('touroperator.edit',$tour->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Delete</button>
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