#Log
--------------------

###1-19 by Brian
完成论坛的主要功能
论坛的大框架是先有很多个大主题(对应table:forum),每个大主题下可以留言(对应table:detailforum),detailforum里面的fatherindex属性对应到相应的大主题。

###10-7 by 范承泽
完善了注册登陆功能，增加user属性，实现组队功能。

###9-16 by XgDuan & Brian
完成注册功能。

###8-27 by Brian  
完成登录功能。


#接口
--------------------
####1.user属性
在/models/User.php里有写user的各种属性，任何地方直接可以用 Yii::$app->user->identity->username 访问 username

同理，可以访问id，email，username，realname，teamname等等。

####2.论坛的代码里面需要注意的是

/controllers/ForumController.php里面的第119行actionDetailForum函数的里面的redirect函数的网址一部分应该改为对应服务器

/views/forum/index.php里面的第44行也是上述的问题


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
然后创建四个table：user,team,forum(大的主题),detailforum(主题下的回复)

![db.png](https://github.com/EESAST/ts17web/blob/lzhbrian/db.png)

![team.png](https://github.com/EESAST/ts17web/blob/lzhbrian/team.png)

![team.png](https://github.com/EESAST/ts17web/blob/lzhbrian/forum.png)

![team.png](https://github.com/EESAST/ts17web/blob/lzhbrian/detailforum.png)


#Installation
-----------------
这个是Yii自己的README文档

可以先装一个在电脑上学一下～

这是中文版的教程：http://www.yiichina.com/doc/guide/2.0

-----------------
工作的话直接把这个仓库clone到电脑上那个网站的文件夹就可以了

clone之后要注意那个config/db.php 里面打自己电脑上的database资料，然后以后这个文件不要commit
