<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;
class HtmlHelper{
    
    /**
     * 
     * @param string $title 
     * @param string $url 
     * @param array $attribute 
     */
    public static function href($title, $url, $attribute = []){
        
        return "<a href=\"{$url}\">{$title}</a>";
    }
    
    /**
     * 博客的url
     * @param type $title
     * @param type $id
     * @param type $attribute
     */
    public static function hrefBlog($title, $id, $attribute = []){
        
        $url = "article/{$id}.html";
        
        return self::href($title, $url, $attribute);
    }
    
}
