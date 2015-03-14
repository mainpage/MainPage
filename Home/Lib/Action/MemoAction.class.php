<?php

class MemoAction extends BaseAction 
{
    public function index()
    {
        import('ORG.Util.myPage');
    	$memo = M("Memo");
        $memo_count = $memo->count();
        $page_now = isset($_GET['page'])?($_GET['page']):1;   //获取Url中page=？中的page的值，假如不存在，那么页数就是1
        $count_per_page = 10;
        $mypage = new myPage($count_per_page,$memo_count,$page_now);
        $memos = $memo->order('id')->limit($mypage->firstRow.','.$count_per_page)->select();
        foreach ($memos as $key=>$value) 
        {
            $memos[$key]["createTime"] = substr($value["createTime"], 0, 10);//截取日期
        }
        //url请求，显示页面
        if($page_now==1)
        {
            $this->assign("mypage",$mypage);
            $this->assign("memos", $memos);
            $navbar['memo'] = 'active';
            $this->assign('navbar',$navbar);
            $this->display();
        }
        //ajax请求，返回数据
        else
        {
            $this->ajaxReturn($memos);
        }
        
    }

}