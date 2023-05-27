@extends('layouts.plg')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-11">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- view produk template --}}
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h3 class="d-inline-block d-sm-none">{{ $produk->nama_produk }}
                                    </h3>
                                    <div class="col-11">
                                        <img src="{{ asset('storage/' . $produk->image) }}" width="530px" height="400px"
                                            alt="Product Image">
                                    </div>
                                    <div class="col-12 product-image-thumbs">
                                        <div class="product-image-thumb active"><img
                                                src="{{ asset('storage/' . $produk->image) }}" alt="Product Image">
                                        </div>
                                        <div class="product-image-thumb"><img src="{{ asset('storage/' . $produk->image) }}"
                                                alt="Product Image">
                                        </div>
                                        <div class="product-image-thumb"><img src="{{ asset('storage/' . $produk->image) }}"
                                                alt="Product Image">
                                        </div>
                                        <div class="product-image-thumb"><img src="{{ asset('storage/' . $produk->image) }}"
                                                alt="Product Image">
                                        </div>
                                        <div class="product-image-thumb"><img src="{{ asset('storage/' . $produk->image) }}"
                                                alt="Product Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h2 class="my-2">{{ $produk->getToko->nama_toko }} &nbsp&nbsp&nbsp
                                        <a class="btn btn-warning"
                                            href="/pelanggan/viewtoko/show{{ $produk->getToko->id }}">Kunjungi Toko</a>
                                    </h2>
                                    <h3 class="my-3">{{ $produk->nama_produk }}</h3>
                                    <p>{{ $produk->deskripsi }}
                                    </p>

                                    <hr>
                                    <h5 class="mb-0">Kode Produk : {{ $produk->code }}</h5>
                                    <h5 class="mb-0 mt-0">Kondisi Produk :
                                        @if ($produk->kondisi == 'Baru')
                                            <span class="badge badge-primary">{{ $produk->kondisi }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $produk->kondisi }}</span>
                                        @endif
                                    </h5>
                                    <h5 class="mb-0 mt-0">Kategori : {{ $produk->kategori->nama_kategori }}</h5>
                                    <h5 class="mb-0 mt-0">Quantity : {{ $produk->qty }}</h5>
                                    <h5>Berat : {{ $produk->berat }}g</h5>
                                    {{-- <h4 class="mt-3">Size <small>Please select one</small></h4>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
<label class="btn btn-default text-center">
<input type="radio" name="color_option" id="color_option_b1"
autocomplete="off">
<span class="text-xl">S</span>
<br>
Small
</label>
<label class="btn btn-default text-center">
<input type="radio" name="color_option" id="color_option_b2"
autocomplete="off">
<span class="text-xl">M</span>
<br>
Medium
</label>
<label class="btn btn-default text-center">
<input type="radio" name="color_option" id="color_option_b3"
autocomplete="off">
<span class="text-xl">L</span>
<br>
Large
</label>
<label class="btn btn-default text-center">
<input type="radio" name="color_option" id="color_option_b4"
autocomplete="off">
<span class="text-xl">XL</span>
<br>
Xtra-Large
</label>
</div> --}}

                                    <div class="bg-gray py-2 px-3 mt-4">
                                        <h2 class="mb-0">
                                            Rp.{{ number_format($produk->harga) }}
                                        </h2>

                                    </div>

                                    {{-- Modal Keranjang --}}
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mt-4 mb-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">Beli Langsung
                                    </button>
                                    <button type="button" class="btn btn-primary mt-4 mb-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Add To Cart
                                    </button>

                                    <div class="mt-0">
                                        {{-- Salin Text --}}
                                        <!-- The text field -->
                                        <small> Salin Link Produk</small> <br />
                                        <input type="text"
                                            value="http://127.0.0.1:8000/pelanggan/pelproduk/{{ $produk->id }}?{{ $produk->nama_produk }}"
                                            id="copyText" readonly>
                                        <!-- The <a
                                                                                                                                                                                                            href="http://127.0.0.1:8000/pelanggan/pelproduk/">Link
                                                                                                                                                                                                            Produk</a>
                                                                                                                                                                                                                                                button used to copy the text -->
                                        <button type="button" class="btn btn-primary mt-2 mb-2" id="copyBtn">Copy
                                            text</button>
                                        <!--using sweetalert via CDN -->
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                        <script>
                                            const copyBtn = document.getElementById('copyBtn')
                                            const copyText = document.getElementById('copyText')
                                            copyBtn.onclick = () => {
                                                copyText.select(); // Selects the text inside the input
                                                document.execCommand('copy'); // Simply copies the selected text to clipboard
                                                Swal.fire({ //displays a pop up with sweetalert
                                                    icon: 'success',
                                                    title: 'Text copied to clipboard',
                                                    showConfirmButton: false,
                                                    timer: 1000
                                                });
                                            }
                                        </script>
                                        {{-- Salin Text --}}

                                        <a class="btn btn-warning"
                                            href="{{ route('chat.show', $produk->getToko->user->id) }}">Chat
                                            Toko</a>
                                    </div>

                                    <!-- Modal [$produk->getToko->user->id, $produk->id]-->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Input Ke Keranjang?
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="post" action="/pelanggan/keranjang"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Produk
                                                                Image</label>
                                                            <input type="hidden" name="oldImage"
                                                                value="{{ $produk->image }}">
                                                            @if ($produk->image)
                                                                <img src="{{ asset('storage/' . $produk->image) }}"
                                                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                            @else
                                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                            @endif
                                                            <input class="form-control @error('image') is-invalid @enderror"
                                                                type="hidden" id="image" name="image"
                                                                onchange="previewImage()">
                                                            @error('image')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="user_id" class="form-label"></label>
                                                            <input type="hidden"
                                                                class="form-control @error('user_id') is-invalid @enderror"
                                                                id="user_id" name="user_id" required autofocus
                                                                value="user_id">
                                                            @error('user_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="produk_id" class="form-label">ID
                                                                Produk</label>
                                                            <input type="text"
                                                                class="form-control @error('produk_id') is-invalid @enderror"
                                                                id="produk_id" name="produk_id" required autofocus
                                                                value="{{ $produk->id }}" readonly>
                                                            @error('produk_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="qty" class="form-label">Quantity</label>
                                                            <input type="number"
                                                                class="form-control @error('qty') is-invalid @enderror"
                                                                id="qty" name="qty" required value="1">
                                                            @error('qty')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="subtotal" class="form-label">Harga
                                                                satuan</label>
                                                            <input type="text"
                                                                class="form-control @error('subtotal') is-invalid @enderror"
                                                                id="subtotal" name="harga" required readonly
                                                                value="{{ $produk->harga }}">
                                                            @error('qty')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">To
                                                                Cart</button>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Keranjang --}}
                                    <!-- Modal KE 2 -->
                                    <div class="modal fade" id="exampleModal2" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Beli Langsung?
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="/pelanggan/transaksi/belilangsung"
                                                        enctype="multipart/form-data">
                                                        @method('POST')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Produk
                                                                Image</label>
                                                            <input type="hidden" name="oldImage"
                                                                value="{{ $produk->image }}">
                                                            @if ($produk->image)
                                                                <img src="{{ asset('storage/' . $produk->image) }}"
                                                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                            @else
                                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                            @endif
                                                            <input
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                type="hidden" id="image" name="image"
                                                                onchange="previewImage()">
                                                            @error('image')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="user_id" class="form-label"></label>
                                                            <input type="hidden"
                                                                class="form-control @error('user_id') is-invalid @enderror"
                                                                id="user_id" name="user_id" required autofocus
                                                                value="user_id">
                                                            @error('user_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="produk_id" class="form-label">ID
                                                                Produk</label>
                                                            <input type="text"
                                                                class="form-control @error('produk_id') is-invalid @enderror"
                                                                id="produk_id" name="produk_id" required autofocus
                                                                value="{{ $produk->id }}" readonly>
                                                            @error('produk_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="qty" class="form-label">Quantity</label>
                                                            <input type="number"
                                                                class="form-control @error('qty') is-invalid @enderror"
                                                                id="qty" name="qty" required value="1">
                                                            @error('qty')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="subtotal" class="form-label">Harga
                                                                satuan</label>
                                                            <input type="text"
                                                                class="form-control @error('subtotal') is-invalid @enderror"
                                                                id="subtotal" name="harga" required readonly
                                                                value="{{ $produk->harga }}">
                                                            @error('qty')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Beli
                                                                Langsung</button>
                                                        </div>
                                                    </form>

                                                    {{-- <script>
                                                            $('.btn btn-primary').on('click', function(event) {
                                                                event.preventDefault();
                                                                var url = $(this).data('target');
                                                                location.replace(url);
                                                            });
                                                        </script> --}}

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal BELI LANGSUNG --}}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <nav class="w-100">
                                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                            href="#product-desc" role="tab" aria-controls="product-desc"
                                            aria-selected="true">Description</a>
                                        {{-- <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
href="#product-comments" role="tab" aria-controls="product-comments"
aria-selected="false">Comments</a>
<a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
href="#product-rating" role="tab" aria-controls="product-rating"
aria-selected="false">Rating</a> --}}
                                    </div>
                                </nav>
                                <div class="tab-content p-3" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                                        aria-labelledby="product-desc-tab"> {{ $produk->deskripsi }} </div>
                                    {{-- <div class="tab-pane fade" id="product-comments" role="tabpanel"
aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis
luctus. Sed
condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et
finibus sem, ut
commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis
odio. Nulla
turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex
pulvinar
mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec
aliquam cursus,
ex
elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem,
dignissim
a
sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum
hendrerit
vel
id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
<div class="tab-pane fade" id="product-rating" role="tabpanel"
aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non,
posuere
elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum
risus
efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut
molestie,
purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh
neque et
erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam
efficitur
lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus
odio,
malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at
accumsan
urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
lectus, at
mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo
ullamcorper. Donec
varius massa at semper posuere. Integer finibus orci vitae vehicula placerat.
</div>
</div> --}}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        {{-- view produk template --}}



                    </div>
                </div>
            </div>

            <script>
                function previewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = 'block';

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                    const blob = URL.createObjectURL(image.files[0]);
                    imgPreview.src = blob;
                }
            </script>
        @endsection
