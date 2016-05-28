WordPress Theme Quench
======

注意事项
----

 1. 本主题自带 fancybox 图片灯箱 和 lazyload 图片延迟载功能，使用前请先关闭同类插件，避免冲突。
 2. 适合本主题的多说 CSS 在本说明页面的最下方。
 3. 音乐文章使用的是虾米的链接，可直接使用短代码`[xiami]id[/xiami]`插入。
 4. 头像缓存功能需手动在根目录建立 avatar 文件夹并设置属性为可写。
 5. 将 http://pan.baidu.com/s/1jGkPhhs 的 jplayer.swf 放在网站根目录。
 6. 由于众所周知的原因，头像可能会出现不能访问的情况，目前使用方法是通过 `https` 调用头像。 需要修改可用关键词 Gravatar WordPress 搜索解决。
 7. 文章中支持的短代码有：attention，bag，bonus，calendar，check，delete，edit，flag，help，information，love，tag，样式基本一致，只是引用的背景图片不同，可参考 \quench\images 目录下的图片。

更多内容可查看[主题页面](https://lophita.com/wordpress-theme-quench.html)

更新日志
----
update 2016-05-28
 - 添加了是否开启 lazyload 图片延迟加载的选项

update 2016-05-26

 - 增加了全局 AJAX 模式下对 Hermit 播放器的支持
 - 升级 jQuery 版本到最新的 1.12.4
 - 将图片延迟加载插件 unveil 更换为 lazyload
 - 修复自动添加空格功能在 AJAX 加载页面后没有自动触发的错误
 - 更换二维码 API ，使用支持 https 的 [Liwanglin12的API](https://blog.lwl12.com/read/lwl-api-qrcode.html)
 - 修改了说明页面
 - 修改了网站标题下简介的显示动画

update 2016-05-11

 - 支持多说 AJAX
 - 优化背景遮罩，解决闪动 bug

update 2016-05-03

 - 优化 评论框记住用户信息

update 2016-02-20

 - 修复关闭评论仍显示评论框的错误

update 2016-02-20

- 压缩 CSS/JS 代码
- 移除 JSON API 支持

update 2016-01-20

- 更新 Gravatar 源，使用七牛云存储

update 2016-01-11

- 修复 WordPress 4.4 的评论分页的错误

update 2015-10-16

- 优化网页背景显示效果
- 修改 AJAX 加载动画

update 2015-06-29

- 添加 WordPress 4.2 支持
- 移除了头像缓存功能

update 2014-12-22

- 修复虾米音乐链接错误的 Bug
- 后台添加“使用同一侧边栏”功能

update 2014-10-04

- 添加多语言支持

update 2014-08-11

- 修复分页显示不正确的 Bug

update 2014-08-06

- 添加短代码

update 2014-07-30

- 调整字体
- 修复全站ajax时的跳转错误

主要功能及特点
-------
1. 响应式设计，PC、平板、手机等均可正常浏览
2. 内置多种小工具，最新/随机/热门文章、最新评论、活跃读者、标签云、日历等等
3. 内置图片灯箱
4. 内置图片延迟加载，可加快多图页面的加载速度
5. 内置头像缓存
6. 内置Ajax评论提交，可基本解决垃圾评论问题
7. 内置Ajax评论翻页
8. 全站Ajax功能，可开启/关闭
9. 汉字与拉丁字符间自动添加空白间隙，优化排版
10. 5 种文章格式
11. 顶部公告栏
12. 侧边栏滚动，可自由设置
13. 支持3种侧边栏
14. 内置文章存档、标签云和网站地图3种页面模板
15. 文章二维码
16. 文章喜欢功能

多说样式优化
------
请打开多说的个性化设置页面，在自定义CSS的选项中加入以下代码：
```
#ds-thread {
  background: #ffffff;
  padding: 20px 26px;
  margin-bottom:2rem;
}
#ds-thread:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    z-index: 10;
    border-width: 0 16px 16px 0;
    border-style: solid;
    border-color: #FFF #47c2dc #FFF #FFF;
    background: none repeat scroll 0 0 #658e15;
    box-shadow: 0 1px 1px rgba(0,0,0,0.08),-1px 1px 1px rgba(0,0,0,0.08);
    display: block;
    width: 0;
}
```

如果需要隐藏不和谐的 Like 按钮，可以再添加以下代码：
```
.ds-meta {
  display:none;
}
```

完成后效果如图（已隐藏 Like 按钮，部分文字已自定义）
![enter image description here](https://github.com/fly3949/imgs/blob/master/demo/quench/duoshuo.png?raw=true)


Thanks to [@fly3949](https://github.com/fly3949), [@h2y](https://github.com/h2y).
