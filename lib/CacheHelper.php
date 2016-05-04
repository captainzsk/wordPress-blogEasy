<?php
namespace lib;

class CacheHelper{
    /**
     * 
     * @param type $articleHtml
     * @param type $articleId index|文章id
     */
    public function output($articleHtml, $articleId = 'index'){
        
        //如果不是首页，就放到blogs文件夹
        $articleId != 'index' && $articleId = 'article/'.$articleId;
        
        //获得缓存文件的位置
        $htmlFilePath = BASE_PATH."blogHtml/{$articleId}.html";
        
        //保存为*.html缓存文件
        $result = file_put_contents($htmlFilePath, $articleHtml);
        
        if(!$result){
            echo "文章{$articleId}写入失败！";
        }
    }
}