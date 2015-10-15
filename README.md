#Log
--------------------
###10-15 by 段续光
写了一点点前端，暂时凑合着用吧。另外，那个form的样式没改，每想好怎么改。
颜色不太协调哈~

--------------------

###10-7 by 范承泽
完善了注册登陆功能，增加user属性，实现组队功能。
P.S.数据库结构有修改，怎么给你们－ －
（数据库怎么设置我稍晚传照片。。。）

###9-16 by XgDuan & Brian
完成注册功能。

###8-27 by Brian  
完成登录功能。


#接口
--------------------
####1.user属性
在/models/User.php里有写user的各种属性，任何地方直接可以用 Yii::$app->user->identity->username 访问 username

同理，可以访问id，email，username，realname，teamname等等。



#Settings
--------------------
资料库设置成下面这样：

在config/db.php里
```
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname= //Your DB Name ',
    'username' => 'root',
    'password' => '//Your Password',
    'charset' => 'utf8',
];
```
然后创建一个table叫'user'

设置成下面这样：
![db.png](https://github.com/EESAST/ts17web/blob/master/db.png)

#Installation
-----------------
这个是Yii自己的README文档

可以先装一个在电脑上学一下～

这是中文版的教程：http://www.yiichina.com/doc/guide/2.0

-----------------
工作的话直接把这个仓库clone到电脑上那个网站的文件夹就可以了

clone之后要注意那个config/db.php 里面打自己电脑上的database资料，然后以后这个文件不要commit

-----------------
这个仓库我改了一下网站的名字、然后把大致上基本的功能的view，还有controller的文件建好了（只有建文件没有代码。。）

基本上有以下几个：Dashboard，Forum，News，OnlineCompile，SupportingFiles

以上先写dashboard和forum就好，其他都不急


它本身就有带登陆的功能，但非常简陋。。没有用到DB没有密码的验证。

所以还有登陆、注册、组队的功能要写，包括user的model，controller。

登陆注册用户的部分可能比较急，不完成的话其他可能不知道怎么写。。

-----------------
基本上开学之前要完成的功能：登录，注册，组队，论坛（包括发帖），登陆后的dashboard，就只有这些！感觉挺少的吧！
各位加油！
