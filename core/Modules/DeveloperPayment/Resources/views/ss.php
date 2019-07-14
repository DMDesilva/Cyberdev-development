  <!-- @foreach($decod as $dev)

  

    $i = 0;

     @foreach($array[$dev] as $devel)

        @if($dev->id == $devel)

            <tr>
              <td>{{$dev->id}}</td>
              <td>{{$dev->firstname}} {{$dev->lastname}}</td>
              <td>ee</td>
              <td>ee</td>
              <td>ee</td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default2">
               Genareate
              </button>
              </td>
            </tr>
      
      @endif
   
     @endforeach
  
  
     @endforeach