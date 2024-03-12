@extends('../layouts.guests')

@section('content')
<style>
body{margin-top:20px;}


/* Component: Chat */
.chat .chat-wrapper .chat-list-wrapper {
  border: 1px solid #ddd;
  height: 510px;
  overflow-y: auto;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list {
  padding: 0;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li {
  display: block;
  padding: 20px 10px;
  clear: both;
  cursor: pointer;
  border-bottom: 1px solid #ddd;
  -webkit-transition: all 0.2s ease-in-out;
  -moz-transition: all 0.2s ease-in-out;
  -ms-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .avatar {
  margin-right: 12px;
  float: left;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .avatar img {
  width: 60px;
  height: auto;
  border: 4px solid transparent;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .avatar.available img {
  border-color: #2ecc71;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .avatar.busy img {
  border-color: #ff530d;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header {
  margin-top: 4px;
  margin-bottom: 4px;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .username {
  font-weight: bold;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .timestamp {
  float: right;
  color: #999;
  font-size: 11px;
  line-height: 18px;
  font-style: italic;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .timestamp i {
  margin-right: 4px;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li .body p {
  font-size: 12px;
  line-height: 16px;
  max-height: 32px;
  overflow: hidden;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li:hover {
  background-color: #f4f4f4;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li.active {
  background-color: #eee;
  color: black;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li.active .body .timestamp {
  color: black;
}
.chat .chat-wrapper .chat-list-wrapper .chat-list li.new {
  border-left: 2px solid #2ecc71;
}
.chat .chat-wrapper .message-list-wrapper {
  border: 1px solid #ddd;
  height: 452px;
  position: relative;
  overflow-y: auto;
}
.chat .chat-wrapper .message-list-wrapper .message-list {
  padding: 0;
}
.chat .chat-wrapper .message-list-wrapper .message-list li {
  display: block;
  padding: 20px 10px;
  clear: both;
  position: relative;
  color: white;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .avatar {
  margin-right: 12px;
  display: block;
  float: left;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .avatar img {
  width: 60px;
  height: auto;
  border: 2px solid transparent;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .avatar.available img {
  border-color: #2ecc71;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .avatar.busy img {
  border-color: #ff530d;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .username {
  float: left;
  display: none;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .timestamp {
  text-align: left;
  display: block;
  color: #999;
  font-size: 11px;
  line-height: 18px;
  font-style: italic;
  margin-bottom: 4px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .timestamp i {
  margin-right: 4px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .body {
  display: block;
  width: 87%;
  float: left;
  position: relative;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .body .message {
  font-size: 12px;
  line-height: 16px;
  display: inline-block;
  width: auto;
  background: #2ecc71;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .body .message:before {
  content: '';
  display: block;
  position: absolute;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 9px 9px 9px 0;
  border-color: transparent #2ecc71 transparent transparent;
  left: 0;
  top: 10px;
  margin-left: -8px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .body .message a.white {
  color: white;
  font-weight: bolder;
  text-decoration: underline;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.left .body .message img {
  max-width: 320px;
  max-height: 320px;
  width: 250px;
  margin-bottom: 5px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .avatar {
  margin-left: 12px;
  display: block;
  float: right;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .avatar img {
  width: 60px;
  height: auto;
  border: 2px solid transparent;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .avatar.available img {
  border-color: #2ecc71;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .avatar.busy img {
  border-color: #ff530d;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .username {
  float: right;
  display: none;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .timestamp {
  text-align: right;
  display: block;
  color: #999;
  font-size: 11px;
  line-height: 18px;
  font-style: italic;
  margin-bottom: 4px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .timestamp i {
  margin-right: 4px;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .body {
  display: block;
  width: 87%;
  float: right;
  position: relative;
  text-align: right;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .body .message {
  font-size: 12px;
  line-height: 16px;
  display: inline-block;
  width: auto;
  background: #3498db;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .body .message:after {
  content: '';
  display: block;
  position: absolute;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 9px 9px 9px 0;
  border-color: transparent #3498db transparent transparent;
  right: 0;
  top: 10px;
  margin-right: -7px;
  -moz-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg);
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .body .message a.white {
  color: white;
  font-weight: bold;
}
.chat .chat-wrapper .message-list-wrapper .message-list li.right .body .message img {
  max-width: 320px;
  max-height: 320px;
  width: 250px;
  margin-bottom: 5px;
}
.chat .chat-wrapper .compose-area {
  padding: 10px 0;
  text-align: right;
}
.chat .chat-wrapper .compose-box {
  padding: 10px 0;
}
.chat .chat-wrapper .recipient-box {
  padding: 10px 0;
}
.chat .chat-wrapper .recipient-box .bootstrap-tagsinput {
  display: block;
  width: 100%;
  margin-bottom: 0;
}
@media (max-width: 767px) {
  .chat .chat-wrapper .chat-list-wrapper {
    border: 1px solid #ddd;
    height: 300px;
    overflow-y: auto;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list {
    padding: 0;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li {
    display: block;
    padding: 20px 10px;
    clear: both;
    border-bottom: 1px solid #ddd;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .avatar {
    display: none;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header {
    margin-top: 4px;
    margin-bottom: 4px;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .username {
    font-weight: bold;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .timestamp {
    float: right;
    color: #999;
    font-size: 11px;
    line-height: 18px;
    font-style: italic;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .body .header .timestamp i {
    margin-right: 4px;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li .body p {
    display: none;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li.active {
    color: black;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li.active .body .timestamp {
    color: black;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li.new {
    font-weight: bolder;
  }
  .chat .chat-wrapper .chat-list-wrapper .chat-list li.new .body .timestamp {
    font-weight: bolder;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.left .avatar {
    display: none;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.left .username {
    display: inline-block;
    margin-right: 10px;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.left .body {
    width: 100%;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.right .avatar {
    display: none;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.right .username {
    display: inline-block;
    margin-left: 10px;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.right .timestamp {
    text-align: right;
    display: block;
    color: #999;
    font-size: 11px;
    line-height: 18px;
    font-style: italic;
    margin-bottom: 4px;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.right .timestamp i {
    margin-right: 4px;
  }
  .chat .chat-wrapper .message-list-wrapper .message-list li.right .body {
    width: 100%;
  }
  .chat .chat-wrapper .recipient-box {
    margin-top: 30px;
  }
}

.btn-green {
    background-color: #2ecc71;
    border-color: #27ae60;
    color: white;
}

.mg-btm-10 {
    margin-bottom: 10px !important;
}

.panel-white {
    border: 1px solid #dddddd;
}
.panel {
    border-radius: 0;
    margin-bottom: 30px;
}
.border-top-green {
    border-top: 4px solid #27ae60 !important;
}

</style>
<div class="container">

<!-- 
    title (required)
    description
    city (required)
    address (required)
    when_at (required)
    picture
    finder    


 -->

 <h1>Send Message To Finder</h1>
 <hr>

@if (isset($_GET['created']) && $_GET['created'] == 'success')
    <div class="alert alert-success" role="alert">
        Message Sent successfully!
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container">
<div class="row">
        <div class="col-sm-12">
            <div class="panel panel-white border-top-green">
                <div class="panel-body chat"> 
                    <div class="row chat-wrapper">  
                        <div class="col-md-4">
                            <div>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 550px;">
                                <div class="chat-list-wrapper" style="overflow-y: auto; width: auto; height: 550px;">
                                    <ul class="chat-list">
                                        <li class="new"  class="active">
                                            <span class="avatar available">
                                                <img src="https://www.gravatar.com/avatar/finder?s=100&d=identicon&r=PG&f=y&so-version=2" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body">
                                                <div class="header">
                                                    <span class="username">Gavin Free</span>
                                                    <small class="timestamp text-muted">
                                                        <i class="fa fa-clock-o"></i>1 secs ago
                                                    </small>
                                                </div>
                                                <p>
                                                   Hey, have you finished up with the Ladybug project?
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 478.639px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-8">
                            
                            <div>
                                <div class="slimScrollDiv" style="position: relative;  width: auto; height: 452px;">
                                <div class="message-list-wrapper" style=" width: auto; height: 452px;">
                                    <ul class="message-list">
                                        @foreach ($messages[0]->chat as $message)                                            
                                        <li class="{{ $message->user === 'finder'? 'left' : 'right'; }}">
                                            <span class="username">{{ $message->user }}</span>
                                            <small class="timestamp">
                                                <i class="fa fa-clock-o"></i>{{ $message->created_at }}
                                            </small> 
                                            <span class="avatar available tooltips" data-toggle="tooltip " data-placement="right" data-original-title="Yanique Robinson">
                                                <img src="https://www.gravatar.com/avatar/{{ $message->user }}?s=100&d=identicon&r=PG&f=y&so-version=2" alt="avatar" class="img-circle">
                                            </span>
                                            <div class="body">   
                                                <div class="message well well-sm">
                                                    <div class="text-left" style="margin-bottom: 15px">{{ $message->message }}</div>
                                                    @if(strlen(strpos($message->proof, 'pictures')) > 0)
                                                    <img src="{{ asset('storage/' . $message->proof) }}" style="height:100%" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                        </li>  
                                        @endforeach 
                                    </ul>
                                </div><div class="slimScrollBar" style="width: 7px; position: absolute; top: 265px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 187.092px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>

                                <form action="{{ route('sendToFinder', request()->route('reference')) }}" method="post" enctype="multipart/form-data"  class="compose-box">
                                    <div class="row">
                                            {{ csrf_field() }}
                                           </div>
                                           <textarea id="btn-input" class="form-control input-sm" name="message" placeholder="Type your message here..."></textarea>
                                        </div>
                                        <div class="col-xs-8">
                                            <label class="btn btn-green btn-sm" for="upload-image" >
                                                <i class="fa fa-camera"></i></label>
                                                <input type="file" id="upload-image" name="proof" style="display:none">
                                        </div>
                                        <div class="col-xs-4"> 
                                            <button class="btn btn-green btn-sm pull-right">
                                                <i class="fa fa-location-arrow"></i> Send
                                            </button>
                                        </div> 
                                    </div> 
                                </form>
                                
                            </div>
                            
                        </div>                                    
                    </div> 
                    
                </div> 
            </div>
        </div>

    </div>
</div>


</div>



@endsection