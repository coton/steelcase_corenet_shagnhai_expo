<?php 
   header('Content-Type: text/html; charset=utf-8');
   
   $language = $_REQUEST['lan'] == null ? "en" : $_REQUEST['lan'];
   $area = $_REQUEST['area'] == null ? "1" : $_REQUEST['area'];
?>﻿
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Steelcase</title>

    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=480, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <link rel="stylesheet" href="css/app.css?v=a69bacdcec1841aea678078d318b4709">

    <link rel="stylesheet" href="js/swiper/swiper.min.css?v=a69bacdcec1841aea678078d318b4709">
    <link rel="stylesheet" href="js/swiper/animate.min.css?v=a69bacdcec1841aea678078d318b4709">
</head>
<body>
<!-- loading -->
<div class="loader"><h1>LOADING</h1><span></span><span></span><span></span></div>

<div class="swiper-container">

    <div class="swiper-wrapper">

        <div class="swiper-slide p1">
            <img class="swiper-lazy" data-src="images/en/p1/bg.png" alt="">
            <img class="swiper-lazy btn-en" data-src="images/en/p1/en.png" alt="">
            <img class="swiper-lazy btn-zh" data-src="images/en/p1/zh.png" alt="">
        </div>
        <div class="swiper-slide p2">
            <img class="swiper-lazy" data-src="images/<?php echo($language); ?>/p2/area-<?php echo($area); ?>.png" alt="">
            <img class="swiper-lazy btn-checkme" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p3">
            <img class="swiper-lazy" data-src="images/<?php echo($language); ?>/p3/bg.png" alt="">
            
            <div class="p3-swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper-lazy" data-src="images/en/p3/product-1.png" alt="">   
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-lazy" data-src="images/en/p3/product-2.png" alt="">
                    </div>
                </div>
            </div>

            <img class="swiper-lazy btn-prev swiper-button-prev" data-src="images/en/p3/btn-prev.png" alt="">
            <img class="swiper-lazy btn-next swiper-button-next" data-src="images/en/p3/btn-next.png" alt="">
            <img class="swiper-lazy btn-back" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-goregistration" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p4">
            <img class="swiper-lazy" data-src="images/<?php echo($language); ?>/p4/bg.png" alt="">
            <form id="userform" action="adduser.php" method="post" target="id_iframe">
                <input type="text" id="name" name="name"><p class="name">*</p>
                <input type="text" id="company" name="company"><p class="company">*</p>
                <input type="number" id="phone" name="phone"><p class="phone">*</p>
                <input type="email" id="email" name="email"><p class="email">*</p>
                <input type="hidden" name="area" value="<?php echo($area); ?>">
                <input type="hidden" name="product" value="enea lottus stool">
                <input type="button" class="btn-ok" value="">
            </form>
            <iframe id="id_iframe" name="id_iframe" style=""></iframe>
        </div>
        <div class="swiper-slide p5">
            <img class="swiper-lazy" data-src="images/<?php echo($language); ?>/p5/bg.png" alt="">
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
        };

        // loader
        var getSource = function(){
            var res = []
            $('.p1>img').each(function(i, o){
                var val = $(o).attr("data-src");
                val && res.push(val);
            })
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
            mySwiper.unlockSwipes();
            mySwiper.slideNext();
        });

        $('.btn-zh').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideNext();
        });

        // p2
        $('.btn-checkme').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideNext();
        });

        // p3
        $('.btn-back').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slidePrev();
        });

        $('.btn-goregistration').on('touchend', function(){
            mySwiper.unlockSwipes();
            mySwiper.slideNext();
        });

        // p4
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
            var patt = new RegExp(/^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/);
            if(patt.test(this.value))
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



        // data
        var mySwiper1 = new Swiper('.p3-swiper-container',{
            lazyLoading : true,
            prevButton:'.swiper-button-prev',
            nextButton:'.swiper-button-next'
        });

    });
</script>
</body>
</html>