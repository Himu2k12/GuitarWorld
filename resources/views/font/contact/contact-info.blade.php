@extends('font.master')

@section('content')

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area ptb-50">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active"><a href="{{url('/contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- Google Map Start -->
    <div class="container">
        <div id="map" style="height:400px"></div>
    </div>
    <!-- Google Map End -->
    <!-- Contact Email Area Start -->
    <div class="contact-email-area ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="mb-5">Contact Us</h3>
                    <p class="text-capitalize mb-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <div class="row">
                        <form id="contact-form" class="contact-form" action="https://d29u17ylf1ylz9.cloudfront.net/bigon/mail.php" method="post">
                            <div class="address-wrapper">
                                <div class="col-md-12">
                                    <div class="address-fname">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-email">
                                        <input type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-web">
                                        <input type="text" name="website" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="address-subject">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="address-textarea">
                                        <textarea name="message" placeholder="Write your message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="form-message ml-15"></p>
                            <div class="col-xs-12 footer-content mail-content">
                                <div class="send-email pull-right">
                                    <input type="submit" value="Submit" class="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Email Area End -->

@endsection