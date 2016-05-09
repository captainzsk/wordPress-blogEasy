<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

namespace lib;
use PDO;

class MySQLOperate{
    
    private static $m_link = NULL;   //数据库链接
    
    private $_host = DB_HOST;
    private $_database = DB_DATABASE;
    private $_user = DB_USER;
    private $_password = DB_PASSWD;
    
    /**
     * 得到MySQL链接 
     * @return \PDO
     */
    public function instance(){
        
        //TODO:可以优化，因为每次都要执行
        $dsn = "mysql:host={$this->_host};dbname={$this->_database};charset=utf8;";
        
        !self::$m_link && self::$m_link = new PDO($dsn, $this->_user, $this->_password);
        
        return self::$m_link;
    }
    
    /**
     * SELECT语句
     * @param string $query_string 
     * @return array 
     */
    public function selectAll($query_string){
        
        $db = $this->instance();
        $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $res = $db->query($query_string);
//        echo $query_string;exit;
        $result_arr = $res->fetchAll();
//        print_r($result_arr);
//        exit;
        
        return $result_arr;
    }
}
