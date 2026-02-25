<div class="col-lg-4 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        <div class="row item-list item-list-sm m-b">
            <div class="col-xs-12">
                @if(!empty($send_offer->sendOfferTransaction) && $send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED || $send_offer->status == \App\Templates\IOfferTemplateStatus::ACCEPTED && $send_offer->sendOfferTransaction->status == \App\Templates\IOfferTemplateStatus::PAID)
                    <div class="bgGradient">
                        <h6 class="text text-muted">Artist Completed Payment</h6>
                        <h6 class="text text-muted">{{getDateFormat($send_offer->sendOfferTransaction->created_at)}}</h6>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <p>{{!empty($send_offer->sendOfferTransaction->userArtist) ? $send_offer->sendOfferTransaction->userArtist->name : '----'}} has completed payment for this offer, Completed Work is expected around {{getDateFormat($send_offer->expiry_date)}}.</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bgGradient">
                        <h6 class="text text-muted">Expected Completion Date:</h6>
{{--                        <h6 class="text text-muted">Completed Date</h6>--}}
                        <h6 class="text text-muted">{{getDateFormat($send_offer->expiry_date)}}</h6>
                    </div>
                @endif
            </div>
        </div>

        <div class="bgGradient">
            <h6 class="text text-muted">Chat With {{Auth::user()->getUserType()}}</h6>
{{--            <div class="form-group row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <p>BE A PART OF THE GROWTH OF OUR COMMUNITY!</p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="form-group row">
                <div class="col-sm-12">
                    <section class="chatbox">
                        <section class="chat-window">
                            <div class="render-messages" id="render-messages"></div>
                        </section>
                        <form class="chat-input" onsubmit="return false;">
                            <input type="text" autocomplete="on" id="message" name="message" placeholder="Type a message" />
                            <button id="btnSend">
                                <i class="fa fa-send"></i>
{{--                                <img src="{{asset('images/msg_icon.png')}}" alt="">--}}
{{--                                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="rgba(0,0,0,.38)" d="M17,12L12,17V14H8V10H12V7L17,12M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L5,8.09V15.91L12,19.85L19,15.91V8.09L12,4.15Z" /></svg>--}}
                            </button>
                        </form>
                        <input type="hidden" value="{{ !empty($conversation_id) ? $conversation_id : '' }}" id="convo_id" name="convo_id">
                        <input type="hidden" value="{{ !empty($send_offer) ? $send_offer->id : '' }}" id="send_offerID" name="send_offerID">
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@section('chat-script')
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script>
        $( document ).ready(function() {
            scrollChat();
        })
    </script>
    <script>
        var config = {
            apiKey: "{{config('services.firebase.api_key')}}",
            authDomain: "{{config('services.firebase.auth_domain')}}",
            databaseURL: "{{config('services.firebase.database_url')}}",
            projectId: "{{config('services.firebase.project_id')}}",
            storageBucket: "{{config('services.firebase.storage_bucket')}}",
            messagingSenderId: "{{config('services.firebase.messaging_sender_id')}}",
        };
        firebase.initializeApp(config);

        var convo_id = {{ $conversation_id }};
        var send_offerID = {{ !empty($send_offer) ? $send_offer->id : '' }};


        var initFirebase = function(){
            console.log('here');
            firebase.database().ref("/messages").orderByChild("conversation_id").equalTo(convo_id).on("value", function(snapshot) {
                console.log('true');
                reloadConversation();
            });
        }


        var reloadConversation = function(){
            $.get("{{ route('get.customer.chat') }}?id="+convo_id+"&send_offerID="+send_offerID, function(messages){
                $('.render-messages').html(messages);
                scrollChat();
            });
        }
        $("#btnSend").click(function(e) {
            showLoader();
            var self = $(this);
            var message = $('#message').val();
            var send_offerID = $('#send_offerID').val();

            if(message == '')
            {
                loader();
                toastr.error('Enter message please');
                return false;
            }
            else if (/^[0-9]+(\.[0-9]+)?$/.test(message))
            {
                loader();
                toastr.error('Numbmer sharing is not allowed!');
                return false;
            }
            self.attr('disabled', true);
            $.ajax({
                url: '{{ route("save.messsage") }}',
                data: {
                    message: message,
                    send_offerID: send_offerID,
                    con_id: {{ $conversation_id }},
                    receiver_id: @json($receiver_id ?? null),
                },
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response) {
                    loader();
                    self.attr('disabled', false);
                    $('#message').val('');
                    initFirebase();
                    reloadConversation();
                    scrollChat();

                }
            });
        });
        initFirebase();
        reloadConversation();
    </script>
    <script>
        var scrollChat = function()
        {
            var objDiv = document.getElementById("render-messages");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    </script>

    <script>
        var input = document.getElementById("message");

        input.addEventListener("keyup", function(event) {

            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementById("btnSend").click();
            }
        });
    </script>
    <script>
        $('.chat-input input').keyup(function(e) {
            if ($(this).val() == '')
                $(this).removeAttr('good');
            else
                $(this).attr('good', '');
        });
    </script>
@endsection
