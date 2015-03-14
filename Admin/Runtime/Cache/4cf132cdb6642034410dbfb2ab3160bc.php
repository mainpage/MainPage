<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simpla Admin</title>
<link rel="stylesheet" href="__PUBLIC__/Css/admin/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Css/admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__PUBLIC__/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/facebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.datePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/admin/jquery.date.js"></script>
</head>
	<body>
	<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
			<div id="sidebar">
		<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="<?php echo U('Index/index');?>">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="<?php echo U('Index/index');?>"><img id="logo" src="__PUBLIC__/Images/admin/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a><?php echo ($user_name); ?></a> | <a href="<?php echo U('Login/logout');?>" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="<?php echo U('Index/index');?>" class="nav-top-item no-submenu <?php echo ($menu["dashboard"]); ?>">Dashboard</a>       
				</li>
								
				<li>
					<a href="#" class="nav-top-item <?php echo ($menu["memo"]); ?>">
						Memos
					</a>
					<ul>
						<li><a class="<?php echo ($menu["new_memo"]); ?>" href="<?php echo U('Memo/add');?>">Create a new Memo</a></li>
						<li><a class="<?php echo ($menu["manage_memo"]); ?>" href="<?php echo U('Memo/index');?>">Manage Memos</a></li>
					</ul>
				</li>
				
				<li> 
					<a href="#" class="nav-top-item <?php echo ($menu["article"]); ?>">Articles</a>
					<ul>
						<li><a class="<?php echo ($menu["new_article"]); ?>" href="<?php echo U('Article/add');?>">Write a new Article</a></li>
						<li><a class="<?php echo ($menu["manage_article"]); ?>" href="<?php echo U('Article/index');?>">Manage Articles</a></li>
						<li><a class="<?php echo ($menu["manage_draft"]); ?>" href="<?php echo U('Article/draft');?>">Manage Drafts</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Image Gallery
					</a>
					<ul>
						<li><a href="#">Upload Images</a></li>
						<li><a href="#">Manage Galleries</a></li>
						<li><a href="#">Manage Albums</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Events Calendar
					</a>
					<ul>
						<li><a href="#">Calendar Overview</a></li>
						<li><a href="#">Add a new Event</a></li>
						<li><a href="#">Calendar Settings</a></li>
					</ul>
				</li>			 
				
			</ul> <!-- End #main-nav -->
					
		</div>
	</div> <!-- End #sidebar -->
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Manager Articles</h2>
			<p class="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
			
	<li><a class="shortcut-button" href="<?php echo U('Memo/add');?>"><span>
		<img src="__PUBLIC__/Images/admin/icons/pencil_48.png" alt="icon" /><br />
		Create a Memo
	</span></a></li>
	
	<li><a class="shortcut-button" href="<?php echo U('Article/add');?>"><span>
		<img src="__PUBLIC__/Images/admin/icons/paper_content_pencil_48.png" alt="icon" /><br />
		Write an Article
	</span></a></li>
	
	<li><a class="shortcut-button" href="#"><span>
		<img src="__PUBLIC__/Images/admin/icons/image_add_48.png" alt="icon" /><br />
		Upload an Image
	</span></a></li>
	
	<li><a class="shortcut-button" href="#"><span>
		<img src="__PUBLIC__/Images/admin/icons/clock_48.png" alt="icon" /><br />
		Add an Event
	</span></a></li>
	
	<li><a class="shortcut-button" href="#messages" rel="modal"><span>
		<img src="__PUBLIC__/Images/admin/icons/comment_48.png" alt="icon" /><br />
		Open Modal
	</span></a></li>
	
</ul><!-- End .shortcut-buttons-set -->

<div class="clear"></div> <!-- End .clear -->
			
			<div class="notification information png_bg">
				<a href="#" class="close"><img src="__PUBLIC__/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
				<div>
					Here is the existing articles
				</div>
			</div>
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3><?php echo ($list_type); ?></h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
						
						<form  action="<?php echo U('Article/delete');?>" method="post">
						<table>
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Title</th>
								   <th>Author</th>
								   <th>CreateTime</th>
								   <th>LastModifyTime</th>
								   <th>Action</th>
								</tr>
							</thead>
						    <tbody>
								<?php if(is_array($article_list)): foreach($article_list as $key=>$article): ?><tr>
									<td><input type="checkbox" name="ids[]" value="<?php echo ($article["id"]); ?>" /></td>
									<td><?php echo ($article["title"]); ?></td>
									<td><?php echo ($article["author"]); ?></td>
									<td><?php echo ($article["createTime"]); ?></td>
									<td><?php echo ($article["lastModifyTime"]); ?></td>
									<td>
										<!-- Icons -->
										 <a href="__URL__/<?php echo ($edit_func); ?>/id/<?php echo ($article["id"]); ?>" title="Edit" style="margin-right:10px;"><img src="__PUBLIC__/Images/admin/icons/pencil.png" alt="Edit" /></a>
										 <a href="__URL__/delete/id/<?php echo ($article["id"]); ?>" title="Delete" onclick="if(confirm('确定删除?')==false) return false;">
										 <img src="__PUBLIC__/Images/admin/icons/cross.png" alt="Delete" /></a> 
									</td>
								</tr><?php endforeach; endif; ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<input id="multi_delete" type="submit" class="button" value="Batch delete">
										</div>
										
										<div class="pagination">
											<?php echo ($pagination); ?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							
						</table>
						</form>
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			

			<div id="footer">
				<small> <!-- Remove this notice or replace it with whatever you want -->
						&#169; Copyright 2009 Your Company | Powered by <a href="http://themeforest.net/item/simpla-admin-flexible-user-friendly-admin-skin/46073">Simpla Admin</a> | <a href="#">Top</a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
	</div>
	</body>
</html>