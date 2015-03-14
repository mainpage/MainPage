<?php
	class myPage
	{
		//每页显示的个数
		public $perPageNum;
		//总个数
		public $totalNum;
		//当前页数
		public $currentPage;
		//起始页数
		public $start;
		//结束页数
		public $end;
		//查询数据库时的起始行
		public $firstRow;
		//总页数
		public $pageNum;

		public function __construct($perPageNum, $totalNum, $currentPage)
		{
			$this->perPageNum = $perPageNum;
			$this->totalNum = $totalNum;
			$this->currentPage = $currentPage;
			//总页数
			$this->pageNum = ceil($totalNum/$perPageNum);
			$this->firstRow = ($currentPage-1)*$perPageNum;
			if($this->pageNum<=7)
			{
				$this->start = 1;
				$this->end = $this->pageNum;
			}
			else 
			{
				if($currentPage>3&&$currentPage<$this->pageNum-3)
				{
					$this->start = $currentPage-3;
					$this->end = $currentPage+3;
				}
				elseif($currentPage>=$this->pageNum-3)
				{
					$this->start = $this->pageNum-6;
					$this->end = $this->pageNum;
				}
				else
				{
					$this->start = 1;
					$this->end = 7;
				}
			}
		}
	}
?>
