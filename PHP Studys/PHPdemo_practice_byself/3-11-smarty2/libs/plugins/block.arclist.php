<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {textformat}{/textformat} block plugin
 *
 * Type:     block function<br>
 * Name:     textformat<br>
 * Purpose:  format text a certain way with preset styles
 *           or custom wrap/indent settings<br>
 * @link http://smarty.php.net/manual/en/language.function.textformat.php {textformat}
 *       (Smarty online manual)
 * @param array
 * <pre>
 * Params:   style: string (email)
 *           indent: integer (0)
 *           wrap: integer (80)
 *           wrap_char string ("\n")
 *           indent_char: string (" ")
 *           wrap_boundary: boolean (true)
 * </pre>
 * @author Monte Ohrt <monte at ohrt dot com>
 * @param string contents of the block
 * @param Smarty clever simulation of a method
 * @return string string $content re-formatted
 */
function smarty_block_arclist($params, $content, &$smarty){
    $cid=$params['cid'];//获得分类id
    $rows=$params['rows'];//获得取得的个数

    //连接数据库
    $link=@new Mysqli('127.0.0.1','root','','wenda');
    $link->query('SET NAMES UTF8');
    $sql="SELECT * FROM hd_ask WHERE cid={$cid} LIMIT {$rows}";
    $result=$link->query($sql);
    $resultRows=array();
    while($row=$result->fetch_assoc()){
        $resultRows[]=$row;
    }


    $str='';
    foreach ($resultRows as $k => $v) {
        $c=$content;
        foreach ($v as  $f => $value) {
            $c=str_replace("[\$field.$f]", $value, $c);
        }
        $str.=$c;
    }

    return $str;

}
/* vim: set expandtab: */

?>
