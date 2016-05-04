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
     * @param type $articleHtml
     * @param type $articleId index|文章id
     */
    public function output($articleHtml, $articleId = 'index'){
        
        //如果不是首页，就放到blogs文件夹
        $articleId != 'index' && $articleId = 'article/'.$articleId;
        
        //获得缓存文件的位置
        $htmlFilePath = BASE_PATH."blogHtml/{$articleId}.html";
        
        //保存为*.html缓存文件
        if(!is_dir(dirname($htmlFilePath))){
            mkdir(dirname($htmlFilePath), 0755, true);
        }
        $result = file_put_contents($htmlFilePath, $articleHtml);
        
        if(!$result){
            echo "文章{$articleId}写入失败！";
        }
    }
}