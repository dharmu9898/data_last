<form method="post" action="{{ route('update') }}" enctype="multipart/form-data">

    <div class="form-group">
        <label class="col-md-4 text-right">Enter Full Name</label>
        <div class="col-md-8">
        
            <input type="text" name="full_name" class="form-control input-lg" value="{{$data_value['full_name']}}" />
            <input type="hidden" name="id" value="{{$data_value['id']}}" class="form-control input-lg" />
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control input-lg" />
            <input type="hidden" name="user_email" value="{{ Auth::user()->email }}" class="form-control input-lg" />
       
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="form-group">
        <label class="col-md-4 text-right">Enter Full Address</label>
        <div class="col-md-8">
            <input type="text" name="address" class="form-control input-lg" value="{{$data_value['address']}}"/>
        </div>
    </div>
    
    <br />
    <br />
    <br />
    <!-- <div class="form-group">
                        <label class="col-md-4 text-right">Select Profile Image</label>
                        <div class="col-md-8">
                            <input type="file" name="image"/>
                        </div>
                    </div> -->
    <br /><br /><br />
    <button>Save</button>
</form>