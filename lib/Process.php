<?php
namespace lib;

/**
 * 处理控制器
 * @author lubin <newlubin@163.com>
 */
class Process{
    
    public function run(){
        
        //获取数据库内容
        $articles = (new \lib\MySQLModel)->getArticleDetail();
        
        //渲染一个首页
        $this->_getRenderOutputOfIndex($articles);
        
        //渲染结果并生成所有的index.html
        $this->_getRenderOutput($articles);
        
    }
    
    /**
     * 渲染结果并生成index.html
     * 首页的html内容更需要显示为一些文章内容摘要
     */
    private function _getRenderOutputOfIndex($articles){
        
        foreach($articles as &$article){
//            var_dump($article);exit;
            $text = strip_tags($article['post_content']);
            $text = str_replace(["\n", '  '], ['', ' '], $text);
            $article['post_content'] = mb_substr($text, 0, 200, 'utf-8');
        }
        
        ob_start();
        (new \lib\TemplateHelper())->render($articles);
        $articleHtml = ob_get_contents();
        ob_end_clean();
        
        //输出到blogHtml
        (new \lib\CacheHelper())->output($articleHtml, 'index');
    }
    
    /**
     * 渲染结果并生成所有的 *.html 
     */
    private function _getRenderOutput($articles){
        
        //一个一个地渲染出博客内容，保存到blogHtml
        foreach($articles as $articleId=>$article){
            ob_start();
            (new \lib\TemplateHelper())->render([$article]);
            $articleHtml = ob_get_contents();
            ob_end_clean();
            //输出到blogHtml
            (new \lib\CacheHelper())->output($articleHtml, $articleId);
        }
    }
    
}

