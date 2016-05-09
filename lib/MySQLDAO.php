<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;

class MySQLDAO {
    
    private $_table_prefix = DB_PREFIX;
    
    /**
     * 获取所有的文章
     * @param type $article
     */
    public function getArticles(){
        
        $sql  = " SELECT id, post_title, post_content, post_date FROM {$this->_table_prefix}posts";
        $sql .= " WHERE post_status = 'publish'";
        
        return (new \lib\MySQLOperate)->selectAll($sql);
    }
    
    public function getTagCategory(){
        
        $sql  = " SELECT r.object_id, t.taxonomy, m.name";
        $sql .= " FROM {$this->_table_prefix}term_relationships r";
        $sql .= " LEFT JOIN {$this->_table_prefix}term_taxonomy t";
        $sql .= " ON r.term_taxonomy_id = t.term_taxonomy_id";
        $sql .= " LEFT JOIN {$this->_table_prefix}terms m";
        $sql .= " ON m.term_id = t.term_id";
        
        return (new \lib\MySQLOperate)->selectAll($sql);
    }
}
