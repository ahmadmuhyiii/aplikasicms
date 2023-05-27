@extends('layouts.plg')

@section('content')
    <div class="container">
        <div class="col">
            <div class="row">
                <!-- DIRECT CHAT -->
                <div class="card-sm-12 col-md-11 direct-chat direct-chat-warning ">
                    <div class="card-header">
                        <h3 class="card-title">Direct Chat ke
                        </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages" id="messageBody">
                            <!-- Message. Default to the left -->
                            @foreach ($getChat as $cht)
                                @if ($cht->from != Auth::user()->id)
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">{{ $cht->getUser->name }}</span>
                                            <span class="direct-chat-timestamp float-right">{{ $cht->created_at }}</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        @if ($cht->getUser->image != null)
                                            <img class="direct-chat-img"
                                                src="{{ asset('storage/' . $cht->getUser->image) }}"
                                                alt="message user image">
                                        @elseif ($cht->getUser->image == null)
                                            <img class="direct-chat-img" src="/img/as.png" alt="message user image">
                                        @endif
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{ $cht->message }}

                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                @else
                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">{{ $cht->getUser->name }}</span>
                                            <span class="direct-chat-timestamp float-left">{{ $cht->created_at }}</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        @if ($cht->getUser->image != null)
                                            <img class="direct-chat-img"
                                                src="{{ asset('storage/' . $cht->getUser->image) }}"
                                                alt="message user image">
                                        @elseif ($cht->getUser->image == null)
                                            <img class="direct-chat-img" src="/img/as.png" alt="message user image">
                                        @endif

                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            {{ $cht->message }}

                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->
                                @endif
                            @endforeach
                        </div>
                        <!--/.direct-chat-messages-->

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <form action="{{ route('chat.store') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="from" value="{{ auth()->user()->id }}" class="form-control">
                                <input type="hidden" name="to" value="{{ $id }}" class="form-control">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control"
                                    required>

                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </span>
                            </div>
                            <small class="bg-warning">Beri tahu produk yang akan di nego!!</small>
                        </form>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
        </div>
    </div>

    <script>
        var messageBody = document.querySelector('#messageBody');
        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    </script>
@endsection
