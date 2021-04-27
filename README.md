# dmPlayer
## 注意事项：
### 1.php版本要求不高，毕竟几年前的源码...
### 2.首次使用需要先打开地址 dmku/ 安装弹幕数据库，4种模式，由于代码缺失(sql不会修)，只有pdo的mysql支持全部弹幕功能(举报/后台管理)，其它的只有弹幕发送，无要求的推荐sqlite3，轻量单文件
### 3.后台地址  admin/，密码在admin/index.php文件修改，原来的登录页修好了，但代码太屎，直接删了引用了别人的开源项目
### 4.使用方法，最直接的就是   '安装路径/?url='，其它的可自行翻看源码，小白用户可忽略..
### 5.弹幕大小功能没做

# 参数说明
```
"av":'<?php echo($_GET['av']);?>',//B站av号，用于调用弹幕
"url":"<?php echo($_GET['url']);?>",//视频链接
"id":"<?php echo($_GET['url']);?>",//视频id
"sid":"<?php echo($_GET['sid']);?>",//集数id
"pic":"<?php echo($_GET['pic']);?>",//视频封面
"title":"<?php echo($_GET['name']);?>",//视频标题
"next":"<?php echo($_GET['next']);?>",//下一集链接
"user": '<?php echo($_GET['user']);?>',//用户名
"group": "<?php echo($_GET['group']);?>",//用户组
```
