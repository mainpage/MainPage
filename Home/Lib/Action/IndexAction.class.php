<?php

class IndexAction extends BaseAction 
{
    public function index()
    {
    	import('ORG.Util.myPage');
    	$blog = M('article');
    	$page_now = isset($_GET['page'])?($_GET['page']):1;   //获取Url中page=？中的page的值，假如不存在，那么页数就是1
    	$count_per_page = 5;
        if(isset($_GET['category']))
        {
            $category = $_GET['category'];
            $blog_count = $blog->where("isSubmitted=1 and categoryId=$category")->count();
            $mypage = new myPage($count_per_page,$blog_count,$page_now);
            $blog_list = $blog->join('think_category on think_article.categoryId=think_category.categoryId')->where("isSubmitted=1 and think_article.categoryId=$category")->order('id')->limit($mypage->firstRow.','.$count_per_page)->select();
            $next_link_cate = "category/{$category}/";  //翻页链接加入category信息
        }
        else
        {
            $blog_count = $blog->where('isSubmitted=1')->count();
            $mypage = new myPage($count_per_page,$blog_count,$page_now);
            $blog_list = $blog->join('think_category on think_article.categoryId=think_category.categoryId')->where('isSubmitted=1')->order('id')->limit($mypage->firstRow.','.$count_per_page)->select();
        }
        //print_r($blog_list[0]);
    	$this->assign('blog_list', $blog_list);
    	$this->assign('mypage', $mypage);
        $this->assign('next_link_cate', $next_link_cate);
        $this->assign('category_list',$this->getCategory());
        $navbar['index'] = 'active';
        $this->assign('navbar',$navbar);
        $this->display('index');
    }

    public function blog()
    {
        $blog = M('article');
        $id = $_GET['id'];
        $blog_item = $blog->join('think_category on think_article.categoryId=think_category.categoryId')->where("id=$id")->find();
        $pre_id = $blog->order('id desc')->where("id<$id and isSubmitted=1")->limit(1)->getfield('id');
        $next_id = $blog->where("id>$id and isSubmitted=1")->order('id')->limit(1)->getfield('id');
        $this->assign('blog', $blog_item);
        $this->assign('pre_id',$pre_id);
        $this->assign('next_id',$next_id);
        $this->assign('category_list',$this->getCategory());
        $navbar['index'] = 'active';
        $this->assign('navbar',$navbar);
        $this->display('blog');
    }

    private function getCategory()
    {
        $category = M('category');
        return $category_list = $category->select();
    }

}