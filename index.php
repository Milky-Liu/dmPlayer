<!DOCTYPE html>
<html>
<head>
  <title>nmplayer</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1" /> 
  <meta http-equiv="Cache-Control" content="no-transform" /> 
  <meta http-equiv="Cache-Control" content="no-siteapp" /> 
  <meta name="referrer" content="never">
  <?php
    if (empty($_GET['url'])){
        echo 
<<<EOF
     <style type="text/css">  
     *{box-sizing:border-box;font-size:14px;}  
     :focus{outline:none}  
     button{border:0;background:skyblue;color:#fff;}
     .main{width:90%;max-width:500px;height:100px;padding:30px;box-shadow:0 10px 60px 0 rgba(29,29,31,0.09);position:absolute;left:0;top:0;bottom:100px;right:0;margin:auto;}  
     .main input{float:left;padding:2px 10px;width:77%;height:37px;border:1px solid #eee;border-right-color:transparent;ine-height:37px}  
     .main button{position:relative;width:23%;height:37px;}  
     </style>  
 </head>  <body>  
     <div class="main">  
        <input type="text" id="url" placeholder="请输入视频地址"><button onclick="location.href =(location.href + '?url=' + encodeURIComponent(url.value))">跳转</button>  
     </div>  </body>  </html>
EOF;
    die;
    };?>
  <link rel="apple-touch-icon" sizes="180x180" href="https://cdn.jsdelivr.net/gh/IMGRU/IMG/2020/05/24/5eca62efd083f.png" />
    <link rel="shortcut icon" href="https://cdn.jsdelivr.net/gh/IMGRU/IMG/2020/05/24/5eca62efd083f.png" type="image/x-icon">
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/dplayer.css?1.0.1">
    <script src="js/dplayer.js?1.0.2"></script>
    <script src="js/setting.js?1.0.1"></script>
    <?php
    if (strpos($_GET['url'], 'm3u8')) {
        echo '<script src="//cdn.bootcdn.net/ajax/libs/hls.js/0.13.2/hls.min.js"></script>';
    } elseif (strpos($_GET['url'], 'flv')) {
        echo '<script src="https://xukunx.cn/cx/bangumi/flv.min.js"></script>';
    }
    ?>
    
    <script src="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/layer.js"></script>
    <style>
        /*移除焦点蓝色背景*/
        body{-webkit-tap-highlight-color: rgba(0, 0, 0, 0)}
        
        .layui-layer-dialog {
            text-align: center;
            font-size: 16px;
            padding-bottom: 10px;
        }
        .layui-layer-btn.layui-layer-btn- {
            padding: 15px 5px !important;
            text-align: center;
        }
        .layui-layer-btn a {
            font-size: 12px;
            padding: 0 11px !important;
        }
        .layui-layer-btn a:hover {
            border-color: #00a1d6 !important;
            background-color: #00a1d6 !important;
            color: #fff !important;
        }
        .dplayer-controller .dplayer-icons .dplayer-toggle input+label.checked:after {
            left: 17px;
        }
        .dplayer-setting-jlast:hover #jumptime,
        .dplayer-setting-jfrist:hover #fristtime {
            display: block;
            outline-style: none
        }
        #player_pause .tip {
            color: #f4f4f4;
            position: absolute;
            font-size: 14px;
            background-color: hsla(0, 0%, 0%, 0.42);
            padding: 2px 4px;
            margin: 4px;
            border-radius: 3px;
            right: 0;
        }
        #player_pause {
            position: absolute;
            z-index: 9999;
            top: 50%;
            left: 50%;
            border-radius: 5px;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            max-width: 80%;
            max-height: 80%;
        }
        #player_pause img {
            width: 100%;
            height: 100%;
        }
        #ADtip {
            width: 100%;
            height: 100%;
        }
        #ADtip img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        #jumptime::-webkit-input-placeholder,
        #fristtime::-webkit-input-placeholder {
            color: #ddd;
            opacity: .5;
            border: 0;
        }
        #jumptime::-moz-placeholder {
            color: #ddd;
        }
        #jumptime:-ms-input-placeholder {
            color: #ddd;
        }
        #jumptime,
        #fristtime {
            width: 50px;
            border: 0;
            background-color: #414141;
            font-size: 12px;
            padding: 3px 3px 3px 3px;
            margin: 2px;
            border-radius: 12px;
            color: #fff;
            position: absolute;
            left: 5px;
            top: 3px;
            display: none;
            text-align: center;
        }
        #link {
            display: inline-block;
            width: 60px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 12px;
            border-radius: 22px;
            margin: 0px 10px;
            color: #fff;
            overflow: hidden;
            box-shadow: 0px 2px 3px rgba(0, 0, 0, .3);
            background: rgb(99, 99, 99);
            position: absolute;
            z-index: 9999;
            top: 20px;
            /*right: 35px;*/
        }
        #close c {
            float: left;
            display: none;
        }
        .dmlink,
        .playlink,
        .palycon {
            float: left;
            width: 400px;
        }
        #link3-error {
            display: none;
        }
    </style>
    <script>
        var css = '<style type="text/css">';
        var s = (new Date()).getHours();
        if (s > 8 && s < 21 ) {
            css += '#loading-box{background: #fff;}'; //白天
        } else {
            css += '#loading-box{background: #000;}'; //晚上
        }
        css += '</style>';
        $('head').append(css);
    </script>
</head>
<body>
    <div id="player"></div>
    <div id="ADplayer"></div>
    <div id="ADtip"></div>
    <script>
        var up = {
            "usernum": "<?php include("tj.php"); ?>", //在线人数
            "mylink": "?url=", //播放器路径，用于下一集
            "diyid": [0, '游客', 1] //自定义弹幕id
        }
        var config = {
            "api": './dmku/', //弹幕接口
            //"av": '<?php echo ($_GET['av']); ?>', //现在应该要bv了，后期有空移植一下自己别的项目
            "url": "<?php echo ($_GET['url']); ?>", //视频链接
            "id": "<?php echo (substr(md5($_GET['url']), -20)); ?>", //url转视频id
            "sid": "<?php echo ($_GET['sid']); ?>", //展示集数id
            "pic": "<?php echo ($_GET['pic']); ?>", //视频封面
            "title": "<?php echo ($_GET['name']); ?>", //展示视频标题
            "next": "<?php echo ($_GET['next']); ?>", //下一集链接
            "user": '<?php echo ($_GET['user']); ?>', //用户名
            "group": "<?php echo ($_GET['group']); ?>" //用户组
        }
        YZM.start()
    </script>
</body>
</html>