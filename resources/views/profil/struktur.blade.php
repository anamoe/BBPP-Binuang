@extends('layouts-user.main')

@section('content')


{{-- === Info Section === --}}
<section id="info" class="py-5 bg-light">
    <div class="container">
        <div class="section-title text-center mb-2" data-aos="fade-up">
            <h2>Struktur Organisasi</h2>
        </div>

        <div class="row align-items-start g-4">
            <div class="col-lg-12" data-aos="fade-right">
                <div class="p-3 bg-white rounded-3 shadow-sm">
                    <img src="{{ asset('public/image/struktur.jpeg') }}"
                        class="img-fluid rounded-3"
                        alt="BBPP Ketindan">
                </div>
            </div>

     
            </div>
        </div>
    </div>
</section>




<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0"
    nonce="FBSDK"></script>
@endsection