@extends('layouts.layout_front')

@section('content')
<div id="overlayer"></div>

<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<div class="site-wrap" id="home-section">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    
    <div class="ftco-blocks-cover-1">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="{{ asset('uploads/'.$slider->image) }}" style="width:100%; height: 50%;">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <!--
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                    <div class="block-heading-1">
                        <span>Get In Touch</span>
                        <h2>Suggest Us Any Change</h2>
                      	<span>We Will Appreciate It.</span>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-4">
                        @if(session('gmsg'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('gmsg') }}
                        </div>
                        @elseif(session('bmsg'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('bmsg') }}
                        </div>
                        @elseif(session('dmsg'))
                        <div class="alert alert-warning alert-dismissible fade show">
                            {{ session('dmsg') }}
                        </div>
                        @elseif(session('imsg'))
                        <div class="alert alert-info alert-dismissible fade show">
                            {{ session('imsg') }}
                        </div>
                        @endif
                    </div>
            </div>
        
            <div class="row">
                
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-3 p-md-5">
                            <h3 class="text-black mb-4">Contact Info</h3>
                        @php
                        $sno = 0;
                        @endphp
                        @foreach($informations as $information)
                        @php
                        $sno++;
                        @endphp
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                            <span class="d-block text-black">{{$information->about_label}}</span>
                            <span>{{$information->about_value}}</span></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
        </div>
        -->
    </div>
</div>
@endsection