<?php
    header('Content-Type: text/html; charset=utf-8');
    header("Access-Control-Allow-Origin:*");
    header('Access-Control-Allow-Credentials:true');

    $set = $_REQUEST['set'] == null ? "1" : $_REQUEST['set'];
?>﻿
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Steelcase CoreNet Shanghai Expo 2015</title>

    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=480, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="stylesheet" href="css/app.css?v=a69bacdcec1841aea678078d318b4709">

    <link rel="stylesheet" href="js/swiper/swiper.min.css?v=a69bacdcec1841aea678078d318b4709">
    <link rel="stylesheet" href="js/swiper/animate.min.css?v=a69bacdcec1841aea678078d318b4709">

    <!-- baidu tongji -->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?18f2f48fc1cbf1f036214828d65d9759";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>

</head>
<body>
<!-- loading -->
<div class="loader"><h1>LOADING ...</h1><span></span><span></span><span></span></div>

<div class="swiper-container">

    <div class="swiper-wrapper">

        <div class="swiper-slide p1">
            <img class="swiper-lazy" src="images/p1/bg.png" alt="">
            <img class="swiper-lazy btn-en" data-src="images/p1/en.png" alt="">
            <img class="swiper-lazy btn-zh" data-src="images/p1/zh.png" alt="">
        </div>
        <div class="swiper-slide p2">
            <div class="area<?php echo($set); ?>">
                <img src="images/en/p2/area<?php echo($set); ?>/bg.png" alt="">
            </div>
        </div>
        <div class="swiper-slide p3">
            <img class="swiper-lazy" src="images/en/p3/bg.png" alt="">
            
            <div class="p3-swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper-lazy" src="images/en/p3/area<?php echo($set); ?>/product-1.png" alt="">   
                    </div>
                </div>
            </div>

            <img class=" btn-prev swiper-button-prev" src="images/en/p3/btn-prev.png" alt="">
            <img class=" btn-next swiper-button-next" src="images/en/p3/btn-next.png" alt="">
            <img class="swiper-lazy btn-back" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-goregistration" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p3-1">
            <img class="swiper-lazy" src="images/en/p3-1/bg.png" alt="">
            <img class="swiper-lazy btn-back" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-gosteelcase" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-flowwechat" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-goregister" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p4">
            <img class="swiper-lazy" src="images/en/p4/bg.png" alt="">
            <img class="swiper-lazy btn-back" data-src="images/transparent.png" alt="">
            <form id="userform" action="adduser.php" method="post" target="id_iframe">
                <input type="text" id="name" name="name"><p class="name">*</p>
                <input type="text" id="company" name="company"><p class="company">*</p>
                <input type="text" id="phone" name="phone"><p class="phone">*</p>
                <input type="email" id="email" name="email"><p class="email">*</p>
                <input type="hidden" name="area" value="<?php echo($set); ?>">
                <input type="hidden" name="product" id="product" value="after set value">
                <input type="button" class="btn-ok" value="">
            </form>
            <iframe id="id_iframe" name="id_iframe"></iframe>
        </div>
        <div class="swiper-slide p5">
            <img class="swiper-lazy" src="images/en/p5/bg.png" alt="">
            <img class="swiper-lazy qr" data-src="images/en/p5/qr.png" alt="">
            <img class="swiper-lazy btn-products" data-src="images/transparent.png" alt="">
        </div>

    </div>

</div>


<!--Script
====================================================== -->
<script src="js/zepto/zepto.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="js/motion/loader.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="js/swiper/swiper.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="js/swiper/swiper.animate1.0.2.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="js/motion/landscape.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="js/motion/overlay.min.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="tracking/tracking.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script src="data.js?v=a69bacdcec1841aea678078d318b4709"></script>
<script type="text/javascript">
    Zepto(function($){

        // Page
        var mySwiper;
        var swiper_init = function(){
            $(".swiper-container").css("display", "block");

            mySwiper = new Swiper ('.swiper-container', {
                speed:500,
                lazyLoading : true,
                lazyLoadingInPrevNext : true,
                onInit: function(swiper){ //Swiper2.x的初始化是onFirstInit
                    swiperAnimateCache(swiper); //隐藏动画元素 
                    swiperAnimate(swiper); //初始化完成开始动画
                    
                }, 
                onSlideChangeEnd: function(swiper){
                    swiperAnimate(swiper); //每个slide切换结束时也运行当前slide动画
                    mySwiper.lockSwipes();
                } 
            });

            // lock my Swiper
            mySwiper.lockSwipes();

            load_productlist_swiper(<?php echo($set); ?>);
            load_p2_html(<?php echo($set); ?>);
            load_p2_click(<?php echo($set); ?>);
        };

        // sub page
        var mySwiper1;
        var load_productlist_swiper = function(set){
            var productlist_data = APP_DATA[set-1];
            var html = "";
            var item_html_format = '<div class="swiper-slide">'
                                + '<img src="images/en/p3/area<?php echo($set); ?>/product-{0}.png" alt="{1}">'
                                + '</div>';

            for(var i = 0; i< productlist_data.product.length; i++)
            {
                html += item_html_format.replace(/\{0\}/, i+1)
                                        .replace(/\{1\}/, productlist_data.product[i]);
            }
            $(".p3-swiper-container>.swiper-wrapper").html(html);

            // swiper init
            mySwiper1 = new Swiper('.p3-swiper-container',{
                lazyLoading : true,
                prevButton:'.swiper-button-prev',
                nextButton:'.swiper-button-next'
            });
        };

        // load p2
        var load_p2_html = function(set){
            var productlist_data = APP_DATA[set-1];
            var html = "";
            var item_html_format = '<img class="checkme-{0}"'
                                + ' src="images/en/p2/area<?php echo($set); ?>/checkme-{0}.png" alt="{1}">';

            for(var i = 0; i< productlist_data.checkme.length; i++)
            {
                html += item_html_format.replace(/\{0\}/g, i+1)
                                        .replace(/\{1\}/g, productlist_data.checkme[i]-1);
            }
            $(".p2>.area<?php echo($set); ?>").append(html);

        };

        var load_p2_click = function(set){
            $(".area" + set+">img").each(function(i, o){
                $(o).on('touchend', function(){
                    mySwiper1.slideTo(parseInt($(this).attr("alt")));

                    mySwiper.unlockSwipes();
                    mySwiper.slideNext();
                });
            });
        };

        // loader
        var getSource = function(){
            var res = []
            $('.p1>img').each(function(i, o){
                var val = $(o).attr("data-src");
                val && res.push(val);
            });

            // loader big file
            res.push("images/en/p3/bg.png");
            res.push("images/en/p4/bg.png");
            res.push("images/en/p5/bg.png");

            res.push("images/zh/p3/bg.png");
            res.push("images/zh/p4/bg.png");
            res.push("images/zh/p5/bg.png");

            return res;
        }
        new mo.Loader(getSource(),{
            loadType : 1,
            minTime : 300,
            onLoading : function(count,total){
                //console.log('onloading:single loaded:',arguments)
                $(".loader h1").html('LOADING ('+Math.round(count/total*100)+'%)');
            },
            onComplete : function(time){
                // console.log('oncomplete:all source loaded:',arguments);
                $(".loader").hide();
                
                swiper_init();
            }
        });


        // Landscape
        var Landscape = new mo.Landscape({
            pic: 'js/motion/landscape.png',
            picZoom: 3,
            mode:'portrait',//portrait,landscape
            prefix:'Shine'
        });

        // p1
        $('.btn-en').on('touchend', function(){
            convert_language(/images\/zh\//g, "images/en/");

            mySwiper.unlockSwipes();
            

            if("<?php echo($set); ?>" == "9")
                mySwiper.slideTo(2);
            else
                mySwiper.slideNext();
        });

        $('.btn-zh').on('touchend', function(){
            convert_language(/images\/en\//g, "images/zh/");

            mySwiper.unlockSwipes();
            if("<?php echo($set); ?>" == "9")
                mySwiper.slideTo(2);
            else
                mySwiper.slideNext();
        });

        var convert_language = function(source, target){
            $("img").each(function(i, o){
                var src = $(o).attr("src");
                src = src.replace(source, target);
                $(o).attr("src", src);
            });
        };

        // p3
        $('.p3 .btn-back').on('touchend', function(){
            mySwiper.unlockSwipes();
            
            if("<?php echo($set); ?>" == "9")
                mySwiper.slideTo(0);
            else
                mySwiper.slidePrev();
        });

        $('.btn-goregistration').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideNext();


            // set active product
            var product = $(".p3-swiper-container .swiper-slide-active>img").attr("alt");
            $("#product").val(product);
        });

        // p3-1
        $('.p3-1 .btn-back').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slidePrev();
        });

        $('.btn-gosteelcase').on('touchend', function(){
            //if($($(".p3-1 img")[0]).attr("src").indexOf("en") > -1)
            var product_name = $("#product").val();

            $.each(APP_PRODUCT_LINK, function(i, o){
                if(o.name == product_name)
                    window.location.href = o.enlink;
            });
        });

        $('.btn-flowwechat').on('touchend', function(){
            window.overlay1 = new mo.Overlay('<img class="flowwechat" src="images/en/p3-1/qr.png" >');
            overlay1.on('open', function(){
                tracking.add("flowsteelcase");

                $('.flowwechat').on('touchend', function(){
                    window.overlay1.close();
                });
            })
        });

        $('.btn-goregister').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideNext();

            // default form foucs
            $("#name").trigger('focus');
        });


        // p4
        $('.p4 .btn-back').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slidePrev();
        });

        $('.btn-ok').on('touchend', function(){


            if($(".name").css("display") == "none"
                 && $(".company").css("display") == "none"
                 && $(".phone").css("display") == "none"
                 && $(".email").css("display") == "none"
                 )
            {
                $("#userform").submit();

                mySwiper.unlockSwipes();
                mySwiper.slideNext();
            }
            
        });

        $("#name").on("change", function(){
            if(this.value)
                $(".name").css("display", "none");
            else
                $(".name").css("display", "block");
        });

        $("#company").on("change", function(){
            if(this.value)
                $(".company").css("display", "none");
            else
                $(".company").css("display", "block");
        });

        $("#phone").on("change", function(){
            //var patt = new RegExp(/^[0-9]*$/);
            if(this.value)
                $(".phone").css("display", "none");
            else
                $(".phone").css("display", "block");
        });

        $("#email").on("change", function(){
            var patt = new RegExp(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/);
            if(patt.test(this.value))
                $(".email").css("display", "none");
            else
                $(".email").css("display", "block");
        });


        // p5
        $('.btn-products').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideTo(2);
        });



    });
</script>

<?php include_once 'weChat/weChatShareJS.php'; ?>
</body>
</html>