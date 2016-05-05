<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;

class MySQLModel{
    
    /**
     * 获取包含分类、标签的文章
     * @return type
     */
    public function getArticleDetail(){
        $articles = $this->getArticles();
        $tagCategory = $this->getTagCategory();
        
        foreach ($articles as $article_id=>&$article){
            
            $article['category'] = isset($tagCategory[$article_id]['category']) ? $tagCategory[$article_id]['category'] : '';
            $article['post_tag'] = isset($tagCategory[$article_id]['post_tag']) ? $tagCategory[$article_id]['post_tag'] : [];
        }
        ksort($articles);
        
        return $articles;
    }
    
    /**
     * 获取所有的文章 - 但不包含分类
     * @return array
     */
    public function getArticles(){
        //获取数据
        $articles = (new \lib\MySQLDAO())->getArticles();
        $formatArticles = [];
        foreach ($articles as $ret){
            $formatArticles[$ret['id']] = $ret;
        }
        
        return $formatArticles;
    }
    
    /**
     * 获取标签和分类 - 但不包含文章
     * @return array
     */
    public function getTagCategory(){
        //获取标签和分类
        $tagCategorys = (new \lib\MySQLDAO())->getTagCategory();
        $formatTagCategory = [];
        //格式化
        foreach($tagCategorys as $ret){
            
            $object_id = $ret['object_id'];
            empty($formatTagCategory[$object_id]) && $formatTagCategory[$object_id] = [];
            $ret['taxonomy'] = 'category' && $formatTagCategory[$object_id]['category'] = $ret['name'];
            $ret['taxonomy'] = 'post_tag' && $formatTagCategory[$object_id]['post_tag'][] = $ret['name'];
            
        }
        
        return $formatTagCategory;
    }
}
