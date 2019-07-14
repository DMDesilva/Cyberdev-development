@extends('layouts.master')

@section('content')

<style type="text/css">
  .section_container{
    background-color: #fff;
    height: auto;
    width: 100%;
    border: 1px solid #eee;
    border-radius: 3px;
    padding: 15px 5px;
    margin-bottom: 15px;
  }
  .left_panel {
    /*padding-left: 25px;
    padding-right: 25px;*/
  }
  .right_panel {
    margin-top: 5px;
    float: right;
  }
  .timer.well{
    width: 100%;
    font-size: 80px;
    font-weight: 800!important;
    line-height: 111px;
    margin-bottom: 0!important;
    text-align: center;

  }

  .style_button{
    display: inherit;
    width: 100%;
    /*max-width: 200px;*/
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .table_style{
    width: 100%;
    height: auto;
    text-align: center;
  }
  .notification-area-wrapper.normal {
    border-right: 1px solid #5ba71b;
    border-bottom: 1px solid #5ba71b;
    border-left: 1px solid #5ba71b;
    border-top: 3px solid #5ba71b;
    background-color: rgb(91,167,27,0.15);
  
  }
  .notification-area-wrapper {
    padding: 10px 10px 10px 10px;
    height: auto;
    width: 100%;
  }

  .table_style tr th {
    text-align: center;
  } 

  }
</style>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="notification-area-wrapper normal" id="notification">
            <span>Could't find what you're looking for? Just post it here. We will work for you to find the exact as you want.<!--  Post? <a href="">Click here</a> --></span>
            <a href="#" onclick="setLocation('');" class="close_btn"><i class="fa fa-times"></i></a>
    </div>

    <section class="content-header">
        <div class="section_container col-12 col-md-12">
          <div class="left_panel col-12 col-md-4">
            <form>
            <input type="button" class="btn btn-primary style_button" id="btnStat" name="btnStat" value="Let's start working" onclick="startWork();">
            <input type="button" class="btn btn-warning style_button" id="btnPause" name="btnPause" value="Pause working" onclick="pauseWork();">
            <input type="button" class="btn btn-success style_button" id="btnContinue" name="btnContinue" value="Continue again" onclick="continueWork();"> 
            <input type="button" class="btn btn-danger style_button" id="btnEnd" name="btnEnd" value="End woking for today!" onclick="endWork(); end();"> 
            </form>
          </div>

          <div class="right_panel col-12 col-md-8 text-center">
              <!-- timer code here -->
              <!-- <div class="timer well"></div>-->

              @if($data1->type==1)
              <h1>Started at {{$data1->created_at}}</h1>
              @elseif($data1->type==2)
              <h1>Paused at {{$data1->created_at}}</h1>
              @elseif($data1->type==3)
              <h1>Countinued at {{$data1->created_at}}</h1>
              @elseif($data1->type==4)
              <h1>Ended at {{$data1->created_at}}</h1>
              @endif
          </div>
        </div>

      <div class="section_container col-12 col-md-12">
        <table class="table_style">
          <tr>
          <th>type</th>
          <th>time</th>
          <th>Difference</th>
          </tr>
          @foreach ($data as $dt)
          <tr>
          @if($dt->type==1)
            <td>Start</td>
            @elseif($dt->type==2)
            <td>Pause</td>
            
            @elseif($dt->type==3)
            <td>Continue</td>
            
            @elseif($dt->type==4)
            <td>End</td>
            
          @endif
          <td>{{$dt->created_at}}</td>
          <td>{{$dt->time_difference}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </section>
</div>
    

  
  <!-- /.content-wrapper -->

@push('script')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="{{asset('assets/js/jquery-1.12.4.min.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{asset('assets/js/ez.countimer.js')}}"></script>
  <script type="text/javascript">
      $( document ).ready(function() {
          $('.timer').countimer({
        autoStart : false
        });
      });
  </script>
  <script>
    function startWork(){
       Swal.fire({
          title: 'Are you sure?',
          text: "Do you won't to Continue",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              method: "POST",
              url: "{{url('/start')}}",
              data: {  },

            })
            .done(function( msg ) {
                  location.reload(true);
            });

            
          }
        })
    }
    function pauseWork(){
       Swal.fire({
          title: 'Are you sure?',
          text: "Do you won't to Continue",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
              $.ajax({
                method: "POST",
                url: "{{url('/pause')}}",
                data: {  }
              })
              .done(function( msg ) {
                location.reload(true);
            });
          }
        })
    }
    function continueWork(){
       Swal.fire({
          title: 'Are you sure?',
          text: "Do you won't to Continue",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.value) {
              $.ajax({
                method: "POST",
                url: "{{url('/continue')}}",
                data: {  }
              })
                .done(function( msg ) {
                  location.reload(true);
            });
          }
        })
      
    }
    function endWork(){

      swal("Enter Note Here:", {
          content: "input",
           title: "Are you sure?",
           icon: "warning",
           buttons: true,
           dangerMode: true,

         })
        .then((value) => {
          if(value==null){
            
          }
          else{
            var x = `${value}`;
            $.ajax({
                method: "POST",
                url: "{{url('/workStatus')}}",
                data: { note: x }
              })
              .done(function( msg ) {
                  location.reload(true);
            });
                            $.ajax({
                method: "POST",
                url: "{{url('/end')}}",
              })
                .done(function( msg ) {
                  location.reload(true);
            });
          
          }
             
         
        });
      }
  </script>
@endpush
@stop
