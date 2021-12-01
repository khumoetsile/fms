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
        <div class="card-header text-white p-0 position-relative" style="height: 550px;background-image: url('https://source.unsplash.com/random/1920x780')">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-12 align-items-center">
                    <h1>Cheena Mobile Directory</h1>
                    <!--
                    <form class="" method="POST" action="">
                    @csrf
                        <div class="form-group d-flex">
                            <div class="col-lg-6">
                            <input type="search" name="shipment_awb" id="shipment_awb" class="form-control" placeholder="job title,skill or company">
                        </div>
                        <div class="col-lg-3">
                             <select name="city_id" value="{{ old('city_id') }}" class="form-control" id="city_id" required>
                             <option value="">Select City</option>
                              @foreach ($cities as $city)
                               <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                               @endforeach
                               @if($errors->has('city'))
                               <strong class="text-danger">{{ $errors->first('city_id') }}</strong>
                                  @endif
                              </select>
                          </div>
                            <input type="submit" class="btn btn-primary text-white px-4" value="Search Now">
                        </div>
                    </form>
                -->
                </div>
                </div>
            </div>
        </div>
    <div class="site-section bg-light" id="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                    <div class="block-heading-1">
                        <span>Get In Touch</span>
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="100">
                    <form action="#" method="post">
                        <div class="form-group row">
                            <div class="col-md-6 mb-4 mb-lg-0">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Email address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea name="" id="" class="form-control" placeholder="Write your message." cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mr-auto">
                                <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Send Message">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="bg-white p-3 p-md-5">
                            <h3 class="text-black mb-4">Contact Info</h3>
                        <ul class="list-unstyled footer-link">
                            <li class="d-block mb-3">
                            <span class="d-block text-black">Address:</span>
                            <span>214, Ada</span></li>
                            <li class="d-block mb-3"><span class="d-block text-black">Phone:</span><span>+92 (331) 6874268</span></li>
                            <li class="d-block mb-3"><span class="d-block text-black">Email:</span><span><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3d54535b527d4452484f5952505c5453135e5250">[email&#160;protected]</a></span></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection