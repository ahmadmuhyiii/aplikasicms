@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- /.col -->
            <div class="col-sm-6 col-md-5 ">
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">

                                <div class="input-group-append">
                                    <div class="btn btn-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope-plus" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                            <path
                                                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                        </svg> <a href="{{ route('chat.show', $id = 1) }}">Chat Admin</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-controls">
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @foreach ($froms as $value)
                                    @if ($value->from == strval(Auth::id()))
                                        @php($tampilchat = DB::table('users')->find($value->from))
                                        @php($tampilchatTo = DB::table('users')->find($value->to))
                                        <tr class='clickable-row' data-href="{{ route('chat.show', $value->to) }}">
                                            <td class="mailbox-name"><a href="{{ route('chat.show', $value->to) }}">
                                                    @if ($tampilchat->image != null)
                                                        <img class="direct-chat-img"
                                                            src="{{ asset('storage/' . $tampilchat->image) }}"
                                                            alt="image">
                                                    @elseif ($tampilchat->image == null)
                                                        <img class="direct-chat-img" src="/img/as.png"
                                                            alt="message user image">
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="mailbox-name"><a href="{{ route('chat.show', $value->to) }}">Pesan
                                                    Dari : {{ $tampilchatTo->name }}</a>
                                            </td>
                                            <td class="mailbox-subject"><a href="{{ route('chat.show', $value->to) }}">
                                                </a>
                                            </td>
                                            <td class="mailbox-date"></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                </div>
            </div>
            <!-- /.col -->


        </div>
    </div>
@endsection
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>
{{-- @foreach ($messages as $message)
    @if ($message->to == Auth::user()->id)
        <tr>
            <td class="mailbox-name"><a href="{{ route('chat.show', $message->from) }}"><img class="direct-chat-img"
                        src="{{ asset('storage/' . $message->getUser->image) }}" alt="image"></a>
            </td>
            <td class="mailbox-name"><a
                    href="{{ route('chat.show', $message->from) }}">{{ $message->getUser->name }}</a>
            </td>
            <td class="mailbox-subject">
                <a href="{{ route('chat.show', $message->from) }}">
                    {{ $message->message }}</a>
            </td>
            <td class="mailbox-attachment">Link</td>
            <td class="mailbox-date"><a
                    href="{{ route('chat.show', $message->from) }}">{{ $message->created_at->diffForHumans() }}
            </td>
        </tr>
    @endif
@endforeach --}}
