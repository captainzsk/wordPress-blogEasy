# BlogEasy 使用说明文档
*辅助wordpress*

使用本项目前，请确保你已经具备以下知识：

>  1. ssh-keygen
>  2. 开通了github.io博客仓库 参考：http://newlubin.github.io/article/17.html
>  3. （可选）知道GitHub上如何解决 Key is already in use：http://newlubin.github.io/article/27.html
>  4. 电脑上已经安装了一个wordpress站点 
>  5. （可选）、熟悉nginx配置和反向代理知识
>  6. 有一定的shell知识

**写这个程序的目的是想把Wordpress的文章，转化成html文件。然后将这些文件上传到GitHub.io，这样可以为服务减负，也可以好好地借用 GitHub 的便利进行传播。**

> Git仓库地址：https://github.com/newlubin/blogEasy.git
> 
> 相关介绍：
> 
> $ tree
> 
> .
> 
> ├── blogHtml
> 
> │   ├── article
> 
> │   │   ├── 17.html
> 
> │   │   ├── 24.html
> 
> │   │   ├── 27.html
> 
> │   │   ├── 2.html
> 
> │   │   ├── 4.html
> 
> │   │   └── 6.html
> 
> │   └── index.html
> 
> ├── config.php
> 
> ├── crontab
> 
> │   ├── auto.sh
> 
> │   └── newlubin.github.io
> 
> │   ├── article
> 
> │   │   ├── 17.html
> 
> │   │   ├── 1.html
> 
> │   │   ├── 24.html
> 
> │   │   ├── 27.html
> 
> │   │   ├── 2.html
> 
> │   │   ├── 4.html
> 
> │   │   └── 6.html
> 
> │   ├── index.html
> 
> │   ├── params.json
> 
> │   └── stylesheets
> 
> │   ├── github-light.css
> 
> │   ├── normalize.css
> 
> │   └── stylesheet.css
> 
> ├── index.php
> 
> ├── lib
> 
> │   ├── CacheHelper.php
> 
> │   ├── HtmlHelper.php
> 
> │   ├── MySQLDAO.php
> 
> │   ├── MySQLModel.php
> 
> │   ├── MySQLOperate.php
> 
> │   ├── Process.php
> 
> │   ├── TemplateHelper.php
> 
> │   └── TemplateHtml_01.php
> 
> ├── README.md
> 
> └── template
> 
> └── template_v1.html

8 directories, 32 files

主要讲一下几个重要的代码。

> config.php

在这里面需要将数据库的信息修改为自己数据库连接的信息

> index.php

执行这个文件可以得到blogHtml/index.html blogHtml/article 这样可以得到更多的信息。

> crontab/auto.sh

在终端执行php index.php;cd crontab;sh auto.sh可以将博客内容。

> sh sync.sh

这个文件将上面的步骤统一起来。事实上，你可以只执行这个文件即可，因为它只是把以上几个常用步骤统一起来。