<?php

class MemoAction extends BaseAction 
{
    /**
     * @函数  index
     * @功能  显示便签列表
     */
    public function index(){
        //实例化文章模型(M方法不需要模型类存在)
    	$memo = M("memo");
    	$memo_count = $memo->count();

        //使用框架内的page类(ThinkPHP/Extend/Library/ORG/Util/Page.class.php)
        //实现分页(对该文件稍作修改，添加样式)
        //(考虑如何用ajax实现无刷新分页)
        import('ORG.Util.Page');
        $num_per_page = 6; //每页显示5篇文章
        $page = new Page($memo_count,$num_per_page);
        //设置显示格式e_
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
        $memo_list = $memo->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('memo_list',$memo_list);
        $this->assign('memo_count',$memo_count);
        $this->assign('pagination',$pagination);
        //manage_memo导航栏目高亮
        $menu['memo'] = "current"; 
        $menu['manage_memo'] = "current";
        $this->assign("menu",$menu);
    	$this->display();
    }


    /**
     * @函数  add
     * @功能  写新便签，显示便签编辑页面
     */
    function add(){
        $this->assign("h1","New Memo");
        $this->assign("button_text","Submit memo");
        $this->assign("button_action","submit");
        //Article导航栏目高亮
        $menu['memo'] = "current"; 
        $this->assign("menu",$menu);
        $this->display("memo");
    }

    /**
    * @函数 edit
    * @功能 编辑已有便签，显示便签编辑页面
    */
    public function edit()
    {
        $memo = M('Memo');
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $data = $memo->where("id=$id")->find();
            $this->assign("h1","Edit Memo");
            $this->assign("button_text","update article");
            $this->assign("button_action","update");
            $this->assign("memo_item",$data);
            //Memo导航栏目高亮
            $menu['memo'] = "current"; 
            $this->assign("menu",$menu);
            $this->display('memo');
        }
        else
        {
            $this->error('参数错误！');
        }
    }


    /**
    * @函数 delete
    * @功能 删除便签
    */
    function delete(){      
        $memo = M('memo');
        if(isset($_GET['id']))
        {
            if($memo->delete($_GET['id']))
            {
                $this->success('便签删除成功!');
            }
            else{
                //$this->error($article->getLastSql());
                $this->error('便签删除失败');
            }
        }
        else
        {
            $this->error('参数错误！');
        }
    }

    /**
     * @函数  submit
     * @功能  提交便签
     */
    function submit(){
        $memo = M('Memo');
        $memo->keyword = $_POST['keyword'];
        $memo->content = $_POST['content'];
        $memo->author = "sch";
        $memo->createTime = date("Y-m-d H:i:s");
        $memo->lastModifyTime = date("Y-m-d H:i:s");
        if($memo->add())
        {
            $this->success('便签添加成功!',U('Memo/index'));
            //$this->error($memo->getLastSql());
        }
        else
        {
            $this->error('便签添加失败!');
            //$this->error($memo->getLastSql());
        }
    } 
    
    /**
    * @函数 update
    * @功能 更新便签
    */
    public function update()
    {
        $memo = M('Memo');
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $memo->keyword = $_POST['keyword'];
            $memo->content = $_POST['content']; 
            $memo->lastModifyTime = date("Y-m-d H:i:s");
            if($memo->where("id=$id")->save())
            {
                $this->success('更新成功!',U('Memo/index'));
            }
            else
            {
                $this->error('更新失败!');
            }
        }
        else
        {
            $this->error('参数错误！');
        }
    }
        
}