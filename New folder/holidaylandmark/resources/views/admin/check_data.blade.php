@if(sizeof($gallery) > 0)

    @foreach ($gallery as $gall)
        <tr>
        <td     >
            <?php
       foreach (json_decode($gall->Image)as $picture) { ?>
                 <img class="center" src="{{ asset('public/image/'. $picture) }}"
                  style="height:35px;  width:60px;border-radius: 5px; transition: .3s;cursor: pointer;"/>
                
                  @break <?php 
            
           
            
            } ?> </td>
             
            <td > {{str_limit($gall->TripTitle, 35)}}</td>
            <td>{{str_limit($gall->country_name, 12)}}</td>
            <td>{{str_limit($gall->state_name, 12)}}</td>
           <td>{{str_limit($gall->city_name, 12)}}</td>
            
            
    
    
    </td>
    
            
           
<td style="text-align:center;"> 
    


            
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

     
