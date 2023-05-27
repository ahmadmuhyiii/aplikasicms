@extends('layouts.adm')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- /.col -->
            <div class="col-sm-8 col-md-7 ">
                <div class="card card-dark card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">

                                <div class="input-group-append">


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
                                        <tr class='clickable-row' data-href="{{ route('admchat.show', $value->to) }}">
                                            <td class="mailbox-name"><a href="{{ route('admchat.show', $value->to) }}">
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
                                            <td class="mailbox-name"><a href="{{ route('admchat.show', $value->to) }}">Pesan
                                                    Dari : {{ $tampilchatTo->name }}</a>
                                            </td>
                                            <td class="mailbox-subject"><a href="{{ route('admchat.show', $value->to) }}">
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
