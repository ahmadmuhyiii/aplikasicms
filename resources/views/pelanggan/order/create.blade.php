@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- right column -->
            <div class="col-sm-12 col-md-11">

                <div class="row justify-content-center">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <h2>Pembayaran Produk </h2>
                            <h5 class="card-title">Payment Gateway :</h5><br />
                            <img style="width:400px;height:300px;" src="/img/midtrans.jpg" class="d-block w-100"
                                alt="...">
                            <div class="card-footer">
                                <a class="btn btn-dark" href="/pelanggan/transaksi"> Back </a>
                                <button id="paybutton" name="paybutton" class="btn btn-primary">Pay</button>
                            </div>
                        </div>
                    </div>
                </div>


                <form action="/pelanggan/order" id="submit_form" method="POST">
                    @method('post')
                    @csrf
                    <input type="hidden" name="json" id="json_callback">
                </form>

                <script type="text/javascript">
                    // For example trigger on button clicked, or any time you need
                    var payButton = document.getElementById('paybutton');
                    payButton.addEventListener('click', function() {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                        window.snap.pay('{{ $snapToken }}', {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                alert("payment success!");
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onPending: function(result) {
                                /* You may add your own implementation here */
                                alert("waiting your payment!");
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                alert("payment failed!");
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onClose: function() {
                                /* You may add your own implementation here */
                                alert('you closed the popup without finishing the payment');
                            }
                        })
                    });

                    function send_response_to_form(result) {
                        document.getElementById('json_callback').value = JSON.stringify(result);
                        $('#submit_form').submit();
                    }
                </script>


            </div>
        </div>
    </div>
@endsection



<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-QEkSK9GkZKenr6aL"></script>
<!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
