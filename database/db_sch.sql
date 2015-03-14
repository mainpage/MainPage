-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 02 月 28 日 07:40
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `db_sch`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_article`
--

CREATE TABLE `think_article` (
  `id` int(11) NOT NULL auto_increment,
  `author` varchar(15) NOT NULL,
  `title` varchar(50) NOT NULL,
  `createTime` datetime NOT NULL,
  `lastModifyTime` datetime NOT NULL,
  `content` mediumtext NOT NULL,
  `abstract` varchar(256) NOT NULL,
  `isSubmitted` int(1) NOT NULL,
  `categoryId` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=113 ;

--
-- 导出表中的数据 `think_article`
--

INSERT INTO `think_article` (`id`, `author`, `title`, `createTime`, `lastModifyTime`, `content`, `abstract`, `isSubmitted`, `categoryId`) VALUES
(101, 'sch', '修改控制器结构', '2015-02-08 00:19:13', '2015-02-16 19:09:50', '<p><span style="font-family:黑体, simhei">1.IndexAction改为ArticleAction，与原ActicleAction合并</span></p><p><span style="font-family:黑体, simhei">2.写新的IndexAction(快捷方式，网站介绍等)</span></p><p><span style="font-family:黑体, simhei">3.一个控制器（Action）实现一个模块，每个Action中的function实现一个功能，如展示页面(向tpl填充数据)，增删查改等</span></p>', '1.IndexAction改为ArticleAction，与原ActicleAction合并', 1, 0),
(49, 'sch', '为什么计算机使用补码来表示和存储数据？', '0000-00-00 00:00:00', '2015-02-16 19:10:28', '<p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">关于原码、反码和补码的知识，大学期间少说也有3门课学过，可是一直没有深入地去理解它们，也不知道当时是怎么读的书<img src="http://img.baidu.com/hi/face/i_f10.gif" border="0" hspace="0" vspace="0" />。。。那么</span><span style="font-family:黑体, simhei">到底为什么要采用补码来表示和存储数值呢？为什么不使用原码或反码呢？</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="color:#333333;font-family:黑体, simhei;background-color:#ffffff">我们知道，计算机</span><span style="font-family:黑体, simhei"><span style="color:#333333;background-color:#ffffff">中的符号数有三种表示方法，即</span></span><span style="font-family:黑体, simhei;color:#333333;background-color:#ffffff">原码</span><span style="font-family:黑体, simhei;color:#333333;background-color:#ffffff">、</span><a target="_blank" href="http://baike.baidu.com/view/742694.htm" style="color:#136ec2;font-family:黑体, simhei;font-size:14px;text-indent:28px;text-decoration:none;background-color:#ffffff;"><span style="color:#333333;font-size:16px">反码</span></a><span style="font-family:黑体, simhei"><span style="color:#333333;background-color:#ffffff">和补码。</span><span style="color:#333333;background-color:#ffffff">三种表示方法均有符号位和数值位两部分，符号位都是用0表示&quot;正&quot;，用1表示&quot;负&quot;，而数值位，三种表示方法各不相同:</span></span><br /></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">1.原码：数值位与无符号数相同；</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">2.反码：对原码数值部分按位取反；</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">3.补码：在反码基础上加1。补码中没有-0，如10表示的是-2，因此补码能够比原码和反码多表示一个数。</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">假设我们使用原码来进行数值计算：显然正数相加是很容易实现的，只需要判断溢出即可(负数相加与之类似)，因此重点是如何实现减法运算。对原码来说，要实现两数相减，必须先判断它们绝对值的大小，然后以绝对值大的为被减数，绝对值小的为减数，求出差值，并以被减数的符号作为结果的符号。显然，这个过程是十分麻烦的，而且需要设计减法电路及数值比较电路。而我们知道，计算机的运算器是只有加法器的，而正是因为使用了补码，使得减法运算可以方便地转换为加法运算。</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">其实补码的原理很简单，以时钟为例，假如现在是7点，我想要将指针拨到4点，有两种方式可以做到：一是把指针往回拨3格，即7-3=4；二是把指针向前拨9格，7+9=16，超出12的&quot;进位&quot;舍去，即16-12=4。这里，时钟的计量范围是0-11，可以认为其&quot;模&quot;为12，则9即为3关于模12的补数，在舍弃进位的情况下，减去一个数即相当于加上该数的补数，这正是补码的由来。负数的补码与其原码相加(不包括符号位)，得到的正是对应的模，也就是进位基数(这也是补码等于反码加1的原因)。同时，由于补数之间实际上是同余的，对补码再次求补得到的就是其原码。</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei">上面的分析说明，补码能够简单有效地将减法转换为加法，且求补运算本身也十分简单。进一步可以发现，在补码运算过程中不需要单独考虑符号位，符号位可以同时参与运算--将两个补码的符号位与数值部分的进位相加，得到的和就是运算结果的符号。仍以模12为例，对于7-3来说，-3补码的数值部分为9，7+9必然产生进位，而两数符号位之和为1，最终结果的符号为+，正是我们所希望的；同理，对于3-7来说，-7补码的数值部分为5，3+5不会产生进位，而符号位之和为1，最终结果的符号为-。</span></p><p style="white-space:normal;text-indent:2em;line-height:1.5em;"><span style="font-family:黑体, simhei"><span id="_baidu_bookmark_start_6" style="display:none;line-height:0px;">﻿</span></span><span id="_baidu_bookmark_start_8" style="display:none;line-height:0px;">﻿</span><span style="font-family:黑体, simhei">至此我们可以归纳出以下几点结论：</span></p><p style="line-height:1.5em;"><span style="font-family:黑体, simhei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="_baidu_bookmark_start_58" style="display:none;line-height:0px;">﻿</span></span><span id="_baidu_bookmark_start_60" style="display:none;line-height:0px;">﻿</span><span style="font-family:黑体, simhei">1.二进制数原码的定义</span><span id="_baidu_bookmark_end_13" style="font-family:黑体, simhei">﻿</span><span id="_baidu_bookmark_end_11" style="font-family:黑体, simhei">﻿</span><span id="_baidu_bookmark_end_61" style="display:none;line-height:0px;">﻿</span><span id="_baidu_bookmark_end_11" style="font-family:黑体, simhei"><span id="_baidu_bookmark_end_59" style="display:none;line-height:0px;">﻿</span></span></p><p style="line-height:1.5em;"><span style="font-family:黑体, simhei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="_baidu_bookmark_start_44" style="display:none;line-height:0px;">﻿</span></span><span id="_baidu_bookmark_start_46" style="display:none;line-height:0px;">﻿</span><span style="font-family:黑体, simhei">二进制数的原码是在它的数值前面设置一位符号位而得到的。正数的符号位是0，负数的符号位是1。</span><span id="_baidu_bookmark_end_47" style="display:none;line-height:0px;">﻿</span><span style="font-family:黑体, simhei"><span id="_baidu_bookmark_end_45" style="display:none;line-height:0px;">﻿</span></span><span id="_baidu_bookmark_end_17" style="font-family:黑体, simhei">﻿</span><span id="_baidu_bookmark_end_15" style="font-family:黑体, simhei">﻿</span></p><p><span style="font-family:黑体, simhei">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span id="_baidu_bookmark_start_18" style="font-family:黑体, simhei">﻿</span><span id="_baidu_bookmark_start_20" style="font-family:黑体, simhei">﻿</span><span style="font-family:黑体, simhei">2.二进制数补码的定义</span><span style="font-family:黑体, simhei"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family:黑体, simhei;font-size:16px">&nbsp;&nbsp;</span></span><span style="font-family:黑体, simhei">正数的补码与原码相同。</span><span id="_baidu_bookmark_end_3" style="display:none;line-height:0px;">﻿</span><span style="font-family:黑体, simhei"><span style="font-family:黑体, simhei;font-size:16px"><span id="_baidu_bookmark_end_1" style="display:none;line-height:0px;">﻿</span></span><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;负数的补码可以通过将每一位数值求反，然后在最低位加１而得到（符号位保持不变）。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.两个二进制数的加、减运算都可以用它们的补码相加来实现，得到的运算结果也是补码形式。<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.进一步的分析表明，在将两个数的补码相加时，如果将两个补码的符号位和数值部分产生的进位相加，则得到的和就是两个二进制数相加后代数和的符号。</span><span id="_baidu_bookmark_end_21" style="font-family:黑体, simhei">﻿</span><span id="_baidu_bookmark_end_19" style="font-family:黑体, simhei">﻿</span><span style="font-family:黑体, simhei">&nbsp;</span><span id="_baidu_bookmark_end_9" style="display:none;line-height:0px;">﻿</span><span id="_baidu_bookmark_end_7" style="display:none;line-height:0px;">﻿</span></p><p><br /></p>', '关于原码、反码和补码的知识，大学期间少说也有3门课学过，可是一直没有深入地去理解它们，也不知道当时是怎么读的书。。。那么到底为什么要采用补码来表示和存储数值呢？为什么不使用原码或反码呢？', 1, 0),
(91, 'sch', '未命名', '2015-02-07 00:00:00', '2015-02-16 19:15:04', '<p>这是一个未命名文章</p>', '这是一个未命名文章', 1, 0),
(108, 'sch', 'simpla article', '2015-02-16 19:14:15', '2015-02-24 21:53:44', '<p>This&nbsp;is&nbsp;a&nbsp;draft</p>', 'This&nbsp;is&nbsp;a&nbsp;draft', 0, 0),
(102, 'sch', '直言天下第一事疏—海瑞', '2015-02-08 15:48:48', '2015-02-16 19:26:06', '<p><span style="font-family:宋体, simsun;font-size:18px;">户部</span><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">云南</span><span style="font-family:宋体, simsun;font-size:18px;">清吏司</span><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">主事臣海瑞谨奏；为直言天下第一事，以正君道、明臣职，求万世治安事。</span><br /></p><p><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">君者，天下臣民万物之主也。惟其为天下臣民万物之主，责任至重。</span></p><p><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">臣受国厚恩矣，请执有犯无隐之义，美曰美，不一毫虚美；过曰过，不一毫讳过。不为悦谀，不暇过计，谨披沥肝胆为陛下言之。</span></p><p><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">富有四海，不曰民之脂膏在是也，而侈兴土木。二十余年不视朝，纲纪驰矣。</span></p><p><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">陛下破产礼佛日甚，室如县罄，十余年来极矣。天下因即陛下改元之号而臆之曰：“嘉靖者言家家皆净而无财用也。”</span></p><p><span style="color:#333333;font-family:宋体, simsun;font-size:18px;background-color:#FFFFFF;">天下之人不直陛下久矣。</span></p>', '户部云南清吏司主事臣海瑞谨奏；为直言天下第一事，以正君道、明臣职，求万世治安事。', 1, 3),
(104, 'sch', '李伯伯要当红军', '2015-02-09 01:07:19', '2015-02-16 19:27:00', '<p>李伯伯要当红军</p><p>红军不要那伯伯</p><p>因为李伯伯的屁股大</p><p>容易被鬼子发现目标</p>', '李伯伯要当红军', 1, 3),
(98, 'sch', 'saber', '2015-02-07 22:22:08', '2015-02-16 19:12:54', '<p>亚瑟王</p>', '亚瑟王', 1, 0),
(109, 'sch', '图片测试', '2015-02-19 17:58:15', '2015-02-19 17:58:15', '<p><img src="/thinkphpTest/ueditor/server/upload/uploadimages/41591423315630.jpg" border="0" hspace="0" vspace="0" /><br /></p>', '', 1, 0),
(106, 'sch', '乒乓', '2015-02-16 16:30:20', '2015-02-16 16:30:20', '<p><span style="font-family:隶书, simli;font-size:24px;">血有铁的味道</span></p><p><span style="font-family:隶书, simli;font-size:24px;">我的血有铁的味道</span></p>', '', 1, 3),
(107, 'sch', 'test substr', '2015-02-16 16:49:48', '2015-02-16 16:51:07', '<p>php</p><p>substr</p>', '<p>php</p>...', 1, 0),
(110, 'sch', '[转载]再谈PHP单引号和双引号区别', '2015-02-19 20:22:40', '2015-02-19 20:22:40', '<div class="postBody" style="margin:0px 0px 5px;padding:0px 15px;font-size:13.9200000762939px;font-family:微软雅黑;white-space:normal;background-color:#ffffff;"><div id="cnblogs_post_body" style="margin:0px 0px 30px;padding:0px;overflow:auto;"><p style="margin:10px auto;padding:0px;">关于单引号和双引号的区别和效率问题。很多朋友了解的不是很清楚，一直以为PHP中单引号和双引号是互通的，直到有一天，发现单引号和双引号出现错误的时候才去学习研究。所以今天再拿出来谈谈他们的区别，希望大家不要再为此困惑。<br style="margin:0px;padding:0px;" />”&nbsp;”&nbsp;双引号里面的字段会经过编译器解释，然后再当作HTML代码输出。<br style="margin:0px;padding:0px;" />‘&nbsp;‘&nbsp;单引号里面的不进行解释，直接输出。<br style="margin:0px;padding:0px;" />从字面意思上就可以看出，单引号比双引号要快了。<br style="margin:0px;padding:0px;" />例如：<br style="margin:0px;padding:0px;" />$abc=‘my&nbsp;name&nbsp;is&nbsp;tom’;<br style="margin:0px;padding:0px;" />echo&nbsp;$abc&nbsp;//结果是:my&nbsp;name&nbsp;is&nbsp;tom<br style="margin:0px;padding:0px;" />echo&nbsp;‘$abc’&nbsp;//结果是:$abc<br style="margin:0px;padding:0px;" />echo&nbsp;“$abc”&nbsp;//结果是:my&nbsp;name&nbsp;is&nbsp;tom<br style="margin:0px;padding:0px;" />特别在使用MYSQL语句的时候，双引号和单引号的用法让新手不知所措，在这里，举个例子，来进行说明。<br style="margin:0px;padding:0px;" />假设查询条件中使用的是常量，例如：<br style="margin:0px;padding:0px;" />select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name=’abc’;<br style="margin:0px;padding:0px;" />SQL语句可以写成:<br style="margin:0px;padding:0px;" />SQLstr&nbsp;=&nbsp;“select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user&nbsp;_name=&nbsp;‘abc’”&nbsp;;<br style="margin:0px;padding:0px;" />假设查询条件中使用的是变量，例如：<br style="margin:0px;padding:0px;" />$user_name&nbsp;=&nbsp;$_REQUEST[&#39;user_name&#39;];&nbsp;//字符串变量<br style="margin:0px;padding:0px;" />或<br style="margin:0px;padding:0px;" />$user=array&nbsp;(”name”=&gt;&nbsp;$_REQUEST[&#39;user_name‘,&quot;age&quot;=&gt;$_REQUEST[&#39;age&#39;];//数组变量<br style="margin:0px;padding:0px;" />SQL语句就可以写成：<br style="margin:0px;padding:0px;" />SQLstr&nbsp;=&nbsp;“select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name&nbsp;=&nbsp;‘&nbsp;”&nbsp;.&nbsp;$user_name&nbsp;.&nbsp;”&nbsp;‘&nbsp;“;<br style="margin:0px;padding:0px;" />SQLstr&nbsp;=&nbsp;“select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name&nbsp;=&nbsp;‘&nbsp;”&nbsp;.&nbsp;$user[&quot;name&quot;]&nbsp;.&nbsp;”&nbsp;‘&nbsp;“;<br style="margin:0px;padding:0px;" />对比一下:<br style="margin:0px;padding:0px;" />SQLstr=”select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name&nbsp;=&nbsp;‘&nbsp;abc&nbsp;‘&nbsp;”&nbsp;;<br style="margin:0px;padding:0px;" />SQLstr=”select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name&nbsp;=’&nbsp;”&nbsp;.&nbsp;$user&nbsp;_name&nbsp;.&nbsp;”&nbsp;‘&nbsp;“;<br style="margin:0px;padding:0px;" />SQLstr=”select&nbsp;*&nbsp;from&nbsp;abc_table&nbsp;where&nbsp;user_name&nbsp;=’&nbsp;”&nbsp;.&nbsp;$user[&quot;name&quot;]&nbsp;.&nbsp;”&nbsp;‘&nbsp;“;<br style="margin:0px;padding:0px;" />SQLstr可以分解为以下3个部分:<br style="margin:0px;padding:0px;" />1：”select&nbsp;*&nbsp;from&nbsp;table&nbsp;where&nbsp;user_name&nbsp;=&nbsp;‘&nbsp;”&nbsp;//固定SQL语句<br style="margin:0px;padding:0px;" />2：$user&nbsp;//变量<br style="margin:0px;padding:0px;" />3：”&nbsp;‘&nbsp;”<br style="margin:0px;padding:0px;" />1,2,3部分字符串之间用”.”&nbsp;来连接<br style="margin:0px;padding:0px;" /><br /></p><p style="margin:10px auto;padding:0px;">====</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">一.首先想想PHP里所有的单词(其实应该叫符号)有几类.</strong></p><p style="margin:10px auto;padding:0px;">&nbsp;</p><p style="margin:10px auto;padding:0px;">1.PHP,mysql两方的关键词与函数.例如echo,print,mysql_connect等等.这些肯定不加引号的.</p><p style="margin:10px auto;padding:0px;">2.常量.新手可能用得不多,常量的好处是全局性,穿透函数.速度也快些不过新手可以暂时不管常量这玩意儿.</p><p style="margin:10px auto;padding:0px;">3.变量.前面带&quot;$&quot;号的就是变量.可以为变量设一个&quot;值&quot;,例如一串字符,一个数字,逻辑(真/假)值等.也可以表示一组值(数组,对象等)</p><p style="margin:10px auto;padding:0px;">4.值.通常要给常量与变量设置值.赋值语句$a=\\&#39;abc\\&#39;中,右边的\\&#39;abc\\&#39;即为值.</p><p style="margin:10px auto;padding:0px;">5.函数的参数(在括号里的).可以是常量,变量,值三种.</p><p style="margin:10px auto;padding:0px;">变量(常量)与值的关系正如下列各种情况.</p><p style="margin:10px auto;padding:0px;">&quot;颜色&quot;与&quot;红&quot;,</p><p style="margin:10px auto;padding:0px;">&quot;长度&quot;与100,</p><p style="margin:10px auto;padding:0px;">&quot;日期&quot;与2007年10月25号&quot;</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">二.什么情况下用PHP引号</strong></p><p style="margin:10px auto;padding:0px;">其实只有第4项&quot;值&quot;需要用到引号,函数的里也只有值要用引号.并且只有字符串(日期值可以当成字符串)内容需要用到引号.数字(可用可不用),真假(不能用)例外.</p><p style="margin:10px auto;padding:0px;">例子</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">三.单引号与双引号的区别</strong></p><p style="margin:10px auto;padding:0px;">一般情况下两者是通用的.但双引号内部变量会解析,单引号则不解析.</p><p style="margin:10px auto;padding:0px;">例子</p><p style="margin:10px auto;padding:0px;">所以如果内部只有纯字符串的时候,用单引号(速度快),内部有别的东西(如变量)的时候,用双号引更好点.</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">四.字符串内部如果出现PHP引号怎么办--关于转义.</strong></p><p style="margin:10px auto;padding:0px;">比如我们想输出:&nbsp;我&quot;是\\&#39;天才</p><p style="margin:10px auto;padding:0px;">这时候就必须用到转义了.转义即把本来有作用的符号转成无意义的字符.</p><p style="margin:10px auto;padding:0px;">这样就正常了,因为号把它后面的任何字符都转成无意义的符号.在这里来说,PHP解析器根本没把号后面的引号当成引号来看待.</p><p style="margin:10px auto;padding:0px;">同样的,还可以转义分号,$符号等特殊符号.</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">五.字符串的连接.</strong></p><p style="margin:10px auto;padding:0px;">这是个麻烦的问题.一般来说,变量值,直接包含在双引号中就可以了.另外字符串的叠加用&quot;.&quot;字符.</p><p style="margin:10px auto;padding:0px;">在复杂的情况里可以用大括号来包含,PHP便知道这是一个完整的东西,里面的引号不会影响到外面的引号关系.</p><p style="margin:10px auto;padding:0px;">与html的混合也很简单,最好养成HTML中全部用双引号,PHP中尽量用单引号的习惯.这样方便把大段的HTML代码复制过来,只要头尾加上单引号就是一个正确的字符串了.几百行的HTML代码也不用担心PHP引号错乱.</p><p style="margin:10px auto;padding:0px;"><strong style="margin:0px;padding:0px;">总结一下PHP引号使用原则</strong></p><p style="margin:10px auto;padding:0px;">1.字符串的值用引号</p><p style="margin:10px auto;padding:0px;">2.PHP中尽量用单引号,HTML代码全部用双引号</p><p style="margin:10px auto;padding:0px;">3.在包含变量的时候,用双引号可以简化操作</p><p style="margin:10px auto;padding:0px;">4.复杂的情况下用大括号包起来</p><p style="margin:10px auto;padding:0px;">PHP引号还有一个用处就是，有的时候需要用php生成文本文件，换行符\\n需要用双引号才能好使，单引号则会直接把\\n当成字符输出。</p><p style="margin:10px auto;padding:0px;"><br /></p><p style="margin:10px auto;padding:0px;">原文：<a href="http://www.cnblogs.com/llsun/archive/2012/07/16/2593027.html" target="_self" title="再谈PHP单引号和双引号区别">http://www.cnblogs.com/llsun/archive/2012/07/16/2593027.html</a></p></div></div>', '关于单引号和双引号的区别和效率问题。很多朋友了解的不是很清楚，一直以为PHP中单引号和双引号是互通的，直到有一天，发现单引号和双引号出现错误的时候才去学习研究。所以今天再拿出来谈谈他们的区别，希望大家不要再为此困惑。”&nbsp;”&nbsp;双引号里面的字段会经过编译器解释，然后再当作HTML代码输出。‘&nbsp;‘&nbsp;单引号里面的不进行解释，直接输出。从字面意思上就可以看出，单引号比双引号要快了。例如：$abc=‘my&nbsp;name&nbsp;is&nbsp;tom’;echo&nbsp', 1, 2),
(111, 'sch', 'category测试', '2015-02-20 00:34:12', '2015-02-20 00:34:12', '<p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><img src="http://img.baidu.com/hi/jx2/j_0013.gif" border="0" hspace="0" vspace="0" style="white-space:normal;" /><br /></p><p><br /></p><p><br /></p><p><br /></p>', '', 1, 0),
(112, 'sch', '世界末日', '2015-02-23 22:27:54', '2015-02-23 22:27:54', '<p>天灰灰会不会让我忘了你是谁</p>', '天灰灰会不会让我忘了你是谁', 1, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_category`
--

CREATE TABLE `think_category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  PRIMARY KEY  (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `think_category`
--

INSERT INTO `think_category` (`categoryId`, `categoryName`) VALUES
(0, '未分类'),
(1, '机器学习'),
(2, '编程'),
(3, '读书');

-- --------------------------------------------------------

--
-- 表的结构 `think_memo`
--

CREATE TABLE `think_memo` (
  `id` int(11) NOT NULL auto_increment,
  `keyword` varchar(50) NOT NULL,
  `content` mediumtext NOT NULL,
  `author` varchar(20) NOT NULL,
  `createTime` datetime NOT NULL,
  `lastModifyTime` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 导出表中的数据 `think_memo`
--

INSERT INTO `think_memo` (`id`, `keyword`, `content`, `author`, `createTime`, `lastModifyTime`) VALUES
(6, 'js不起作用', 'new memo页面js不起作用', 'sch', '2015-02-10 23:17:11', '2015-02-11 00:02:08'),
(8, '一块红布', '那天是你用一块红布，蒙住我双眼也蒙住了天', 'sch', '2015-02-11 00:12:24', '2015-02-11 00:12:24'),
(9, 'git', '基本语句又忘了\r\npush pull fork ', 'sch', '2015-02-11 00:13:19', '2015-02-11 00:13:19'),
(10, 'cookie', 'cookie只能存放字符串\r\nthinkphp框架cookie作用域默认为当前action模块，需使用‘/’设置为本域名有效，如setcookie(''login_user'',$login_user,time()+3600,''/'');', 'sch', '2015-02-11 20:06:56', '2015-02-11 20:06:56'),
(11, 'ThinkPHP中initialize和construct的区别', 'thinkphp中子类的_initialize方法自动调用父类的_initialize方法；而php的构造函数_construct，如果要调用父类的方法，必须在子类构造函数显示调用parent::__construct();', 'sch', '2015-02-11 20:53:46', '2015-02-19 21:44:19'),
(12, 'php函数', 'php函数声明中不需要写返回值，由return的内容决定 ', 'sch', '2015-02-16 19:01:16', '2015-02-16 19:05:16'),
(13, '瀑布流', '使用现有插件实现', 'sch', '2015-02-17 21:29:43', '2015-02-17 21:29:43'),
(14, '测试瀑布流', '我到底在写前端还是后端？哪边都没深入地学啊！后面先写几篇博客，然后看一下数据库的知识', 'sch', '2015-02-18 00:48:14', '2015-02-18 00:48:14'),
(15, '测试瀑布流', '再写一段', 'sch', '2015-02-18 00:49:03', '2015-02-18 00:49:03'),
(16, '累', '快一点了，该睡觉了', 'sch', '2015-02-18 00:49:26', '2015-02-18 00:49:26'),
(17, 'thinkphp join', '连接字段不能重名，否则会比较麻烦。因此，id字段最好加上前缀，如articleId，categoryId等', 'sch', '2015-02-20 01:21:21', '2015-02-20 01:21:21'),
(18, '这是一段测试语句', '这是一段测试语句\r\n这是一段测试语句\r\n这是一段测试语句', 'sch', '2015-02-20 01:30:49', '2015-02-20 01:30:49'),
(19, '这是一段测试语句', '这是一段测试语句\r\n这是一段测试语句\r\n这是一段测试语句这是一段测试语句\r\n', 'sch', '2015-02-20 01:31:07', '2015-02-20 01:31:07'),
(20, '这是一段测试语句', '这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句', 'sch', '2015-02-20 01:31:19', '2015-02-20 01:31:19'),
(21, '这是一段测试语句', '这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句', 'sch', '2015-02-20 01:31:27', '2015-02-20 01:31:27'),
(22, '这是一段测试语句', '这是一段测试语句这是一段测试语句', 'sch', '2015-02-20 01:31:33', '2015-02-20 01:31:33'),
(23, '这是一段测试语句', '这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句', 'sch', '2015-02-20 01:31:41', '2015-02-20 01:31:41'),
(24, '这是一段测试语句', '这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句这是一段测试语句', 'sch', '2015-02-20 01:31:49', '2015-02-20 01:31:49'),
(25, '这是一段测试语句', '这是一段测试语句', 'sch', '2015-02-20 01:31:54', '2015-02-20 01:31:54');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(11) NOT NULL auto_increment,
  `userName` char(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `authority` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 导出表中的数据 `think_user`
--

INSERT INTO `think_user` (`id`, `userName`, `email`, `password`, `authority`) VALUES
(17, 'sch', 'sch1123@163.com', '2cfd4560539f887a5e420412b370b361', 0),
(18, 'hehe', '1123@sch.com', '2cfd4560539f887a5e420412b370b361', 1);
