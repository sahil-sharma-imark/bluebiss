@include('layouts.admin.header')

<style>


.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin Chat</span> </h4>
    <div class="row">
      <?php
      $provider_image = DB::table('users')->where('id',$provider_id_value)->select('image')->first();
      $user_image = DB::table('users')->where('id',$user_id_value)->select('image')->first();
      
      
      ?>

      @foreach($get_all_chats as $get_all_chat)
      @if($get_all_chat->sender_id == $provider_id_value)
      <div class="container">
        <img src="{{asset('uploads/provider/'.$provider_id_value.'/business_profile/'.$provider_image->image )}}" alt="Avatar" class="left" style="width:100%;">
        <p style="float:left; padding-top:20px">Provider</p>
        <span class="time-right">{{$get_all_chat->message}}<br><br>11:00</span>
      </div>
      @endif

      @if($get_all_chat->sender_id == $user_id_value)
      <div class="container darker">
        <p class="right" style="width:100%;">
            <img src="{{asset('uploads/user/'.$user_id_value.'/'.$user_image->image )}}" alt="Avatar" class="right" style="width:100%;">
            <span style="float:right;padding-top:20px">User</span>
        </p>
        
        <p>{{$get_all_chat->message}}</p>
        <span class="time-left">11:01</span>
      </div>
      @endif

      @endforeach      

    </div>
  </div>
</div>
  @include('layouts.admin.footer')
