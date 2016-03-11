
#Log
--------------------
###3-12 by 林子恒
论坛加了队伍招募；汉化了；news页面需要账号：lzhbrian，密码：password才能打开；主页放了一些东西，需要 @duanxg 美化一下QAQ。。。
###2-23 by 段续光
重写了login/register,懒得写ajax（其实是不会写）所以用了activeform的一些东西，但是对activeform进行了修改(app\doc\widgets\myActiveForm)，以适应目前的格式，不知道在其他浏览器、手机端会不会有bug。
###2-18 by 段续光
写了组队的前端，然而实在是审美有限，简直写成屎了，对了，我觉得组队里的status没啥用就把他当成成员数量来用了，变量名没改……。还写了好久。组队中还有一些问题，回头改哈……我们的网站的主要问题是一个页面上内容太少了，但是前期结构一定定型了，大改我怕改坏……今晚写下新闻吧。
###2-17 by 段续光
实在是没状态，我改了下队长写的论坛的前端，准备写dashboard了，但是组队哪里可能会花费很多时间（因为gii自动生成的代码我改不动啊（回头研究下再说））。我改过的已经merge到dev上了。
###2-6 by 林子恒
现在论坛帖子分四类：吐槽灌水，战术讨论，规则询问，平台报错；还有全部、我发的帖子、我回复的帖子

点赞：点进去帖子里面之后点赞；likehistory会记录你的userid和你点的论坛的forumid

删除：点进去帖子里面之后删除（如果你是作者的话），下面回复的东西也都会删除

置顶：前两个帖子是置顶，现在设置是被点赞量最高的两个

###31-1 by 段续光	
我们是不是以后吧log都merge到master上去啊。
我好想改了点东西

###1-28 by 林子恒
修改了user属性，加入passwordhash，还有生成authkey（资料库里的user表已有的数据要删掉重新加入）
文件下载（supporting files写了一点东西），文件存在web/files下面（这部分一点技术含量都没有。。。）
然后改了一点点注册的服务器端验证

###1-19 by 范承泽
完成上传文件并存储的功能。
存储路径为/web/uploads，文件名是自增的数字。
里面有ts17web.sql文件，用于生成数据库。直接在phpmyadmin中import就可以。

###1-19 by Brian
完成论坛的主要功能
论坛的大框架是先有很多个大主题(对应table:forum),每个大主题下可以留言(对应table:detailforum),detailforum里面的fatherindex属性对应到相应的大主题。

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

####3.web下面有一个文件夹images放图片


#Settings
--------------------
资料库: web/ts17web.sql


#Installation
-----------------
这个是Yii自己的README文档

可以先装一个在电脑上学一下～

这是中文版的教程：http://www.yiichina.com/doc/guide/2.0

-----------------
工作的话直接把这个仓库clone到电脑上那个网站的文件夹就可以了

clone之后要注意那个config/db.php 里面打自己电脑上的database资料，然后以后这个文件不要commit
