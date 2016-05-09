<?php

define('BLOG_TITLE', 'Tree.php');
define('BLOG_SUB_TITLE', 'Make PHP programmer world happier');

//博客的网址 
define('URL_BLOG', 'http://blog.yioio.com/');
//原来的域名 
define('DOMAIN_REAL_OLD', 'treephp.yioio.com');
//要被替换的域名 
define('DOMAIN_REAL_NEW', 'blog.yioio.com');
//图客图片的路径 
define('STATISTICS_PATH', '/yioio/code/treephp/wp-content');

/**
 * 数据库相关信息，敏感信息，切记莫上传
 */
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'wordpress');
define('DB_USER', 'root');
define('DB_PASSWD', 'root');
define('DB_PREFIX', 'wp2_');

/**
 * GitHub仓库地址
 */
define('GITHUB', 'git@newlubin.github.io:newlubin/newlubin.github.io.git');

/**
 * 统计脚本代码
 */
define('STATISTICS_SCRIPT_CODE', 'var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?5b39f453b0d1722a6fb378b0047b76b9";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();');
    