<?php
    header("Access-Control-Allow-Origin:*");
    header('Access-Control-Allow-Credentials:true');


    require_once "weChat/weChatId.php";
    require_once "config.php";
    require_once "weChat/weChat.php";
    
    $set = $_REQUEST['set'] == null ? "1" : $_REQUEST['set'];
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

    <!-- baidu tongji -->
    <script>
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "//hm.baidu.com/hm.js?5bc5881ed3bdba8e4d8b0d5f8df3bc4b";
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
            <img class="swiper-lazy" src="images/en/p2/area-<?php echo($set); ?>.png" alt="">
            <img class="swiper-lazy btn-checkme" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p3">
            <img class="swiper-lazy" src="images/en/p3/bg.png" alt="">
            
            <div class="p3-swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="swiper-lazy" src="images/en/p3/area<?php echo($set); ?>/product-1.png" alt="">   
                    </div>
                    <div class="swiper-slide">
                        <img class="swiper-lazy" src="images/en/p3/area<?php echo($set); ?>/product-2.png" alt="">
                    </div>
                </div>
            </div>

            <img class="swiper-lazy btn-prev swiper-button-prev" data-src="images/en/p3/btn-prev.png" alt="">
            <img class="swiper-lazy btn-next swiper-button-next" data-src="images/en/p3/btn-next.png" alt="">
            <img class="swiper-lazy btn-back" data-src="images/transparent.png" alt="">
            <img class="swiper-lazy btn-goregistration" data-src="images/transparent.png" alt="">
        </div>
        <div class="swiper-slide p4">
            <img class="swiper-lazy" src="images/en/p4/bg.png" alt="">
            <form id="userform" action="adduser.php" method="post" target="id_iframe">
                <input type="text" id="name" name="name"><p class="name">*</p>
                <input type="text" id="company" name="company"><p class="company">*</p>
                <input type="number" id="phone" name="phone"><p class="phone">*</p>
                <input type="email" id="email" name="email"><p class="email">*</p>
                <input type="hidden" name="area" value="<?php echo($set); ?>">
                <input type="hidden" name="product" id="product" value="after set value">
                <input type="button" class="btn-ok" value="">
            </form>
            <iframe id="id_iframe" name="id_iframe" style=""></iframe>
        </div>
        <div class="swiper-slide p5">
            <img class="swiper-lazy" src="images/en/p5/bg.png" alt="">
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

            // lock my Swiper
            mySwiper.lockSwipes();

            load_productlist_swiper(<?php echo($set); ?>);
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

        // loader
        var getSource = function(){
            var res = []
            $('.p1>img').each(function(i, o){
                var val = $(o).attr("data-src");
                val && res.push(val);
            });

            // loader big file
            res.push("images/en/p2/area-<?php echo($set); ?>.png");
            res.push("images/en/p3/bg.png");
            res.push("images/en/p4/bg.png");
            res.push("images/en/p5/bg.png");

            res.push("images/zh/p2/area-<?php echo($set); ?>.png");
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
            mySwiper.slideNext();

        });

        $('.btn-zh').on('touchend', function(){
            convert_language(/images\/en\//g, "images/zh/");

            mySwiper.unlockSwipes();
            mySwiper.slideNext();
        });

        var convert_language = function(source, target){
            $("img").each(function(i, o){
                var src = $(o).attr("src");
                src = src.replace(source, target);
                $(o).attr("src", src);
            });
        };

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

            // set active product
            var product = $(".p3-swiper-container .swiper-slide-active>img").attr("alt");
            $("#product").val(product);
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


    });
</script>

<!--WeChat
====================================================== -->
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script language="javascript">

    /*
     * 注意：
     * 1. 所有的JS接口只能在公众号绑定的域名下调用，公众号开发者需要先登录微信公众平台进入“公众号设置”的“功能设置”里填写“JS接口安全域名”。
     * 2. 如果发现在 Android 不能分享自定义内容，请到官网下载最新的包覆盖安装，Android 自定义分享接口需升级至 6.0.2.58 版本及以上。
     * 3. 常见问题及完整 JS-SDK 文档地址：http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
     *
     * 开发中遇到问题详见文档“附录5-常见错误及解决办法”解决，如仍未能解决可通过以下渠道反馈：
     * 邮箱地址：weixin-open@qq.com
     * 邮件主题：【微信JS-SDK反馈】具体问题
     * 邮件内容说明：用简明的语言描述问题所在，并交代清楚遇到该问题的场景，可附上截屏图片，微信团队会尽快处理你的反馈。
     */
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"]; ?>',
        timestamp: <?php echo $signPackage["timestamp"]; ?>,
        nonceStr: '<?php echo $signPackage["nonceStr"]; ?>',
        signature: '<?php echo $signPackage["signature"]; ?>',
        jsApiList: [
            'onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareWeibo'
        ]
    });
    wx.ready(function () {
        // 在这里调用 API
        wx.onMenuShareTimeline({
            title: '<?php echo $gWECHATSHAREDESCFORMOMENTS;?>', // 分享标题
            link: window.location.href, // 分享链接
            imgUrl: '<?php echo $gWECHATSHAREIMGURL;?>', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                
                page.postDataShare('share to Timeline');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                // $('.close-bt').click();
            }
        });
        wx.onMenuShareAppMessage({
            title: '<?php echo $gWECHATSHARETITLE;?>', // 分享标题
            desc: '<?php echo $gWECHATSHAREDESC;?>', // 分享描述
            link: window.location.href, // 分享链接
            imgUrl: '<?php echo $gWECHATSHAREIMGURL;?>', // 分享图标
            type: '', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
               
                page.postDataShare('share to friend');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数

            }
        });
        wx.onMenuShareQQ({
            title: '<?php echo $gWECHATSHARETITLE;?>', // 分享标题
            desc: '<?php echo $gWECHATSHAREDESC;?>', // 分享描述
            link: window.location.href, // 分享链接
            imgUrl: '<?php echo $gWECHATSHAREIMGURL;?>', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                
                page.postDataShare('share to qq');
                //page.postData('share to qq');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        wx.onMenuShareWeibo({
            title: '<?php echo $gWECHATSHARETITLE;?>', // 分享标题
            desc: '<?php echo $gWECHATSHAREDESC;?>', // 分享描述
            link: window.location.href, // 分享链接
            imgUrl: '<?php echo $gWECHATSHAREIMGURL;?>', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                
                page.postDataShare('share to weibo');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
            }
        });
        
    });
</script>
</body>
</html>