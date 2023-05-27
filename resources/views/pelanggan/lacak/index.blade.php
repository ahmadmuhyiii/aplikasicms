@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">
                <div class="card card-dark card-outline">
                    <div class="card-header"> Lacak Paket</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                        <label for=""> Lacak Paket Jne</label> <br />
                        <iframe src="https://www.jne.co.id/id/tracking/trace" width="600" height="300"
                            frameborder="0"></iframe>
                        <br /><br /><br />

                        <label for=""> Lacak Paket Pos Indonesia</label><br />
                        <iframe src="https://www.posindonesia.co.id/id/tracking" width="600" height="300"
                            frameborder="0"></iframe>
                        <br /><br /><br />

                        <label for=""> Lacak Paket Tiki</label><br />
                        <iframe src="https://www.tiki.id/id/tracking" width="600" height="300"
                            frameborder="0"></iframe>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
