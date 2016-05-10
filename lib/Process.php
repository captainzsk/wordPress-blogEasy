<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;

/**
 * 处理控制器
 * @author lubin <newlubin@163.com>
 */
class Process{
    
    public function run(){
        
        //获取数据库内容
        $articles = (new \lib\MySQLModel)->getArticleDetail();
        if($articles){
            echo "Get data success!\n";
        }
        
        //生成HTML
        $this->_makeHtml($articles);
        
        //生成Rss
        $this->_makeRss2($articles);
    }
    
    /**
     * 生成 HTML 
     */
    private function _makeHtml($articles){
        
        //渲染一个首页
        echo "start render template of index...\n";
        $this->_getRenderOutputOfIndex($articles);
        
        //渲染结果并生成所有的html
        echo "start render template of content html file...\n";
        $this->_getRenderOutput($articles);
        
        //复制图片
        echo STATISTICS_FILE_PATH_DEST,"\n";
        !is_dir(STATISTICS_FILE_PATH_DEST) && mkdir(STATISTICS_FILE_PATH_DEST, 0755, true);
        system("cp -rf ".STATISTICS_FILE_PATH." ".STATISTICS_FILE_PATH_DEST);
    }
    
    /**
     * 生成 RSS2  
     */
    private function _makeRss2($articles){
        foreach($articles as &$article){
            \lib\ArticleHelper::formateAsRss2($article);
        }
        
        ob_start();
        (new \lib\TemplateHelper())->renderRss2($articles);
        $articleString = ob_get_contents();
        ob_end_clean();
        
        //输出到blogHtml
        (new \lib\CacheHelper())->output($articleString, 'RSS2');
    }
    
    /**
     * 渲染结果并生成index.html
     * 首页的html内容更需要显示为一些文章内容摘要
     */
    private function _getRenderOutputOfIndex($articles){
        
        foreach($articles as &$article){
            \lib\ArticleHelper::formateAsIndex($article);
        }
        
        ob_start();
        (new \lib\TemplateHelper())->render($articles);
        $articleString = ob_get_contents();
        ob_end_clean();
        
        //输出到blogHtml
        (new \lib\CacheHelper())->output($articleString, 'index');
    }
    
    /**
     * 渲染结果并生成所有的 *.html 
     */
    private function _getRenderOutput($articles){
        
        //一个一个地渲染出博客内容，保存到blogHtml
        foreach($articles as $articleId=>$article){
            \lib\ArticleHelper::formateAsDetail($article);
            
            ob_start();
            (new \lib\TemplateHelper())->render([$article]);
            $articleString = ob_get_contents();
            ob_end_clean();
            
            //输出到blogHtml
            (new \lib\CacheHelper())->output($articleString, $articleId);
        }
    }
}
