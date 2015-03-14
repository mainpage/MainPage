<?php

class ArticleAction extends BaseAction 
{
    /**
     * @函数  index
     * @功能  显示文章列表
     */
    public function index(){
        //实例化文章模型(M方法不需要模型类存在)
    	$articles = M("article");
    	$article_count = $articles->where("isSubmitted=1")->count();

        //使用框架内的page类(ThinkPHP/Extend/Library/ORG/Util/Page.class.php)
        //实现分页(对该文件稍作修改，添加样式)
        //(考虑如何用ajax实现无刷新分页)
        import('ORG.Util.Page');
        $num_per_page = 5; //每页显示5篇文章
        $page = new Page($article_count,$num_per_page);
        //设置显示格式
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
    	$article_list = $articles->where("isSubmitted=1")->order('id')->limit($page->firstRow.','.$page->listRows)->select();
    	$this->assign('article_list',$article_list);
    	$this->assign('article_count',$article_count);
        $this->assign('pagination',$pagination);
        $this->assign('list_type','Article List');
        //文章列表页面的edit按钮指向edit方法
        $this->assign('edit_func','edit');
        //manage_article导航栏目高亮
        $menu['article'] = "current"; 
        $menu['manage_article'] = "current";
        $this->assign("menu",$menu);
    	$this->display();
    }

    /**
     * @函数  draft
     * @功能  显示草稿箱
     */
    public function draft(){
        $articles = M("article");
        $article_count = $articles->where("isSubmitted=0")->count();

        import('ORG.Util.Page');
        $num_per_page = 5; //每页显示5篇文章
        $page = new Page($article_count,$num_per_page);
        //设置显示格式
        $page->setConfig('header', "条记录");
        $page->setConfig('prev', "&laquo");//上一页
        $page->setConfig('next', '&raquo;');//下一页
        $page->setConfig('theme','%totalRow% %header% %nowPage%/%totalPage% 页 %upPage%  %linkPage%  %downPage%');
        //分页显示函数
        $pagination = $page->show();
        //限制查询
        $article_list = $articles->where("isSubmitted=0")->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('article_list',$article_list);
        $this->assign('article_count',$article_count);
        $this->assign('pagination',$pagination);
        $this->assign('list_type','Draft List');
        //草稿箱页面的edit按钮指向editDraft方法
        $this->assign('edit_func','editDraft');
        //manage_draft导航栏目高亮
        $menu['article'] = "current"; 
        $menu['manage_draft'] = "current";
        $this->assign("menu",$menu);
        $this->display("index");
    }

    /**
     * @函数  add
     * @功能  写新文章，显示文章编辑页面
     */
    function add(){
        $this->assign("h1","New Article");
        $this->assign("button_text","Submit article");
        $this->assign("button_action","submit");
        //Article导航栏目高亮
        $menu['article'] = "current"; 
        $this->assign("menu",$menu);
        $this->display("article");
    }

    /**
    * @函数 edit
    * @功能 编辑已有文章，显示文章编辑页面
    */
    public function edit()
    {
        $article = M('Article');
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $data = $article->where("id=$id")->find();
            $this->assign("h1","Edit Article");
            $this->assign("button_text","update article");
            $this->assign("button_action","update");
            $this->assign("article_item",$data);
            //Article导航栏目高亮
            $menu['article'] = "current"; 
            $this->assign("menu",$menu);
            $this->display('article');
        }
        else
        {
            $this->error('参数错误！');
        }
    }

    /**
    * @函数 editDraft
    * @功能 编辑草稿，显示文章编辑页面
    */
    public function editDraft()
    {
        $article = M('Article');
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $data = $article->where("id=$id")->find();
            $this->assign("h1","Edit Draft");
            $this->assign("button_text","submit article");
            $this->assign("button_action","submit");
            $this->assign("article_item",$data);
            //Article导航栏目高亮
            $menu['article'] = "current"; 
            $this->assign("menu",$menu);
            $this->display('article');
        }
        else
        {
            $this->error('参数错误！');
        }
    }

    /**
    * @函数 delete
    * @功能 删除文章
    */
    function delete(){      
        $article = M('article');
        if(isset($_GET['id']))
        {
            if($article->delete($_GET['id'])){
                $this->success('文章删除成功!');
            }
            else{
                //$this->error($article->getLastSql());
                $this->error('文章删除失败');
            }
        }
        else
        {
            $ids = $_POST['ids'];
            foreach ($ids as $id) 
            {
                if(!$article->delete($id))
                {
                    $this->error('批量删除失败!');
                }
            }
            $this->success('批量删除成功!');
        }
    }

    /**
     * @函数  submit
     * @功能  提交文章
     */
    function submit(){
        $article = M('Article');
        //如果id存在，说明数据库中已经有该文章的草稿，只需对其进行更新
        if($_POST['id'])
        {
            $id=$_POST['id'];
            $article->title = $_POST['title'];
            $article->content = $_POST['editorValue']; //editorValue即为ueditor的内容
            $article->abstract = $this->getAbstract($_POST['editorValue']);
            $article->lastModifyTime = date("Y-m-d H:i:s");
            $article->isSubmitted = 1;
            $article->categoryId =  $_POST['dropdown'];
            //save
            if($article->where("id=$id")->save())
            {
                $this->success('文章添加成功!',U('Article/index'));
            }
            else
            {
                $this->error('文章添加失败!');
            }
        }
        else
        {
            $article->title = $_POST['title'];
            $article->content = $_POST['editorValue']; //editorValue即为ueditor的内容
            //$content_text = htmlspecialchars_decode($_POST['editorValue']); //去除content中的html符号
            $article->abstract = $this->getAbstract($_POST['editorValue']);
            $article->author = "sch";
            $article->createTime = date("Y-m-d H:i:s");
            $article->lastModifyTime = date("Y-m-d H:i:s");
            $article->isSubmitted = 1;
            $article->categoryId =  $_POST['dropdown'];
            //add
            if($article->add())
            {
                $this->success('文章添加成功!',U('Article/index'));
            }
            else
            {
                $this->error('文章添加失败!');
            }
        }
    } 
    
    /**
    * @函数 save
    * @功能 保存草稿(通过ajax提交草稿表单)
    */
    function save(){        
        $article = M('Article');
        //更新草稿
        if($_POST['id'])
        {
            $id = $_POST['id'];
            $article->title = ($_POST['title']=="")?"未命名":$_POST['title'];
            $article->content = $_POST['content']; 
            $article->abstract = $this->getAbstract($_POST['content']);
            $article->lastModifyTime = date("Y-m-d H:i:s");
            $article->isSubmitted = 0;
            $article->where("id=$id")->save();
            echo $id;
        }
        //生成草稿
        else
        {
            $article->title = ($_POST['title']=="")?"未命名":$_POST['title'];
            $article->content = $_POST['content']; 
            $article->abstract = $this->getAbstract($_POST['content']);
            $article->author = "sch";
            $article->createTime = date("Y-m-d H:i:s");
            $article->lastModifyTime = date("Y-m-d H:i:s");
            $article->isSubmitted = 0;
            $article->categoryId =  $_POST['categoryId'];
            echo $article->add();
        }
    }

    /**
    * @函数 update
    * @功能 更新文章
    */
    public function update()
    {
        $article = M('Article');
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $article->title = $_POST['title'];
            $article->content = $_POST['editorValue']; 
            $article->abstract = $this->getAbstract($_POST['editorValue']);
            $article->lastModifyTime = date("Y-m-d H:i:s");
            $article->categoryId =  $_POST['dropdown'];
            if($article->where("id=$id")->save())
            {
                $this->success('更新成功!',U('Article/index'));
            }
            else
            {
                $this->success('更新失败!');
            }
        }
        else
        {
            $this->error('参数错误！');
        }
    }

    private function getAbstract(string $content)
    {
        //$content_text = strip_tags($content); //去除content中的html符号
        //return substr($content_text, 0, 10)."..."; //截取前10个字符
        $pattern = '/.*?\/p\>/';
        preg_match_all($pattern, $content, $matches, PREG_PATTERN_ORDER); //匹配/p>之前的字符，每个匹配项即为一个段落
        return strip_tags($matches[0][0]); //返回第一个段落，并去除其中包含的html标签
    }
        
}