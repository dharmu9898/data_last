@if(sizeof($category) >0)
@foreach($category as $employee)
                                                <tr>


                                                    
                                                 <td><img src="{{ URL::to('/') }}/public/category/{{ $employee->Image }}" class="rounded-circle" width="60" height="50" /></td>
                                       <td>{{ $employee->category }}</td>
                                       <td> {!! Str::words($employee->Describe,5)!!} </td>
                                                                                       
                                                    <td style="text-align:center;"> 
    


   <form action="{{ route('admin.destroycategory', $employee->id) }}" onclick="return confirm('Are you sure you want to delete this operator Access?')" method="get">
	<a href="{{ route('admin.showcategory', $employee->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Show</a>
	<a href="{{ route('admin.editcategory', $employee->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
  @csrf
                    @method('DELETE')
	<button type="submit"  onclick="return confirm('Are you sure you want to delete this operator Access?')" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
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
