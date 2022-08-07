@if(sizeof($gallery) > 0)
@foreach ($gallery as $gall)
<tr class="text-center">
<td><img src="{{ URL::to('/') }}/public/category/{{ $gall->Image }}" class="rounded-circle" width="60"
            height="50"/></td>
    <td>{{ $gall->country_name }}</td>
    <td>{{ $gall->state_name }}</td>
    <td> {!! Str::words($gall->Explain,5)!!} </td>
    <td width="25%">
        <!-- here is the button action side where you can edit . view and delete the employee record -->
        <form action="{{ route('admin.destroystate', $gall->id) }}" method="get">
            <a href="{{ route('admin.showstatetour', $gall->id) }}" class="btn btn-sm btn-warning"><span
                    class="fa fa-eye"></span> Show</a>
            <a href="{{ route('admin.editstate', $gall->id) }}" class="btn btn-sm btn-info"><span
                    class="fa fa-edit"></span> Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
        </form>
        <!-- ends here -->
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