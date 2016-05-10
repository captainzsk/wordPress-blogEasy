<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;

class CacheHelper{
    /**
     * 
     * @param type $articleString
     * @param type $articleId index|文章id
     */
    public function output($articleString, $articleId = 'index'){
        
        //替换掉域名 
        $articleString = str_replace(DOMAIN_REAL_OLD, DOMAIN_REAL_NEW, $articleString);
        
        //得到 HTMl/RSS Path 
        $htmlFilePath = $this->_getHtmlPath($articleId);
        
        //保存为*.html缓存文件 
        if(!is_dir(dirname($htmlFilePath))){
            mkdir(dirname($htmlFilePath), 0755, true);
        }
        
        $result = file_put_contents($htmlFilePath, $articleString);
        
        if(!$result){
            echo "文章{$articleId}写入失败！";
        }else{
            echo "文章写入成功!\n";
        }
    }
    
    /**
     * 得到一个 HTML 的路径
     * @return string
     */
    private function _getHtmlPath($articleId){
        
        if($articleId == 'RSS2'){
            return BASE_PATH."blogHtml/".RSS_NAME;
        }
        
        //如果不是首页，就放到blogs文件夹
        $articleId != 'index' && $articleId = 'article/'.$articleId;
        
        //获得缓存文件的位置
        $htmlFilePath = BASE_PATH."blogHtml/{$articleId}.html";
        
        return $htmlFilePath;
    }
}
