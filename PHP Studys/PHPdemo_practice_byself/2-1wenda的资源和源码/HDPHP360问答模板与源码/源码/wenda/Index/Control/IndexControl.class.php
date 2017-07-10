<?php
/**
 * 默认前台控制器
 */
class IndexControl extends CommonControl{
	/**
	 * 前台默认方法
	 * @return [type] [description]
	 */
    public function index(){
        //问题库分类信息
        $this->assign_data();

    	$cate = M('category')->where(array('pid'=>0))->select();
    	
    	foreach ($cate as $k => $v) {
    		$cate[$k]['down'] = M('category')->where(array('pid'=>$v['cid']))->select();
    	}
    	// p($cate);
    	$this->assign('cate', $cate);
    	

        //未解决低悬赏
        $where = array(
            'solve' => 0,
            'reward' => array('elt'=>20)
            );
        $field = 'reward,content,answer,asid,cid';
        $askDb = M('ask');

        $noSolveL = $askDb->where($where)->order('time DESC')->field($field)->limit(8)->select();
        $this->assign('noSolveL', $noSolveL);

    	//未解决高分悬赏
        $where['reward'] = array('gt'=>20);
        $noSolveH = $askDb->where($where)->order('time DESC')->field($field)->limit(8)->select();
        $this->assign('noSolveH', $noSolveH);
        
        $this->display();
    }

    /**
     * 搜索
     */
    public function search(){
        $content = $this->_POST('search');
        $field = 'ask.content,answer.content|answerCon,title,ask.answer,ask.time,ask.asid,ask.cid';
        $where = array(
            'accept' => 1,
            "ask.content like '%$content%'",
            );
        $search = K('answerInfo')->where($where)->field($field)->select();

        $this->assign('search', $search);

        $this->display();
    }
}

?>
