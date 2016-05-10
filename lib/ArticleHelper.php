<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lib;
/**
 * 将从wordpress取出来的文章格式化
 */
class ArticleHelper{
            
    public static function formateAsRss2($article){
        
        return self::formateAsIndex($article);
    }
    
    public static function formateAsIndex($article){
        $text = strip_tags($article['post_content']);
        $text = str_replace(["\n", '  '], ['', ' '], $text);
        $article['post_content'] = mb_substr($text, 0, 200, 'utf-8');
        
        return $article;
    }
    
    public static function formateAsDetail($article){
        
        $article['post_content'] = "<p>".  str_replace("\n", '</p><p>', $article['post_content'])."</p>";

        return $article;
        
    }
}
