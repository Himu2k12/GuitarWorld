<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="main-news-desc">
                    <div class="news-desc">
                        <h3>Sign Up For <span>Newsletters</span></h3>
                        <p>Get e-mail updates about our latest shop and special offers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="newsletter-box">
                    <form action="#">
                        <input class="subscribe" placeholder="Enter your email address" name="email" id="subscribe" type="text">
                        <button type="submit" class="submit">subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="black-o-bg">
    <!-- Footer Top Start -->
    <div class="footer-top ptb-75">
        <div class="container">
            <div class="row">
                <!-- Single Footer Start -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-footer">
                        <h3>Contacts us</h3>
                        <div class="footer-content">
                             <span>Payment methods:</span>
                            <p><a href="#"><img class="img" src="{{asset('fontAsset/')}}/img/footer/1.png" alt="payment-image"></a></p>
                        </div>
                    </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-md-2 col-sm-4 col-xs-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">Information</h3>
                         </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-md-2 col-sm-4 col-xs-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">My Account</h3>
                      </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-md-2 col-sm-4 col-xs-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">customer service</h3>
                        </div>
                </div>
                <!-- Single Footer Start -->
                <!-- Single Footer Start -->
                <div class="col-md-2 col-sm-4 col-xs-6 footer-full">
                    <div class="single-footer">
                        <h3 class="footer-title">Let Us Help You</h3>
                        </div>
                </div>
                <!-- Single Footer Start -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Top End -->
    <!-- Footer Bottom Start -->
    <div class="footer-bottom ptb-40">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="pull-left pt-10">Copyright © <a  href="#">Guitar World</a> All Rights Reserved.</p>
                <div class="footer-social-content pull-right">
                    <ul class="social-content-list">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Footer Bottom End -->
</footer>
<script>

    $('.like').click(function(){
        var id=document.getElementById("PostId").value;

        $.ajax({
            method: "POST",
            url: "{{url('/like-dislike')}}",
            data: { post_id:id,user_id:"<?php if(isset(Auth::user()->id)){echo Auth::user()->id;} ?>", like: 1, "_token":"{{csrf_token()}}" }
        }).done(function( msg ) {
            console.log(msg);

            $.get("{{url('/like-count')}}",function (msg) {
                $('#like').prop('disabled',true);
                $('#dislike').prop('disabled',false);
                $('#dislike').css({"background-color":"#39B403","color":"#FFFFFF"});
                $('#like').css({"background-color":"#C70000","color":"#FFFFFF","border-radius":"10px"});
                $('.likes').html(msg);
            })
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            })
        });
    });
    $('.dislike').click(function(){
        var id=document.getElementById("PostId").value;

        $.ajax({
            method: "POST",
            url: "{{url('/like-dislike')}}",
            data: { post_id:id,user_id:"<?php if(isset(Auth::user()->id)){echo Auth::user()->id;} ?>", dislike: 1, "_token":"{{csrf_token()}}" }
        }).done(function() {
            $.get("{{url('/like-count')}}",function (msg) {
                $('#like').prop('disabled',false);
                $('#dislike').prop('disabled',true);
                $('#dislike').css({"background-color":"#C70000","color":"#FFFFFF"});
                $('#like').css({"background-color":"#39B403","color":"#FFFFFF","border-radius":"10px"});

                $('.likes').html(msg);
            })
            $.get("{{url('/dislike-count')}}",function (msg) {
                $('.dislikes').html(msg);
            })

        });
    });
</script>

<script>

    function search() {
        var car= $( "#searchP" ).val();

        var resul="";
        $.ajax({
            method:"post",
            url:"{{url('/search')}}",
            data:{car:car, "_token":"{{csrf_token()}}"},
            dataType:'json',
            success: function(result) {
                if (result!=""){
                    result.forEach(function(element) {
                        // $("#result").val(element['product_name']);
                        resul +='<a href="http://localhost/guiterWorld5/public/product-details/'+element.id+'" ><li class="list-group-item link-class"><img src="'+element.product_image+'" height="40" width="40" class="img-thumbnail" /> '+element.product_name+'</li></a>';

                        console.log(element['product_name']);
                    });
                    $('#result').html(resul);
                }else {
                    $('#result').html(resul);
                }

            }


        });
    }

</script>
