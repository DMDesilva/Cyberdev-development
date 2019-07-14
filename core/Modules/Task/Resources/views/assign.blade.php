              <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Task Assign : {{$tmk->id}}</h4>
          </div>
          <div class="modal-body">
            <form >
            
                
          

              <div class="form-group">
                <label for="description">Task Description</label>
                <textarea class="form-control" rows="2"  id="description"></textarea>
              </div>



             <div class="form-group">
              <label>Assign Developer</label>
                <select class="form-control" name="user_assign" id="user_assign">
                @foreach($developers as $qwe)
                  <option value="{{$qwe->id}}">{{$qwe->firstname,$qwe->lastname}}</option>
                @endforeach
                </select>
              </div>
              
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="tskId" id="tskId" name="tskId" value="{{$tmk->id}}">
              </div>

              <div class="form-group">
                  <input type="text" class="form-control" placeholder="tskdeadline" id="tskdeadline" name="tskdeadline" value="{{$tmk->deadline}}">
              </div>

              <!--  <div class="form-group">
                <label>Assign User</label>
               <select class="form-control" name="type">
                 
                  <option value ="user1">User1</option>
                  <option value ="user2">User2</option>
                  <option value ="user3">User3</option>
                  <option value ="user4">User4</option>
                  
                </select>
              </div> -->
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="data_pass()" >Submit</button>
              

    
          </div>
        </form>
          <script>
              function data_pass() {
                var description=$('#description').val();
                var user_assign=$('#user_assign').val();
                var tskId=$('#tskId').val();
                var tskdeadline=$('#tskdeadline').val();
                $.ajax({
                    method: "POST",
                    url: "{{url('/task/assign/insert')}}",
                    data: { description: description, user_assign: user_assign, tskId: tskId, tskdeadline: tskdeadline }
                  })
                    .done(function( msg ) {
                      alert( "Assign Task Success!!!! " + msg );
                    });
              }
            
          </script>