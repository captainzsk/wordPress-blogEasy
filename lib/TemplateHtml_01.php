<!DOCTYPE html>
<html lang="zh-CN" class="no-js">
<head>
    <meta charset="UTF-8">
    <base href='<?php echo URL_BLOG; ?>'>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
    <title><?php // echo $title; ?></title>
    <style>
      body{
        margin:0;
        padding:0;
        background: #DADEE2;
      }
      img{
           margin: 20px auto;
           display: block;
           max-width: 100%;
      }
      .globalWidth{
        display: block;
        width:1160px;
        margin: 0 auto;
        /*border:2px white solid;*/
        text-align: left;
      }
      div.header{
        padding: 20px 0 5px;
        background:#144254;
      }
      div.header .inner{
        color: #EBEDEF;
      }
      div.header .inner .title{
        font-size: 46px;
      }
      div.header .inner a,
      div.header .inner a:visited{
        font-weight: bold;
        color: #EBEDEF;
        text-decoration: none;
      }
      div.header .inner a:hover{
        color: #0000EF;
      }
      div.header .inner small{
        font-size: 18px;
        /*margin-left: 20px;*/
      }
      .article{
        margin: 16px 0;
      }
      .article .leftPart{
        width:1100px;
        /*border:1px solid;*/
        float: left;
      }
      .article .leftPart .format_left{
        padding: 16px;
        margin: 0 0 16px 0;
        background: #FFFFFF;
      }
      .article .rightPart{
        width:45px;
        height:45px;
        border:1px solid #ABADAF;
        float: right;
        /*background: #D8DBDE;*/
        background: #ABADAF;
      }
      .article .rightPart .format_right{
        /*padding: 14px;*/
      }
      
      .color_title{color: #444444;}
      .color_content{color: #8F446C;}
      .color_tag{color: #CDBBC4;}
      
      .iTitle{
        font-size: 30px;
        font-family: "微软雅黑";
        color: #444444;
      }
      .iTitle a,.iTitle a:visited{
        color: #444444;
        text-decoration: none;
      }
      .iTitle a:hover{
        color:#999999;
      }
      .iInfoMore{
        padding: 10px 0;
        font-size: 14px;
      }
      .iContent{
        padding: 20px 0;
        font:15px/20px "";
      }
      
    </style>
    <script>
        <?php echo STATISTICS_SCRIPT_CODE; ?>
    </script>
  </head>
  <body>
    <!--START OF 头部-->
    <div class="header">
      <div class="inner globalWidth">
        <div class="title"><?php echo \lib\HtmlHelper::href(BLOG_TITLE, URL_BLOG) ?></div>
        <small><?php echo \lib\HtmlHelper::href(BLOG_SUB_TITLE, URL_BLOG) ?></small>
      </div>
    </div>
    <!--END OF 头部-->
    <!--START OF 内容-->
    <div class="article">
      <div class="globalWidth">
        <div class="leftPart">
          <?php foreach($articles as $article): ?>
          <div class="format_left">
            <div class="iTitle"><?php echo \lib\HtmlHelper::hrefBlog($article['post_title'], $article['id']); ?></div>
            <div class="iInfoMore">
                <b>日期</b>
                <span class="iDate"><?php echo substr($article['post_date'], 0, 10); ?></span>
                <b>分类</b>
                <span class="iTag"><?php echo $article['category']; ?></span>
                <b>标签</b>
                <?php foreach($article['post_tag'] as $tag): ?>
                <span class="iTag">#<?php echo $tag; ?>#</span>
                <?php endforeach; ?>
            </div>
            <div class="iContent"><?php echo $article['post_content']; ?></div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="rightPart">
          <div class="format_right">
            <?php echo \lib\HtmlHelper::href('RSS', URL_BLOG.RSS_NAME); ?>
          </div>
        </div>
      </div>
      
    </div>
    <!--END OF 内容-->
    <!--START OF 脚部-->
    <!--END OF 脚部-->

  </body>
  
</html>
<script>
var data = {};

</script>