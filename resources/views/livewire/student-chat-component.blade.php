@push('livewire')
@livewireStyles
@livewireScripts
@endpush
<div>
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Instructor
                </div>
                <div class="card-body chatbox">
                    <ul class="list-group list-group-flush">
                        @foreach ($instructors as $instructor)
                        <a  class="text-dark link" wire:click="getInstructor({{$instructor->id}})">
                            <li class="list-group-item">
                                <img class="img-fluid avatar" src="{{ asset($instructor->image) }}" style="min-width:50px">

                                 <i class="fa fa-circle text-success online-icon">


                                 </i> {{ $instructor->firstname }} {{ $instructor->lastname }}
                                    {{-- <div class="badge badge-success rounded"> 5 </div> --}}

                            </li>
                        </a>
                        @endforeach

                      </ul>
                </div>
            </div>
        </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <div class="d-flex">
                    @if(isset($senderName)  && isset($sender))
                    <img src="{{ asset($sender->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-2 mx-2">
                   <span class="d-inline-block ml-4"> {{$senderName }}</span>
                    @endif
                </div>
            </div>
            <div class="card-body message-box w-100" wire:poll.visible="mountData">
                @if(count($allMessages) == 0)
                    <div class="single-message">
                        Hey <b>{{ auth('web')->user()->firstname }}</b>, make a conversation with <b style="color: #2c3e50">{{ $senderName }}</b>

                    </div>
                    @else
                @if(filled($allMessages))
                    @foreach($allMessages as $mgs)
                        <div class="single-message @if($mgs->sender_id == auth('web')->id() && $mgs->senderType =='student' ) sent @else received @endif">
                            <div class="d-flex">
                                @if ($mgs->sender_id == auth('web')->id()  && $mgs->senderType =='student')
                                <img src="{{ asset(auth('web')->user()->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-1">
                                @else
                                <img src="{{ asset($sender->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-1">
                                @endif

                                <p class="font-weight-bolder my-0 mx-1" >
                                    @if ($mgs->sender_id == auth('web')->id()  && $mgs->senderType =='student')
                                        {{ auth('web')->user()->firstname }}  {{ auth('web')->user()->lastname }}
                                    @else
                                    {{ $senderName }}
                                    @endif
                                </p>
                            </div> <!-- end flex div -->

                            {{ $mgs->message}}
                            <br><small class="text-muted w-100">Sent <em>{{$mgs->created_at->format('h:i:s A Y-m-d')}}</em></small>
                        </div>

                        @endforeach
                    @endif
                @endif

            </div>

            <div class="card-footer">
                @if($isMessageBox)
                <form wire:submit.prevent="sendMessage">
                    <div class="row">
                        <div class="col-md-8">
                            <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" >
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                        </div>
                    </div>
                </form>
                    @if ($isEmpty)
                    <span class="text-danger">Field Must not be empty!</span>
                    @endif
                @endif
            </div>

        </div>
    </div>
</div>
</div>
<style>
    .avatar {
height: 50px;
width: 50px;
}
.list-group-item:hover, .list-group-item:focus {
background: rgba(24,32,23,0.37);
cursor: pointer;
}
.chatbox {
height: 60vh !important;
overflow-y: scroll;
}
.message-box {
height: 60vh !important;
overflow-y: scroll;display:flex; flex-direction:column-reverse;
}
.single-message {
background: #f1f0f0;
border-radius: 12px;
padding: 10px;
margin-bottom: 10px;
width: fit-content;
}
.received {
margin-right: auto !important;
}
.sent {
margin-left: auto !important;
background :#3490dc;
color: white!important;
}
.sent small {
color: white !important;
}
.link:hover {
list-style: none !important;
text-decoration: none;
}
.online-icon {
font-size: 11px !important;
}
</style>

