# Live2D-Typecho-Plugin

![l2d-adsfj](https://cdn.imalan.cn/img/post/l2d-adsfj.png)

把可爱的看板娘捉到博客上吧！

演示：**[熊猫小A的博客](https://imalan.cn)**

> 野生的 Pio 相当少见，但是一只鲜活的 Pio 可以为我们提供一整天的能量。注意不要发出任何声音，跟着我悄悄地从后面接近她……

好几个月前，[@Jad](https://imjad.cn/) 大佬写了一篇文章 ，然后一众大佬都开始把可爱的看板娘捉到自己的博客上，一时间出现 Pio 血洗个人博客的壮观景象。

然后有几位大佬把 Live2D 封装成了适用于各个平台的插件，目前我知道的有：

> [@保罗](https://paugram.com/) 写的 Typecho 适用的插件 [项目介绍](https://paugram.com/coding/add-poster-girl-with-plugin.html) [项目地址](https://github.com/Dreamer-Paul/Pio)。
>
> [@DaiDR](https://daidr.me/) 写的 WordPress 版 [项目介绍](https://daidr.me/archives/code-176.html)
>
> [@小白-白](https://www.fczbl.vip/) 写的 WordPress 版，模型是 2233 [项目介绍](https://www.fczbl.vip/946.html)

后来我参照 [@后宫学长](https://haremu.com/) 的介绍文章与上述的文章自己也试了试，都是直接在网页代码上改的，有一点点不方便，特别是主题需要更新什么的，就又要来一遍。虽说已经有了 Typecho 的插件版，不该重复造轮子，但由于已有的 Typecho 插件没有交互的功能，而且最近我突然对写 Typecho 插件有点感兴趣，所以决定自己写一个，于是参照了上面几位大佬的代码鼓捣了一个出来。

#### 更新

* 你没有用过的船新版本，重写了样式。

* ~~新的按钮，另外图标换成了 Font Awesome，可以在插件设置页面里面选择要不要引入。~~
* 新的随机换装方式，之前那个实在是蠢。现在要添加更多的衣服只需要把衣服的图片扔在插件目录 `/model/textures` 下就好啦～，本功能参照了[来创建一个私有的随机图服务吧！](https://haremu.com/p/349)


#### 功能

* 返回主页按钮
* 随机换装按钮
* 一言（Hitokoto）按钮
* 照相按钮
* 隐藏按钮
* 大小自适应。在屏幕较小的时候不显示。
* 鼠标悬浮提示。加入更多的提示语句可以自己修改 `message.json`

#### 食用方法

* 下载或者 Clone 这个 Repo，解压后把文件夹改名为 `Live2D` ，扔到 `/usr/plugins/`目录下。
* 到插件配置面板里设置你的主页链接和模型相关的参数。为了实现换装的功能，用了比较笨的方法，具体的在插件配置面板里有描述。
* 这样一只可爱的 Pio 就会出现在博客的左下角。

#### 注意事项

* 使用了 `JQuery` 库，如果你的站没有引入或者引入的是别的图标库可以在插件设置页面里面选择引入。
* 使用前记得在插件设置面板里把该填的填了。
* 插件里带了 3 套衣服，更多的模型……应该还蛮好找的吧……
* PJAX 里鼠标悬浮提示可能失效，需要在主题回调函数中添加 `initTips();`。

------

本项目参照了：

 [journey-ad/live2d_src](https://github.com/journey-ad/live2d_src) | [galnetwen/Live2D](galnetwen/Live2D) | [Dreamer-Paul/Pio](https://github.com/Dreamer-Paul/Pio) 

参照的文章有：

[给博客添加能动的看板娘(Live2D)-将其添加到网页上吧](https://imjad.cn/archives/lab/add-dynamic-poster-girl-with-live2d-to-your-blog-02)

[Live2D！把可爱的看板娘捕捉到你的博客去吧](https://haremu.com/p/205)

[给你的博客增加动态看板娘](https://paugram.com/coding/add-poster-girl-with-plugin.html)

感谢各位大佬！