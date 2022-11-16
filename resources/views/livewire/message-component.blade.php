@push('livewire')
@livewireStyles
@livewireScripts
@endpush
<div>
    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Students
                </div>
                <div class="card-body chatbox">
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search A Student...." id="studentSearch">
                            <input type="hidden" id="searchStudentId" >
                        </div>
                        <div>
                            <button class="btn btn-success">Send Message</button>
                        </div>
                    </div>
                    <div id="searchData"></div>
                    <ul class="list-group list-group-flush">
                        @foreach ($students as $student)
                        <a  class="text-dark link" wire:click="getStudent({{$student->id}})">
                            <li class="list-group-item">
                                <img class="img-fluid avatar" src="{{ asset($student->image) }}" style="min-width:50px">
                                 <i class="fa fa-circle text-success online-icon">
                                 </i> {{ $student->firstname }} {{ $student->lastname }}
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
                    <img src="{{ asset($sender->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-1">
                    {{$senderName }}   @endif
                </div>
            </div>
            <div class="card-body message-box w-100" wire:poll.visible="mountData">
                @if(count($allMessages) == 0)
                <div class="single-message">
                    Hey <b>{{ auth('instructor')->user()->firstname }}</b>, make a conversation with <b>{{ $senderName }}</b>
                    <span style="color: #f1c40f"><i class="far fa-smile-wink"></i> <i class="far fa-smile-wink"></i></span>
                </div>
                @else
                    @if(filled($allMessages))
                    @foreach($allMessages as $mgs)
                        @if ($mgs->sender_id == auth('instructor')->id() && $mgs->senderType =='instructor' )
                        <div>
                            <div class="single-message  sent">
                                <div class="d-flex">
                                    <img src="{{ asset($sender->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-1">
                                    <p class="font-weight-bolder my-0" >
                                        @if ($mgs->sender_id == auth('instructor')->id()  && $mgs->senderType =='instructor')
                                            {{ auth('instructor')->user()->firstname }}  {{ auth('instructor')->user()->lastname }}
                                        @else
                                        {{ $senderName}}
                                        @endif
                                    </p>
                                </div>
                            {{ $mgs->message}}
                                <br><small class="text-muted w-100">Sent <em>{{$mgs->created_at->format('h:i:s A Y-m-d')}}</em></small>
                            </div>
                        </div>
                        @else
                        <div>
                            <div class="single-message  received">
                                <div class="d-flex">
                                    <img src="{{ asset(auth('instructor')->user()->image) }}" alt="" style="width: 25px;height:25px;border-radius:50%" class="mr-1">
                                    <p class="font-weight-bolder my-0" >
                                        @if ($mgs->sender_id == auth('instructor')->id()  && $mgs->senderType =='instructor' )
                                            {{ auth('instructor')->user()->firstname }}  {{ auth('instructor')->user()->lastname }}
                                        @else
                                        {{ $senderName}}
                                        @endif
                                    </p>
                                </div>
                            {{ $mgs->message}}
                                <br><small class="text-muted w-100" style="font-size: 11px">Sent <em>{{$mgs->created_at->format('h:i:s A Y-m-d')}}</em></small>
                            </div>
                        </div>
                        @endif
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

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    $('body').on('keyup','#studentSearch',()=>{
        let search = $('#studentSearch').val()
        $('#searchData').show()
        const url = window.location.origin
        if(search !== ''){
            axios.get(`${url}/chat/students`,{
            params: search
            })
            .then(res =>{
                searchDataShow(res.data)
            })
            .catch(err => {
                console.log(err)
            })
        }else{
            $('#searchData').hide()
        }

    })

    function searchDataShow(data){
        let html = ''
        html += '<div class="skill_style"><ul>'
        if(data.length == 0){
            html += '<li>Not Found</li>'
            $('#searchData').html(html)
        }else{
            data.forEach((value,index) => {
                html += `<li class="chat-item" data-id="${value.id}">${value.firstname} ${value.lastname}</li>`
            })
            $('#searchData').html(html)
            dynamicItemSelect()
        }
    }

    function dynamicItemSelect(){
        $(document).on('click','.chat-item',function () {
        $('#studentSearch').val($(this).text());
        $('#searchStudentId').val($(this).attr("data-id"))
        $('#searchData').fadeOut();
    })
    }
</script>
@endsection
