@if(sizeof($users) >0)
@foreach($users as $index => $user)
<tr>
    <td class="mob text-capitalize">{!! Str::words($user->name,5)!!} </td>
    <td>{{$user->country_name}}</td>
    <td>{{$user->state_name}}</td>
    <td>{{$user->city_name}}</td>
    <td>{!! Str::words($user->email,5)!!}</td>

    <td style="text-align:center;">
        <form action="{{route('admin.operator.destroy', $user->id)}}" confirm('Are you sure you want to delete this
            operator Access'); method="post">
            <a style="color:white;" class="btn btn-primary" href="{{ route('admin.operator.edit',$user->id) }}">Edit</a>
            <a style="color:white;" class="btn btn-success" href="{{ route('admin.operator.show',$user->id) }}">Show</a>
            @csrf
            @method('DELETE')
            <button style="color:white;" type="submit"
                onclick="return confirm('Are you sure you want to delete this operator Access?')"
                class="btn btn-danger">Delete</button>
        </form>
    </td>
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