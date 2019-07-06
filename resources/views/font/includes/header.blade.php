<!doctype html>
<html class="no-js" lang="en-US">


<!-- Mirrored from d29u17ylf1ylz9.cloudfront.net/bigon/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Aug 2018 10:47:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Guiter World</title>
    <meta name="description" content="Default Description">
    <meta name="keywords" content="E-commerce" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('fontAsset/')}}/img/icon/dd.jpg">
    <!-- google font rubik -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,600" rel="stylesheet">
    <!-- mobile menu css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/meanmenu.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/animate.css">
    <!-- nivo slider css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/nivo-slider.css">
    <!-- owl carousel css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/owl.carousel.min.css">
    <!-- slick css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/slick.css">
    <!-- price slider css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/jquery-ui.min.css">
    <!-- fontawesome css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/font-awesome.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/bootstrap.min.css">
    <!-- default css  -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/default.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/style.css">
    <!-- home-2 css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/home-4.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('fontAsset/')}}/css/responsive.css">

   {{--payment link start--}}
  {{--payment link ends--}}
    <!-- modernizr js -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js" integrity="sha256-DI6NdAhhFRnO2k51mumYeDShet3I8AKCQf/tf7ARNhI=" crossorigin="anonymous"></script>
    {{--<script src="{{asset('fontAsset/')}}/js/vendor/modernizr-2.8.3.min.js"></script>--}}
<!-- Bootstrap CSS -->
    {{--<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/Bootstrap/dist/css/bootstrap-reboot.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/Bootstrap/dist/css/bootstrap.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/Bootstrap/dist/css/bootstrap-grid.css">--}}

    <!-- Main Styles CSS -->
    {{--<link rel="stylesheet" type="text/css" href="{{asset('forumAsset/')}}/css/fonts.min.css">--}}
<script>

    $(document).ready(function(){

        $('#dataTables-example').DataTable({
            responsive: true
        });


        $('#button').on('click', function (e) {
            $.ajax({
                type: 'GET',
                url: '{{url('/destroy-wishlist-product')}}',

                success: function (data) {
                    alert('ok');
                    location.reload();
                }
            });


        });




        $("#used").click(function(){
            $("#usedDetails").show();
        });
        $("#new").click(function(){
            $("#usedDetails").hide();
        });
        $("#usedDetails").hide();
// Insert form Artist
        $("#band").click(function(){
            $("#bandDetailstwo").show();
            $("#bandDetails").show();
        });
        $("#solo").click(function(){
            $("#bandDetailstwo").hide();
            $("#bandDetails").hide();
        });
        $("#bandDetailstwo").hide();
        $("#bandDetails").hide();

//        update form artist
        $("#bandUpdate").click(function(){
            $("#bandDetailsUpdatetwo").show();
            $("#bandDetailsUpdate").show();
        });
        $("#soloUpdate").click(function(){
            $("#bandDetailsUpdatetwo").hide();
            $("#bandDetailsUpdate").hide();
        });

    });
</script>

    @if(isset(Auth::user()->id))
        <script>

            $(function() {
                $.get("{{url('/like-count')}}",function (msg) {
                    $('.likes').html(msg);


                })
                $.get("{{url('/dislike-count')}}",function (msg) {
                    $('.dislikes').html(msg);
                })
            });
        </script>
    @endif
    <script>
        function AddtoCart(){
            var id=document.getElementById("productID").value;
            var qty=document.getElementById("qty").value;


            $.ajax({
                type: 'POST',
                url: '{{url('/add-product-cart')}}',
                data: {id:id,qty:qty,"_token":"{{csrf_token()}}"},

            }).done(function( msg ) {
                console.log(msg);
                $(".cart-counter-shopping").html(msg);

            });
        }


    </script>
    <script>
        function myFunctionasdf() {
            document.getElementById("myForm").reset();
        }
    </script>
    <script>
        function me() {
            var qty=document.getElementById("amount").value;
            alert(qty);
        }

    </script>
    <script>
        function AddtoCartfromCompare(id){
            var id=id;

            $.ajax({
                type: 'POST',
                url: '{{url('/add-product-cart')}}',
                data: {id:id,qty:1,"_token":"{{csrf_token()}}"},

            }).done(function( msg ) {

                $('.cart-counter-shopping').html(msg);
                $(".single-cart-box").load("{{url('/compare-view.single-cart-box' )}}");

            });
        }


    </script>

    <script>
        $('#FormReset').click(function(){
            $('#profileForm')[0].reset();
        });
    </script>

    <script>
        $(function () {

            $('#del').on('submit', function (e) {

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{url('/remove-from-compare')}}',
                    data: {delID:'',"_token":"{{csrf_token()}}"},


                }).done(function( msg ) {
                    console.log(msg)
                });

            });

        });


    </script>
    <script>
        function checkQty(productStock) {


            var RequestQty=$("#qty").val();
            if( RequestQty > productStock ){
                alert("the maximum stock of the product is " + productStock);
                $("#productQty").val(productStock);
            }
            $(".proQty").attr({
                "max": productStock,
                "min": 1
            });
        }
    </script>
    <script>
        function remove(id){

            $.ajax({
                type: 'POST',
                url: '{{url('/remove-product-cart')}}',
                data: {id:id,"_token":"{{csrf_token()}}"},

            }).done(function( msg ) {
                $('.cart-counter-shopping').html(msg);
                $("#cartosd").load("{{url('/cart-content #cartosd' )}}");
                $("#totalMoney").load("{{url('/cart-content #totalMoney' )}}");
                $("#totalMoney2").load("{{url('/cart-content #totalMoney2' )}}");
                $("#checkoutu").load("{{url('/cart-content #checkoutu' )}}");
                $(".single-cart-box").load("{{url('/cart-content .single-cart-box' )}}");
                $(".single-cart-box2").load("{{url('/cart-content .single-cart-box2' )}}");
                $(".amount").load("{{url('/cart-content .amount' )}}");
                $(".amount2").load("{{url('/cart-content .amount2' )}}");
                $(".amount3").load("{{url('/cart-content .amount3' )}}");
            });
        }
    </script>
    <script>
        function sameFormData() {

            var name=document.getElementById('pname').value;
            var add=document.getElementById('paddress1').value;
            var add2=document.getElementById('paddress2').value;
            var town=document.getElementById('ptown').value;
            var country=document.getElementById('pstate').value;
            var postcode=document.getElementById('ppostcode').value;
            var phone=document.getElementById('pphone').value;
            document.getElementById('sname').value=name;
            document.getElementById('saddress1').value=add;
            document.getElementById('saddress2').value=add2;
            document.getElementById('stown').value=town;
            document.getElementById('sstate').value=country;
            document.getElementById('spostcode').value=postcode;
            document.getElementById('sphone').value=phone;
        }

        function country() {
            var country=document.getElementById('pstate').value;
            document.getElementById('sstate').value=country;
        }
    </script>

    <script>
        function GetCommisionDealer() {

            var x = document.getElementById("withdraw");
            var y=(x.value*100/93-x.value);
            document.getElementById("commission").value = y;
        }
        function GetCommisionCustomer() {

            var x = document.getElementById("withdraw");
            var y=(x.value*100/90-x.value);
            document.getElementById("commission").value = y;
        }
        function GetCommisionBrand() {

            var x = document.getElementById("withdraw");
            var y=(x.value*100/95-x.value);
            document.getElementById("commission").value = y;
        }

        function GetMinimumValue() {

            var x = document.getElementById("brandProductQty").value;
            var y=x-1;
            document.getElementById("minSellNumber").max = y;
        }
    </script>
</head>

<body>