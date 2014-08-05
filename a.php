
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<HTML dir='ltr' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b' xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>
<head>
<!-- +1 your website -->
<script src='https://apis.google.com/js/plusone.js' type='text/javascript'></script>
<!-- end +1 your website -->
<meta content='YofDGWtx6FLkhIPq3QlhVsRZHAWQ67_1r8cuO6YtNrs' name='google-site-verification'/>
<meta content='A0E70C073D09F3BFF0047A3BBDF0AA93' name='msvalidate.01'/>
<meta content='Latest Code - Programming Help: Add or remove list box items dynamically in javascript' name='Description'/>
<meta content='Add or remove list box items dynamically in javascript, free programming tutorial, easy to learn, free code samples,training, learning, study validation examples, live demos,PHP and JavaScript programming with MySQL ' name='keywords'/>
<meta content='Duminda Chamara' name='author'/>
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
<script type="text/javascript">(function() { var b=window,f="chrome",g="tick",k="jstiming";(function(){function d(a){this.t={};this.tick=function(a,d,c){var e=void 0!=c?c:(new Date).getTime();this.t[a]=[e,d];if(void 0==c)try{b.console.timeStamp("CSI/"+a)}catch(h){}};this[g]("start",null,a)}var a;b.performance&&(a=b.performance.timing);var n=a?new d(a.responseStart):new d;b.jstiming={Timer:d,load:n};if(a){var c=a.navigationStart,h=a.responseStart;0<c&&h>=c&&(b[k].srt=h-c)}if(a){var e=b[k].load;0<c&&h>=c&&(e[g]("_wtsrt",void 0,c),e[g]("wtsrt_","_wtsrt",h),e[g]("tbsd_","wtsrt_"))}try{a=null,
        b[f]&&b[f].csi&&(a=Math.floor(b[f].csi().pageT),e&&0<c&&(e[g]("_tbnd",void 0,b[f].csi().startE),e[g]("tbnd_","_tbnd",c))),null==a&&b.gtbExternal&&(a=b.gtbExternal.pageT()),null==a&&b.external&&(a=b.external.pageT,e&&0<c&&(e[g]("_tbnd",void 0,b.external.startE),e[g]("tbnd_","_tbnd",c))),a&&(b[k].pt=a)}catch(p){}})();b.tickAboveFold=function(d){var a=0;if(d.offsetParent){do a+=d.offsetTop;while(d=d.offsetParent)}d=a;750>=d&&b[k].load[g]("aft")};var l=!1;function m(){l||(l=!0,b[k].load[g]("firstScrollTime"))}b.addEventListener?b.addEventListener("scroll",m,!1):b.attachEvent("onscroll",m);
    })();</script>
<meta content='blogger' name='generator'/>
<link href='http://www.latestcode.net/favicon.ico' rel='icon' type='image/x-icon'/>
<link href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html' rel='canonical'/>
<link rel="alternate" type="application/atom+xml" title="Latest Code - Programming Help - Atom" href="http://www.latestcode.net/feeds/posts/default" />
<link rel="alternate" type="application/rss+xml" title="Latest Code - Programming Help - RSS" href="http://www.latestcode.net/feeds/posts/default?alt=rss" />
<link rel="service.post" type="application/atom+xml" title="Latest Code - Programming Help - Atom" href="http://www.blogger.com/feeds/7126589561612455473/posts/default" />

<link rel="alternate" type="application/atom+xml" title="Latest Code - Programming Help - Atom" href="http://www.latestcode.net/feeds/8813626944911503359/comments/default" />
<!--[if IE]> <script> (function() { var html5 = ("abbr,article,aside,audio,canvas,datalist,details," + "figure,footer,header,hgroup,mark,menu,meter,nav,output," + "progress,section,time,video").split(','); for (var i = 0; i < html5.length; i++) { document.createElement(html5[i]); } try { document.execCommand('BackgroundImageCache', false, true); } catch(e) {} })(); </script> <![endif]-->
<TITLE>Latest Code - Programming Help: Add or remove list box items dynamically in javascript</TITLE>
<link type='text/css' rel='stylesheet' href='https://www.blogger.com/static/v1/widgets/3841957138-widget_css_bundle.css' />
<link type='text/css' rel='stylesheet' href='https://www.blogger.com/dyn-css/authorization.css?targetBlogID=7126589561612455473&zx=18db50e1-2308-4289-8d62-4ac034ab5f00' />
<style id='page-skin-1' type='text/css'><!--
/*
-----------------------------------------------
Blogger Template Style
Name:     Minima Stretch
Date:     26 Feb 2004
Modified By Duminda Chamara 2009-12-31 20:54
----------------------------------------------- */
/* Variable definitions
====================
<Variable name="bgcolor" description="Page Background Color"
type="color" default="#fff">
<Variable name="textcolor" description="Text Color"
type="color" default="#333">
<Variable name="linkcolor" description="Link Color"
type="color" default="#58a">
<Variable name="pagetitlecolor" description="Blog Title Color"
type="color" default="#666">
<Variable name="descriptioncolor" description="Blog Description Color"
type="color" default="#999">
<Variable name="titlecolor" description="Post Title Color"
type="color" default="#c60">
<Variable name="bordercolor" description="Border Color"
type="color" default="#ccc">
<Variable name="sidebarcolor" description="Sidebar Title Color"
type="color" default="#999">
<Variable name="sidebartextcolor" description="Sidebar Text Color"
type="color" default="#666">
<Variable name="visitedlinkcolor" description="Visited Link Color"
type="color" default="#999">
<Variable name="bodyfont" description="Text Font"
type="font" default="normal normal 100% Georgia, Serif">
<Variable name="headerfont" description="Sidebar Title Font"
type="font"
default="normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif">
<Variable name="pagetitlefont" description="Blog Title Font"
type="font"
default="normal normal 200% Georgia, Serif">
<Variable name="descriptionfont" description="Blog Description Font"
type="font"
default="normal normal 78% 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif">
<Variable name="postfooterfont" description="Post Footer Font"
type="font"
default="normal normal 78% 'Trebuchet MS', Trebuchet, Arial, Verdana, Sans-serif">
<Variable name="startSide" description="Start side in blog language"
type="automatic" default="left">
<Variable name="endSide" description="End side in blog language"
type="automatic" default="right">
*/
/* Use this with templates/template-twocol.html */
body {
    background: #000;
    margin: 0;
    color: #333;
    font: x-small Georgia Serif;
    font-size: small;
    font-size: small;
    text-align: center;
}
a:link {
    color: #58A;
    text-decoration: none;
}
a:visited {
    color: #999;
    text-decoration: none;
}
a:hover {
    color: #C60;
    text-decoration: underline;
}
a img { border-width: 0 }
#header-wrapper { margin: 0 2% 10px }
#header {
    margin: 5px;
    text-align: center;
    color: #666;
    border-top: #630 ipx thin;
}
#header-inner {
    background-position: center;
    margin-left: auto;
    margin-right: auto;
}
#header h1 {
    margin: 5px 5px 0;
    padding: 15px 20px .25em;
    line-height: 1.2em;
    text-transform: uppercase;
    letter-spacing: .2em;
    font: normal normal 200% Georgia,Serif;
}
#header a {
    color: #666;
    text-decoration: none;
}
#header a:hover { color: #666 }
#header .description {
    margin: 0 5px 5px;
    padding: 0 20px 15px;
    text-transform: uppercase;
    letter-spacing: .2em;
    line-height: 1.4em;
    font: normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif;
    color: #999;
    text-align: center;
}
#header img {
    margin-left: auto;
    margin-right: auto;
}
#outer-wrapper {
    margin: 20px auto 10px auto;
    width: 84%;
}
#main-wrapper {
    margin-left: 2%;
    width: 70%;
    float: left;
    display: inline;
    word-wrap: break-word;
    overflow: hidden;
}
#sidebar-wrapper {
    padding-top: 5px;
    margin-right: 2%;
    width: 23%;
    float: right;
    display: inline;
    word-wrap: break-word;
    overflow: hidden;
}
h2 {
    margin: 1.5em 0 .75em;
    font: normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif;
    line-height: 1.4em;
    text-transform: uppercase;
    letter-spacing: .2em;
    color: #999;
}
h2.date-header {
    margin: 1.5em 0 .5em;
    font-family: Arial,Helvetica,sans-serif;
    font-size: 11px;
}
.post {
    font-family: Verdana,Arial,Helvetica,sans-serif;
    margin: .5em 0 1.5em;
    border-bottom: 1px dotted #CCC;
    padding-bottom: 1.5em;
}
.post h3 {
    margin: .25em 0 0;
    padding: 0 0 4px;
    font-size: 140%;
    font-weight: normal;
    line-height: 1.4em;
    color: #C60;
    text-align: left;
}
.post h3 a,
.post h3 a:visited,
.post h3 strong {
    display: block;
    text-decoration: none;
    color: #C60;
    font-weight: normal;
}
.post h3 strong,
.post h3 a:hover { color: #36F }
.post-body {
    margin: 0 0 .75em;
    line-height: 1.6em;
}
.post-body blockquote { line-height: 1.3em }
.post-footer {
    margin: .75em 0;
    color: #999;
    text-transform: uppercase;
    letter-spacing: .1em;
    font: normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif;
    line-height: 1.4em;
}
.comment-link { margin-left: .6em }
.post img {
    padding: 4px;
    border: 1px solid #CCC;
}
.post blockquote { margin: 1em 20px }
.post blockquote p { margin: .75em 0 }
#comments{
    font-family:Verdana, Geneva, sans-serif;
    background-color: #FBFBFB;
    background-position: 8px 11px;
    border: 1px solid #C0C0CF;
    border-radius: 5px 5px 5px 5px;
    margin: 25px 0;
    padding: 10px 10px 10px 30px;
}
#comments h4 {
    margin: 1em 0;
    font-weight: bold;
    line-height: 1.4em;
    text-transform: uppercase;
    letter-spacing: .2em;
    color: #800000;
    font-size:16px;
}
#comments-block {
    margin: 1em 0 1.5em;
    line-height: 1.6em;
}
#comments-block .comment-author {
    margin: .5em 0;
    text-align:left;
    font-size:15px;
    font-weight:bold;
    font-style:italic;
    border: 1px solid #C0C0CF;
    border-bottom:none;
    padding:5px;
    background-image:url(http://2.bp.blogspot.com/-ljQYH7Vyl3U/ULDUJQQ5CdI/AAAAAAAAB5w/BX8wYSaGoM8/s1600/comment-pencil.png);
    background-repeat:no-repeat;
    background-position:right;
    background-color:#f3f3f3;}
#comments-block .comment-body {
    margin: .25em 0 0;
    border: 1px solid #C0C0CF;
    margin-top:-9px!important;
    margin-left:0px;
}
#comments-block .comment-body p{
    padding:5px;
}
#comments-block .comment-footer {
    margin: -.25em 0 2em;
    line-height: 1.4em;
    text-transform: uppercase;
    letter-spacing: .1em;
    padding-top:7px;
    text-align:right;
    font-size:11px;
    margin-top:-25px;
}
#comments-block .comment-body p { margin: 0 0 .75em;font-size:12px; }
.deleted-comment {
    font-style: italic;
    color: gray;
}
.feed-links {
    clear: both;
    line-height: 2.5em;
}
#blog-pager-newer-link { float: left }
#blog-pager-older-link { float: right }
#blog-pager { text-align: center }
.sidebar {
    color: #666;
    line-height: 1.5em;
}
.sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
.sidebar li {
    margin: 0;
    padding-top: 0;
    padding-right: 0;
    padding-bottom: .25em;
    padding-left: 15px;
    text-indent: -15px;
    line-height: 1.5em;
}
.sidebar .widget,
.main .widget {
    border-bottom: 1px dotted #CCC;
    margin: 0 0 1.5em;
    padding: 0 0 1.5em;
}
.main .Blog { border-bottom-width: 0 }
.profile-img {
    float: left;
    margin-top: 0;
    margin-right: 5px;
    margin-bottom: 5px;
    margin-left: 0;
    padding: 4px;
    border: 1px solid #CCC;
}
.profile-data {
    margin: 0;
    text-transform: uppercase;
    letter-spacing: .1em;
    font: normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif;
    color: #999;
    font-weight: bold;
    line-height: 1.6em;
}
.profile-datablock { margin: .5em 0 .5em }
.profile-textblock {
    margin: .5em 0;
    line-height: 1.6em;
}
.profile-link {
    font: normal normal 78% 'Trebuchet MS',Trebuchet,Arial,Verdana,Sans-serif;
    text-transform: uppercase;
    letter-spacing: .1em;
}
#footer {
    width: 660px;
    clear: both;
    margin: 0 auto;
    padding-top: 15px;
    line-height: 1.6em;
    text-transform: uppercase;
    letter-spacing: .1em;
    text-align: center;
}
#main_content_area {
    vertical-align: middle;
    margin-left: 20px;
}
#blog_post {
    font-family: Georgia,Serif;
    font-size: 100%;
    font-size-adjust: none;
    font-style: normal;
    font-variant: normal;
    font-weight: normal;
    line-height: normal;
    text-align: left;
}
#yellow_heading {
    background: #FFFFEA none repeat scroll 0 0;
    text-align: center;
    border-bottom: #0076EC solid 2px;
    border-top: #0076EC solid 2px;
    border-left: #0076EC solid 2px;
    border-right: #0076EC solid 2px;
}
#green_heading {
    background: #E6FFE6 none repeat scroll 0 0;
    text-align: justify;
    border: 1px solid #0076EC;
    padding-left: 5px;
    padding-bottom: 5px;
    padding-right: 5px;
    padding-top: 5px;
}
#blue_heading {
    background: #DFEFFF none repeat scroll 0 0;
    text-align: center;
    border-bottom: #0076EC solid 2px;
    border-top: #0076EC solid 2px;
    border-left: #0076EC solid 2px;
    border-right: #0076EC solid 2px;
}
#post_description {
    margin-top: 10px;
    margin-bottom: 5px;
    margin-right: inherit;
    margin-left: inherit;
    font-family: Georgia,"Times New Roman",Times,serif;
    font-size: 16px;
    text-align: justify;
}
#post_content {
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    text-align: left;
}
#code_example {
    font-family: Geneva,Arial,Helvetica,sans-serif;
    font-size: 14px;
    text-align: left;
    border-bottom: #CCC 1px solid;
    border-top: #CCC 1px solid;
    border-left: #CCC 1px solid;
    border-right: #CCC 1px solid;
    padding-left: 10px;
    padding-right: 10px;
    color: #39F;
}
#demo_example {
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    padding-left: 5px;
    padding-right: 5px;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    text-align: left;
    border-bottom: #360 1px solid;
    border-top: #360 1px solid;
    border-left: #360 1px solid;
    border-right: #360 1px solid;
}
#demo_example_code {
    margin-top: 5px;
    margin-left: 5px;
    margin-right: 5px;
    margin-bottom: 5px;
    border-bottom: #FC0 1px dotted;
    border-top: #FC0 1px dotted;
    border-left: #FC0 1px dotted;
    border-right: #FC0 1px dotted;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
}
h1 { font-size: 18px }
h2 {
    font-size: 16px;
    text-align: left;
    text-transform: none;
}
h3 { font-size: 14PX }
h4 { font-size: 12PX }
p {
    font-size: 11px;
    font-style: normal;
    text-align: justify;
    padding-left: 5px;
}
p.code {
    font-size: 13px;
    word-spacing: 2px;
}
p.left { text-align: left }
.blue_high {
    font-size: 14px;
    color: #60F;
    font-weight: bold;
}
.brown_code_js {
    font-style: italic;
    font-size: 13px;
    word-spacing: 2px;
    color: #562C2C;
}
.example_description {
    font-style: normal;
    font-size: 13px;
    word-spacing: 2px;
    color: #004F75;
}
.js_usage_code {
    font-size: 13px;
    word-spacing: 2px;
    color: #FF8448;
}
.demo_title {
    font-family: Georgia,"Times New Roman",Times,serif;
    color: #00C462;
}
#site_map {
    border-bottom: #630 1px solid;
    border-top: #630 1px solid;
    border-left: #630 1px solid;
    border-right: #630 1px solid;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 12px;
    padding-top: 5px;
}
#sitemap_tr1 {
    background-color: #E8FFE8;
    border-top: #630 1px solid;
    padding-left: 25px;
    padding-top: 2px;
    padding-bottom: 2px;
}
#sitemap_tr2 {
    background-color: #FFFFEC;
    border-top: #630 1px solid;
    padding-left: 25px;
    padding-top: 2px;
    padding-bottom: 2px;
}
#sitemap_footer {
    background: #DFEFFF none repeat scroll 0 0;
    text-align: center;
    border-bottom: #0076EC solid 2px;
    border-top: #0076EC solid 2px;
    border-left: #0076EC solid 2px;
    border-right: #0076EC solid 2px;
}
input,
select,
button,
textarea {
    border: 1px solid #A25151;
    color: #000;
    font-family: Verdana,Arial,Helvetica,sans-serif;
    font-size: 11px;
    font-style: normal;
    padding-left: 3px;
}
.round_border * {
    background: #FFF;
    display: block;
    height: 1px;
    overflow: hidden;
}
.round_border_layer3 {
    background: #C4C4C4;
    border-left: 1px solid #D3D4D5;
    border-right: 1px solid #D3D4D5;
    margin: 0 3px;
    padding: 0 1px;
}
.round_border_layer2 {
    border-left: 1px solid #D3D4D5;
    border-right: 1px solid #D3D4D5;
    margin: 0 2px;
    padding: 0;
}
.round_border_layer1 {
    border-left: 1px solid #C4C4C4;
    border-right: 1px solid #C4C4C4;
    margin: 0 1px;
}
.round_border_content {
    border-left: 1px solid #C4C4C4;
    border-right: 1px solid #C4C4C4;
    background: #FFF;
    overflow: hidden;
    padding: 4px 10px;
    *zoom: 1;
    *padding-bottom: .5em;
}
#report_nav_div {
    float: left;
    display: block;
    width: 100%;
}
/*-----------------------------------------------------*/
.table_blue_border {
    border-top: 1px solid #3366CC;
    border-left: 1px solid #3366CC;
}
.table_blue_th {
    background-color: #E5ECF9;
    border: 1px solid #3366CC;
    font-weight: bold;
    padding: 6px 12px;
    text-align: left;
}
.table_blue_td {
    background-color: #F9FCFF;
    border-right: 1px solid #3366CC;
    border-bottom: 1px solid #3366CC;
    font-weight: 200;
    padding: 3px 6px;
    text-align: left;
    width: 550px;
    overflow: auto;
    text-align: justify;
}
.html_code_sample_dark {
    font-family: Geneva, Arial, Helvetica, sans-serif;
    font-size: 12px;
    text-align: left;
    color: #005500;
    font-style: italic;
}
#cc_unported_license{
    font-family:Verdana, Geneva, sans-serif;
    background-color: #FBFBFB;
    background-position: 8px 11px;
    border: 1px solid #C0C0CF;
    border-radius: 5px 5px 5px 5px;
    margin: 25px 0;
    padding: 10px 10px 10px 30px;
    text-align:justify;
}
#PopularPosts1{
    font-family:Verdana, Geneva, sans-serif;
    background-color: #FBFBFB;
    background-position: 8px 11px;
    border: 1px solid #C0C0CF;
    border-radius: 5px 5px 5px 5px;
    margin: 25px 0;
    padding: 10px 10px 10px 30px;
}
#PopularPosts1 h2{
    font-family:"Comic Sans MS", cursive;
    font-size:14px;
    text-align:left;
}
#PopularPosts1 .item-title{
    text-align:left;
}
#PopularPosts1 .item-snippet{
    text-align:justify;
}
#Profile1{
    font-family:Verdana, Geneva, sans-serif;
    background-color: #FBFBFB;
    background-position: 8px 11px;
    border: 1px solid #C0C0CF;
    border-radius: 5px 5px 5px 5px;
    margin: 25px 0;
    padding: 10px 10px 10px 30px;
}
#blue_link {
    color: #3300FF;
    text-decoration: underline;
}
/*---------------2011-07-10------------------------------------*/
#my_example_wrapper {
    background-color: #797979;
    padding-top: 10px;
}
#my_example {
    font-family: Verdana, Arial, Helvetica, sans-serif;
    border: #000000 double thin;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #EAEAEA;
}
#my_example_inner {
    border: #B1B163 dashed thin;
    margin-left: 2px;
    margin-right: 2px;
    margin-bottom: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    background-color: #F5F5F5;
    display: table;
    width: 95%;
}
#my_code_example {
    border: #C0C0C0 double;
    background-color: #FFFFFF;
    overflow-y: scroll;
    overflow-x: hidden;
    height: 120px;
    max-height: 200px;
    padding-left: 5px;
    width: 100%;
}
.code_wrapper { list-style: none }
.code_left {
    float: left;
    width: 45%;
}
.code_right {
    float: left;
    width: 55%;
}
.code_left_right {
    float: left;
    width: 100%;
}
.php_tag { color: #F00 }
.php_blue { color: #0000FF }
.php_green { color: #339900 }
.php_variable { color: #660000 }
.php_comment { color: #F60 }
.php_string { color: #FF4646 }
.php_constant { color: #300 }
.blog_description_h2{
    font-family:Tahoma, Geneva, sans-serif;
    font-size:16px;
    font-weight:bold;
    color:#000000;
}
.blog_description_para{
    font-family:Tahoma, Geneva, sans-serif;
    font-size:14px;
    text-align:justify;
}
.blog_description_ul{
    font-family:Tahoma, Geneva, sans-serif;
    font-size:14px;
}
.jump-link{
    font-size:18px;
}
.jump-link a{
    color:#F00;
}
/*----2013-05-31-------------------------------------------------*/
.blog_drop_down{
    width: 150px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    height: 25px;
    line-height: 25px;
    display: inline-block;
    padding: 4px 6px;
    margin-bottom: 10px;
    color: #555555;
    vertical-align: middle;
    border-radius: 4px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: normal;
    font-size:12px;
    cursor: pointer;
    white-space: pre;
}
.blog_drop_down:hover{
    background-color:#FFF5EC;
}
.blog_submit_button{
    color: #ffffff;
    background-color: #2f96b4;
    background-position: 0 -15px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    display: inline-block;
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 15px;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 4px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    box-sizing: border-box;
    border-color: #2f96b4 #2f96b4 #1f6377;
}
.code_preview{
    font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
    font-size:12px;
    border: 1px solid #0099CC;
    margin-left:10px;
    padding-left:10px;
    background-color:#FFFFEC;
}

--></style>
<script type="text/javascript">var a="indexOf",b="&m=1",e="(^|&)m=",f="?",g="?m=1";function h(){var c=window.location.href,d=c.split(f);switch(d.length){case 1:return c+g;case 2:return 0<=d[1].search(e)?null:c+b;default:return null}}var k=navigator.userAgent;if(-1!=k[a]("Mobile")&&-1!=k[a]("WebKit")&&-1==k[a]("iPad")||-1!=k[a]("Opera Mini")||-1!=k[a]("IEMobile")){var l=h();l&&window.location.replace(l)};
</script><script type="text/javascript">
    if (window.jstiming) window.jstiming.load.tick('headEnd');
</script></head>
<body>
<div class='navbar section' id='navbar'>
</div>
<DIV id='outer-wrapper'>
<B class='round_border'>
    <B class='round_border_layer3'></B>
    <B class='round_border_layer2'></B>
    <B class='round_border_layer1'></B>
</B>
<DIV class='round_border_content'>
<DIV id='wrap2'>
<!-- skip links for text browsers -->
<SPAN id='skiplinks' style='display:none;'>
<A href='#main'>skip to main </A> |
      <A href='#sidebar'>skip to sidebar</A>
</SPAN>
<DIV id='header-wrapper'>
    <B class='round_border'>
        <B class='round_border_layer3'></B>
        <B class='round_border_layer2'></B>
        <B class='round_border_layer1'></B>
    </B>
    <DIV class='round_border_content'>
        <div class='header section' id='header'><div class='widget Header' id='Header1'>
                <DIV id='header-inner'>
                    <DIV class='titlewrapper'>
                        <H1 class='title'>
                            <A href='http://www.latestcode.net/'>Latest Code - Programming Help</A>
                        </H1>
                    </DIV>
                    <DIV class='descriptionwrapper'>
                        <P class='description'><SPAN>JavaScript form validation, JavaScript free tutorial, how learn php and mySQL, programming with php, how to validate, JavaScript and php free tutorial, JavaScript and php examples, how to connect mySQL database with php. An interesting way to learn php and JavaScript for beginners</SPAN></P>
                    </DIV>
                </DIV>
            </div></div>
    </DIV>
    <B class='round_border'>
        <B class='round_border_layer1'></B>
        <B class='round_border_layer2'></B>
        <B class='round_border_layer3'></B>
    </B>
</DIV>
<DIV id='content-wrapper'>
<DIV id='crosscol-wrapper' style='text-align:center'>
    <div class='crosscol section' id='crosscol'><div class='widget HTML' id='HTML4'>
            <div class='widget-content'>
                <!-- Visitor Count-->
                <img style="margin-left:75%" src="http://analytics.nanoexe.com/images/visitors.jpg" border="0" alt="Duminda Chamara" title="Programming Help Visitors" />
                <!--End visitor Count-->
            </div>
            <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML4&action=editWidget&sectionId=crosscol' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML4"));' target='configHTML4' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
            <div class='clear'></div>
        </div><div class='widget HTML' id='HTML2'>
            <DIV class='widget-content'>
                <div id="cse-search-results"></div>
                <script type="text/javascript">
                    var googleSearchIframeName = "cse-search-results";
                    var googleSearchFormName = "cse-search-box";
                    var googleSearchFrameWidth = 800;
                    var googleSearchDomain = "www.google.lk";
                    var googleSearchPath = "/cse";
                </script>
                <script src="http://www.google.com/afsonline/show_afs_search.js" type="text/javascript"></script>
            </DIV>
            <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML2&action=editWidget&sectionId=crosscol' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML2"));' target='configHTML2' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
            <div class='clear'></div>
        </div><div class='widget HTML' id='HTML3'>
            <div class='widget-content'>
                <div style="font-family:Geneva, Arial, Helvetica, sans-serif;font-size:14px;color:#660000;text-align:left;vertical-align:top;" >

                    |&nbsp;<a href="http://hostinghelper.blogspot.com/" target="_blank">Web Hosting Help</a>&nbsp;|

                </div>
            </div>
            <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML3&action=editWidget&sectionId=crosscol' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML3"));' target='configHTML3' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
            <div class='clear'></div>
        </div></div>
</DIV>
<DIV id='main-wrapper'>
<div class='main section' id='main'><div class='widget Blog' id='Blog1'>
<DIV class='blog-posts hfeed'>
<!-- google_ad_section_start(name=default) -->
<H2 class='date-header'>Sunday, July 10, 2011</H2>
<DIV class='post hentry uncustomized-post-template'>
<A name='8813626944911503359'></A>
<H3 class='post-title entry-title'>
    <A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html'>Add or remove list box items dynamically in javascript</A>
</H3>
<DIV class='post-header-line-1'></DIV>
<DIV class='post-body entry-content'>
<div id="blog_post"><script type="text/javascript">function addNewListItem(section){var listBoxName,listBoxValue,listBoxDisplayText;switch(section){case 1:{listBoxName='selectYear';listValue='txtYearValue';listBoxDisplayText='txtYearDisplayValue';}break;case 2:{listBoxName='selectAnimal';listValue='txtAnimalValue';listBoxDisplayText='txtAnimalDisplayText';}break;case 3:{listBoxName='selectEvenNumbers';listValue='txtEvenNumberValue';listBoxDisplayText='txtEvenNumberDisplayText';}break;} var listBox= document.getElementById(listBoxName);var listValue=document.getElementById(listValue);var listDisplayText=document.getElementById(listBoxDisplayText); if(isEmpty(listValue,'Enter option value')==false){return false;}if(isEmpty(listDisplayText,'Enter option display text')==false){return false;} if(section==3){if(isNaN(listValue.value)||(listValue.value%2!=0)){alert('Please enter an even number');listValue.select();listValue.focus();return false;}if(isNaN(listDisplayText.value)||(listDisplayText.value%2!=0)){alert('Please enter an even number');listDisplayText.select();listDisplayText.focus();return false;}}if(isListValueExists(listBox,listValue.value,1)==false){if(isListValueExists(listBox,listDisplayText.value,2)==false){ addNewOption(listBox,listValue,listDisplayText);}else{alert('Display text already exists');listDisplayText.select();listDisplayText.focus();return false;}}else{alert('Value already exists');listValue.select();listValue.focus();return false;}}function isEmpty(textBox,message){if(textBox.value==''){alert(message);textBox.focus();return false;}else{return true;}}function addNewOption(listBox,listValue,displayText){var selectBoxOption = document.createElement("option");selectBoxOption.value = listValue.value;selectBoxOption.text = displayText.value;listBox.add(selectBoxOption, null);alert("Option has been added successfully");return true;}function isListValueExists(dropDown,value,type){var optionExists=false;for(var x=0;x<dropDown.options.length;x++){if(type==1){if(value.toLowerCase()==dropDown.options[x].value.toLowerCase()){optionExists=true;break;}}else if(type==2){if(value.toLowerCase()==dropDown.options[x].text.toLowerCase()){optionExists=true;break;}}}return optionExists;}function removeListItem(action){var listBoxName='selectyears';var msg='year';if(action==1){ listBoxName='selectyears'; msg='year';}else if(action==2){listBoxName='selectCountries';msg='country';}else if(action==3){listBoxName='selectMobilePhones';msg='Mobile Phone';} var listBox = document.getElementById(listBoxName);var indexToRemove=listBox.options.selectedIndex;if(listBox.options.length==0){if(confirm('You have removed all list box items\nDo you want continue again?')){window.location=window.location.href;return true;}else{alert('Please refresh the web page to continue');return false;}}if(listBox.options[indexToRemove].value=='s'){ if(listBox.options.length==1){if(confirm('You have removed all list box items\nDo you want continue again?')){window.location=window.location.href;return true;}else{ alert('Please refresh the web page to continue');return false;}}alert('Slect a '+msg+' to remove'); listBox.focus();return false;}else{listBox.remove(indexToRemove); if(listBox.options.length>0){listBox.options[0].selected=true;}alert('The option has been removed successfully');listBox.focus();return true;}}function removeMultipleOptions(){var listBox=document.getElementById("selectMultipleCountries");if(listBox.options.length==0){if(confirm('You have removed all list box items\nDo you want continue again?')){window.location=window.location.href;return true;}else{alert('Please refresh the web page to continue');return false;}}var removedOptionCount=0; var valuesToBeRemoved=Array();for(var x=0;x<listBox.options.length;x++){if(listBox.options[x].selected==true){ valuesToBeRemoved.push(listBox.options[x].value); }}for(var j=0;j<valuesToBeRemoved.length;j++){ removedOptionCount+=removeListItemOneByOne(listBox,valuesToBeRemoved[j]);}if(removedOptionCount==0){alert('Please select one or more items to remove');listBox.focus();return false;}else{alert(removedOptionCount+' option(s) have been removed successfully');return true;}} function in_array(element,array){var found=false;for(var x=0;x<array.length;x++){if(array[x]==element){found=true;break;}}return found;}function removeListItemOneByOne(listBox,valueToRemove){ var removed=0;for(var i=0;i<listBox.options.length;i++){if(listBox.options[i].value==valueToRemove){listBox.remove(i);removed=1;break;}}return removed;}function moveToRightOrLeft(side){ var listLeft=document.getElementById('selectLeft');var listRight=document.getElementById('selectRight');if(side==1){if(listLeft.options.length==0){ if(confirm('You have already moved all countries to Right\nDo you want continue again?')){window.location=window.location.href;return true;}else{alert('Please refresh the web page to continue');return false;}}else{var selectedCountry=listLeft.options.selectedIndex;move(listRight,listLeft.options[selectedCountry].value,listLeft.options[selectedCountry].text);listLeft.remove(selectedCountry);if(listLeft.options.length>0){listLeft.options[0].selected=true;}}}else if(side==2){if(listRight.options.length==0){ if(confirm('You have already moved all countries to Left\nDo you want continue again?')){window.location=window.location.href;return true;}else{alert('Please refresh the web page to continue');return false;}}else{var selectedCountry=listRight.options.selectedIndex;move(listLeft,listRight.options[selectedCountry].value,listRight.options[selectedCountry].text);listRight.remove(selectedCountry);if(listRight.options.length>0){listRight.options[0].selected=true;}}} } function move(listBoxTo,optionValue,optionDisplayText){ var newOption = document.createElement("option"); newOption.value = optionValue; newOption.text = optionDisplayText; listBoxTo.add(newOption, null); return true; }</script><!--Post Heading--><div id="yellow_heading"><h1>How to add or remove list box items dynamically using JavaScript </h1></div><!--End Post Heading--><!--Post Description--><br />
<div id="post_description">Following example shows you how to <span class="blue_high">add or remove list items in HTML option element </span> in JavaScript <br />
</div><!--End Post Description--><br />
<!--green notice--><div id="my_example_wrapper"><form id="listBox" name="listBox" method="post" action=""><div id="my_example"><p>In some occasions you may want to add one or more options to HTML select box/list box and some times remove items from a HTML dropdown/list box. You can use a simple JavaScript code to add/remove options from a HTML select element. following examples describe how to dynamically change items in a dropdown box.</p><h4>1. How to Add elements/options to a list box dynamically using JavaScript?</h4><p>Example : Add options/items to a list box/dropdown box/list menu in javaScript You can add any item to the dropdown box but you can't duplicate list items.</p><div id="my_example_inner"><table border="0" align="left"><tr><td align="right">Year</td><td align="left"><select name="selectYear" id="selectYear"><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option></select></td></tr>
            <tr><td align="right">Option Value</td><td align="left"><input name="txtYearValue" type="text" id="txtYearValue" /></td></tr>
            <tr><td align="right">Option Display Text</td><td align="left"><input name="txtYearDisplayValue" type="text" id="txtYearDisplayValue" /></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input name="btnAddItem" type="button" id="btnAddItem" value="Add Option" onclick="javascript:addNewListItem(1);" /></td></tr>
        </table><div id="my_code_example"><h4>Example code for add new option to HTML select element </h4><p>&lt;HTML xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;<br />
                &lt;head&gt;<br />
                &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=iso-8859-1&quot; /&gt;<br />
                &lt;title&gt;Add Option Items &lt;/title&gt;<br />
                &lt;script type=&quot;text/javaScript&quot;&gt;<br />
                function addNewListItem(){<br />
                var htmlSelect=document.getElementById('selectYear');<br />
                var optionValue=document.getElementById('txtYearValue');<br />
                var optionDisplaytext=document.getElementById('txtYearDisplayValue');<br />
                <br />
                if(optionValue.value==''||isNaN(optionValue.value)){<br />
                alert('please enter option value');<br />
                optionValue.focus();<br />
                return false;<br />
                }<br />
                if(optionDisplaytext.value==''||isNaN(optionDisplaytext.value)){<br />
                alert('please enter option display text');<br />
                optionDisplaytext.focus();<br />
                return false;<br />
                }<br />
                if(isOptionAlreadyExist(htmlSelect,optionValue.value)){<br />
                alert('Option value already exists');<br />
                optionValue.focus();<br />
                return false;<br />
                }<br />
                if(isOptionAlreadyExist(htmlSelect,optionDisplaytext.value)){<br />
                alert('Display text already exists');<br />
                optionDisplaytext.focus();<br />
                return false;<br />
                }<br />
                var selectBoxOption = document.createElement(&quot;option&quot;);<br />
                selectBoxOption.value = optionValue.value;<br />
                selectBoxOption.text = optionDisplaytext.value;<br />
                htmlSelect.add(selectBoxOption, null); <br />
                alert(&quot;Option has been added successfully&quot;);<br />
                return true;<br />
                <br />
                }<br />
                function isOptionAlreadyExist(listBox,value){<br />
                var exists=false;<br />
                for(var x=0;x&lt;listBox.options.length;x++){<br />
                if(listBox.options[x].value==value || listBox.options[x].text==value){ <br />
                exists=true;<br />
                break;<br />
                }<br />
                }<br />
                return exists;<br />
                }<br />
                &lt;/script&gt;<br />
                &lt;/head&gt;</p><p>&lt;body&gt;<br />
                &lt;table border=&quot;0&quot; align=&quot;left&quot;&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;Year&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;select name=&quot;selectYear&quot; id=&quot;selectYear&quot;&gt;<br />
                &lt;option value=&quot;2000&quot;&gt;2000&lt;/option&gt;<br />
                &lt;option value=&quot;2001&quot;&gt;2001&lt;/option&gt;<br />
                &lt;option value=&quot;2002&quot;&gt;2002&lt;/option&gt;<br />
                &lt;option value=&quot;2003&quot;&gt;2003&lt;/option&gt;<br />
                &lt;option value=&quot;2004&quot;&gt;2004&lt;/option&gt;<br />
                &lt;/select&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;Option Value&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;txtYearValue&quot; type=&quot;text&quot; id=&quot;txtYearValue&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;Option Display Text&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;txtYearDisplayValue&quot; type=&quot;text&quot; id=&quot;txtYearDisplayValue&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;btnAddItem&quot; type=&quot;button&quot; id=&quot;btnAddItem&quot; value=&quot;Add Option&quot; onclick=&quot;javaScript:addNewListItem();&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;/table&gt;<br />
                &lt;/body&gt;<br />
                &lt;/HTML&gt;<br />
            </p></div></div><div id="my_example_inner"><table border="0"><tr><td colspan="2">Example 2:</td></tr>
            <tr><td align="right">Animal</td><td align="left"><select name="selectAnimal" id="selectAnimal"><option value="Dog">Dog</option><option value="Cat">Cat</option><option value="Cow">Cow</option><option value="Rat">Rat</option></select></td></tr>
            <tr><td align="right">Option Value</td><td align="left"><input name="txtAnimalValue" type="text" id="txtAnimalValue" /></td></tr>
            <tr><td align="right">Option Display Text</td><td align="left"><input name="txtAnimalDisplayText" type="text" id="txtAnimalDisplayText" /></td></tr>
            <tr><td>&nbsp;</td><td align="left"><input name="btnAddAnimal" type="button" id="btnAddAnimal" value="Add Option" onclick="javascript:addNewListItem(2);" /></td></tr>
        </table><div id="my_code_example"><p>Copy and paste above code and modify it to add string values <br />
                <br />
                <strong>How to check option already exists or not?</strong><br />
                <br />
                function isOptionAlreadyExist(listBox,value){<br />
                var exists=false;<br />
                for(var x=0;x&lt;listBox.options.length;x++){<br />
                if(listBox.options[x].value==value || listBox.options[x].text==value){ <br />
                exists=true;<br />
                break;<br />
                }<br />
                }<br />
                return exists;<br />
                }</p></div></div><div id="my_example_inner"><table border="0"><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            <tr>   <td colspan="2">Example 3:Add numbers to a listbox.</td></tr>
            <tr><td align="right">Even Numbers</td><td align="left"><select name="selectEvenNumbers" size="6" id="selectEvenNumbers"><option value="2">2</option><option value="4">4</option><option value="1024">1024</option><option value="8">8</option><option value="10">10</option><option value="12">12</option></select></td></tr>
            <tr><td align="right">Option Value</td><td align="left"><input name="txtEvenNumberValue" type="text" id="txtEvenNumberValue" /></td></tr>
            <tr><td align="right">Option Display Text</td><td align="left"><input name="txtEvenNumberDisplayText" type="text" id="txtEvenNumberDisplayText" /></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input name="btnAddEvenNumbers" type="button" id="btnAddEvenNumbers" value="Add Even number" onclick="javascript:addNewListItem(3);"/></td></tr>
            <tr><td align="right" colspan="2" style="height:62px;"><p><script type="text/javascript">google_ad_client = "ca-pub-3128630725558105";google_ad_slot = "3077385329";google_ad_width = 728;google_ad_height = 90;</script><script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></p></td></tr>
        </table><div id="my_code_example"><p><strong>How to add new option to a HTML select element? </strong><br />
                <br />
                var htmlSelect = document.createElement(&quot;selectAnimals&quot;);//HTML select box <br />
                var optionValue=document.getElementById('txtValue');<br />
                var optionDisplaytext=document.getElementById('txtDisplayValue'); <br />
                <br />
                var selectBoxOption = document.createElement(&quot;option&quot;);//create new option <br />
                selectBoxOption.value = optionValue.value;//set option value <br />
                selectBoxOption.text = optionDisplaytext.value;//set option display text <br />
                htmlSelect.add(selectBoxOption, null);//add created option to select box. </p></div></div></div><div id="my_example"><h4>2. How to remove options/items from listbox dynamically using JavaScript?</h4><p>Example 1 : Remove options/items from a list box/dropdown box/list menu </p><div id="my_example_inner"><table border="0"><tr>   <td colspan="2">Example 1:</td></tr>
            <tr><td align="right">Select a year to remove</td>    <td align="left"><select name="selectyears" id="selectyears"><option value="s">Select Year</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option></select></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input name="btnRemoveItem" type="button" id="btnRemoveItem" value="Remove Selected item" onclick="javascript:removeListItem(1);" /></td></tr>
            <tr><td colspan="2" align="right"><p><script type="text/javascript">google_ad_client = "ca-pub-3128630725558105";google_ad_slot = "1425476394";google_ad_width = 468;google_ad_height = 15;</script><br />
                        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></p></td></tr>
        </table><div id="my_code_example"><h4>Example code for remove list items from a HTML select element</h4><p>&lt;HTML xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;<br />
                &lt;head&gt;<br />
                &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=iso-8859-1&quot; /&gt;<br />
                &lt;title&gt;Remove Select Options &lt;/title&gt;<br />
                &lt;script type=&quot;text/javaScript&quot;&gt;<br />
                function removeListItem(){<br />
                var htmlSelect=document.getElementById('selectYear');<br />
                <br />
                if(htmlSelect.options.length==0){<br />
                alert('You have removed all options');<br />
                return false;<br />
                }<br />
                var optionToRemove=htmlSelect.options.selectedIndex;<br />
                htmlSelect.remove(optionToRemove);<br />
                alert('The selected option has been removed successfully');<br />
                return true;<br />
                }<br />
                &lt;/script&gt;<br />
                &lt;/head&gt;</p><p>&lt;body&gt;<br />
                &lt;table border=&quot;0&quot; align=&quot;left&quot;&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;select a year to remove &lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;select name=&quot;selectYear&quot; id=&quot;selectYear&quot;&gt;<br />
                &lt;option value=&quot;2000&quot; selected=&quot;selected&quot;&gt;2000&lt;/option&gt;<br />
                &lt;option value=&quot;2001&quot;&gt;2001&lt;/option&gt;<br />
                &lt;option value=&quot;2002&quot;&gt;2002&lt;/option&gt;<br />
                &lt;option value=&quot;2003&quot;&gt;2003&lt;/option&gt;<br />
                &lt;option value=&quot;2004&quot;&gt;2004&lt;/option&gt;<br />
                &lt;/select&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;btnRemoveItem&quot; type=&quot;button&quot; id=&quot;btnRemoveItem&quot; value=&quot;Remove Option&quot; onClick=&quot;javaScript:removeListItem();&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;/table&gt;<br />
                &lt;/body&gt;<br />
                &lt;/HTML&gt;<br />
            </p></div></div><div id="my_example_inner"><table border="0"><tr>   <td colspan="2">Example 2 :Select a country and click on Remove Country button to delete them from the list menu.</td></tr>
            <tr><td align="right">Select a country to remove</td><td align="left"><select name="selectCountries" id="selectCountries"><option value="s">Select a Country</option><option value="AF">Afghanistan</option><option value="AX">&Atilde;&hellip;Land Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua And Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia And Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, The Democratic Republic Of The</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value=" Gg">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island And Mcdonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic Of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle Of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People'S Republic Of</option><option value="KR">Korea, Republic Of</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People'S Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia, The Former Yugoslav Republic Of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States Of</option><option value="MD">Moldova, Republic Of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="PM">Saint Pierre And Miquelon</option><option value="VC">Saint Vincent And The Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="CS">Serbia And Montenegro</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia And The South Sandwich Islands</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard And Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan, Province Of China</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic Of</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks And Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands, British</option><option value="VI">Virgin Islands, U.S.</option><option value="WF">Wallis And Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input type="button" name="Button" value="Remove Country" onclick="javascript:removeListItem(2);" /></td></tr>
            <tr><td align="right" colspan="2"><p><script type="text/javascript">google_ad_client = "ca-pub-3128630725558105";google_ad_slot = "2539879450";google_ad_width = 234;google_ad_height = 60;</script><br />
                        <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></p></td></tr>
        </table><div id="my_code_example"><h4>How to remove list item from list box?</h4><p>var htmlSelect=document.getElementById('selectYear');//HTML select box <br />
                var optionToRemove=htmlSelect.options.selectedIndex;//get the selected index <br />
                htmlSelect.remove(optionToRemove);//remove option from list box </p>
        </div>
    </div>
</div>
<a name='more'></a>
<div id="my_example">
    <h4>3.How to remove options/items from HTML list menu dyanamically using JavaScript?</h4>
    <p>Example 1 : Remove options/items from a dropdown box/list menu. </p><div id="my_example_inner"><table border="0"><tr><td colspan="2">Example 1:</td></tr>
            <tr><td align="right">Select a Mobile Phone to remove</td><td align="left"><select name="selectMobilePhones" size="5" id="selectMobilePhones"><option value="Nokia" selected="selected">Nokia</option><option value="Motorola">Motorola</option><option value="Sony Ericsson">SonyEricsson</option><option value="Micromax">Micromax</option><option value="Apple">Apple</option><option value="Vodaphone">Vodaphone</option><option value="Alcatel">Alcatel</option><option value="Lenovo">Lenovo</option><option value="Samsung">Samsung</option><option value="Blackberry">Blackberry</option><option value="LG">LG</option><option value="Lava">Lava</option><option value="Sony">Sony</option></select></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input name="btnRemovePhone" type="button" id="btnRemovePhone" onclick="javascript:removeListItem(3);" value="Remove Phone" /></td></tr>
            <tr><td colspan="2"><script type="text/javascript">google_ad_client = "ca-pub-3128630725558105";google_ad_slot = "1425476394";google_ad_width = 468;google_ad_height = 15;</script><br />
                    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></td></tr>
        </table><div id="my_code_example"><h4>How to remove items from HTML select menu? </h4><p>&lt;HTML xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;<br />
                &lt;head&gt;<br />
                &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=iso-8859-1&quot; /&gt;<br />
                &lt;title&gt;Untitled Document&lt;/title&gt;<br />
                &lt;script type=&quot;text/javaScript&quot;&gt;<br />
                function removePhoneType(){<br />
                var htmlSelect=document.getElementById('selectMobilePhones');<br />
                <br />
                if(htmlSelect.options.length==0){<br />
                alert('You have already removed all list items');<br />
                return false;<br />
                }<br />
                <br />
                var optionToRemove=htmlSelect.options.selectedIndex;<br />
                htmlSelect.remove(optionToRemove);<br />
                <br />
                if(htmlSelect.options.length&gt;0){<br />
                htmlSelect.options[0].selected=true;<br />
                }<br />
                alert('The selected phone type has been removed successfully');<br />
                return true;<br />
                }<br />
                &lt;/script&gt;<br />
                &lt;/head&gt;</p><p>&lt;body&gt;<br />
                &lt;table border=&quot;0&quot;&gt; <br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;Select a Mobile Phone to remove&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;select name=&quot;selectMobilePhones&quot; size=&quot;5&quot; id=&quot;selectMobilePhones&quot;&gt;<br />
                &lt;option value=&quot;Nokia&quot; selected=&quot;selected&quot;&gt;Nokia&lt;/option&gt;<br />
                &lt;option value=&quot;Motorola&quot;&gt;Motorola&lt;/option&gt;<br />
                &lt;option value=&quot;Sony Ericsson&quot;&gt;SonyEricsson&lt;/option&gt;<br />
                &lt;option value=&quot;Micromax&quot;&gt;Micromax&lt;/option&gt;<br />
                &lt;option value=&quot;Apple&quot;&gt;Apple&lt;/option&gt;<br />
                &lt;option value=&quot;Vodaphone&quot;&gt;Vodaphone&lt;/option&gt;<br />
                &lt;option value=&quot;Alcatel&quot;&gt;Alcatel&lt;/option&gt;<br />
                &lt;option value=&quot;Lenovo&quot;&gt;Lenovo&lt;/option&gt;<br />
                &lt;option value=&quot;Samsung&quot;&gt;Samsung&lt;/option&gt;<br />
                &lt;option value=&quot;Blackberry&quot;&gt;Blackberry&lt;/option&gt;<br />
                &lt;option value=&quot;LG&quot;&gt;LG&lt;/option&gt;<br />
                &lt;option value=&quot;Lava&quot;&gt;Lava&lt;/option&gt;<br />
                &lt;option value=&quot;Sony&quot;&gt;Sony&lt;/option&gt;<br />
                &lt;/select&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;btnRemovePhone&quot; type=&quot;button&quot; id=&quot;btnRemovePhone&quot; onclick=&quot;javaScript:removePhoneType();&quot; value=&quot;Remove Phone&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;/table&gt;<br />
                &lt;/body&gt;<br />
                &lt;/HTML&gt;<br />
            </p></div></div></div><div id="my_example"><h4>4. How to remove multiple options/items from a listbox dynamically using JavaScript?</h4><p>Example 1 : remove multiple options/items from a list menu. You can select more than one item from the drop down box. Use shift key to select multiple items from the list menu.</p><div id="my_example_inner"><table border="0"><tr><td colspan="2">Example 1:</td></tr>
            <tr><td align="right">Select one or more countries to remove</td><td align="left"><select name="selectMultipleCountries" size="10" multiple="multiple" id="selectMultipleCountries"><option value="AF" selected="selected">Afghanistan</option><option value="AX">&Atilde;&hellip;Land Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua And Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia And Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, The Democratic Republic Of The</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value=" Gg">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island And Mcdonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic Of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle Of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People'S Republic Of</option><option value="KR">Korea, Republic Of</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People'S Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia, The Former Yugoslav Republic Of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States Of</option><option value="MD">Moldova, Republic Of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="PM">Saint Pierre And Miquelon</option><option value="VC">Saint Vincent And The Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia/option><option value="SN">Senegal</option><option value="CS">Serbia And Montenegro</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia And The South Sandwich Islands</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard And Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan, Province Of China</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic Of</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks And Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands, British</option><option value="VI">Virgin Islands, U.S.</option><option value="WF">Wallis And Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></td></tr>
            <tr><td align="right">&nbsp;</td><td align="left"><input name="btnRemoveMultipleOptions" type="button" id="btnRemoveMultipleOptions" value="Remove Selected Options" onclick="javascript:removeMultipleOptions();" /></td></tr>
        </table><div id="my_code_example"><h4>How to remove multiple options at once?</h4><p>&lt;HTML xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;<br />
                &lt;head&gt;<br />
                &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=iso-8859-1&quot; /&gt;<br />
                &lt;title&gt;Remove Multiple List Items&lt;/title&gt;<br />
                &lt;script type=&quot;text/javaScript&quot;&gt;<br />
                function removeMultipleOptions(){<br />
                var listBox=document.getElementById(&quot;selectMultipleCountries&quot;);<br />
                if(listBox.options.length==0){ <br />
                alert('You have already removed all list box items');<br />
                return false; <br />
                }<br />
                var removedOptionCount=0; <br />
                var valuesToBeRemoved=Array();<br />
                <br />
                for(var x=0;x&lt;listBox.options.length;x++){<br />
                if(listBox.options[x].selected==true){ <br />
                valuesToBeRemoved.push(listBox.options[x].value); <br />
                }<br />
                }<br />
                <br />
                for(var j=0;j&lt;valuesToBeRemoved.length;j++){<br />
                removedOptionCount+=removeListItemOneByOne(listBox,valuesToBeRemoved[j]);<br />
                }<br />
                <br />
                if(removedOptionCount==0){<br />
                alert('Please select one or more items to remove');<br />
                listBox.focus();<br />
                return false;<br />
                }else{<br />
                alert(removedOptionCount+' option(s) have been removed successfully');<br />
                return true;<br />
                }<br />
                } <br />
                <br />
                function removeListItemOneByOne(listBox,valueToRemove){<br />
                var removed=0;<br />
                for(var i=0;i&lt;listBox.options.length;i++){<br />
                if(listBox.options[i].value==valueToRemove){<br />
                listBox.remove(i);<br />
                removed=1;<br />
                break;<br />
                }<br />
                }<br />
                return removed; <br />
                }<br />
                &lt;/script&gt;<br />
                &lt;/head&gt;</p><p>&lt;body&gt;<br />
                &lt;table border=&quot;0&quot;&gt; &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;Select one or more countries to remove&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;select name=&quot;selectMultipleCountries&quot; size=&quot;10&quot; multiple=&quot;multiple&quot; id=&quot;selectMultipleCountries&quot;&gt;<br />
                &lt;option value=&quot;AF&quot; selected=&quot;selected&quot;&gt;Afghanistan&lt;/option&gt;<br />
                &lt;option value=&quot;AX&quot;&gt;&amp;Atilde;&amp;hellip;Land Islands&lt;/option&gt;<br />
                &lt;option value=&quot;AL&quot;&gt;Albania&lt;/option&gt;<br />
                &lt;option value=&quot;DZ&quot;&gt;Algeria&lt;/option&gt;<br />
                &lt;option value=&quot;AS&quot;&gt;American Samoa&lt;/option&gt;<br />
                &lt;option value=&quot;AD&quot;&gt;Andorra&lt;/option&gt;<br />
                &lt;option value=&quot;AO&quot;&gt;Angola&lt;/option&gt;<br />
                &lt;option value=&quot;AI&quot;&gt;Anguilla&lt;/option&gt;<br />
                &lt;option value=&quot;AQ&quot;&gt;Antarctica&lt;/option&gt;<br />
                &lt;option value=&quot;AG&quot;&gt;Antigua And Barbuda&lt;/option&gt;<br />
                &lt;option value=&quot;AR&quot;&gt;Argentina&lt;/option&gt;<br />
                &lt;option value=&quot;AM&quot;&gt;Armenia&lt;/option&gt;<br />
                &lt;option value=&quot;AW&quot;&gt;Aruba&lt;/option&gt; <br />
                &lt;/select&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;input name=&quot;btnRemoveMultipleOptions&quot; type=&quot;button&quot; id=&quot;btnRemoveMultipleOptions&quot; value=&quot;Remove Selected Options&quot; onclick=&quot;javaScript:removeMultipleOptions();&quot; /&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;/table&gt;<br />
                &lt;/body&gt;<br />
                &lt;/HTML&gt;<br />
            </p></div></div></div><div id="my_example"><h4>5. How to interchange/swap options/items between two list boxes dynamically using JavaScript?</h4><p>Example 1 : Swap options between two HTML select elements. Some times you may need to interchange list items between two drop down menus. You can use following code for swap list items from one select menu to another menu. Select one or more items from left drop down list and click on button to move them to the right. Likewise you can select items from left dropdown menu and move them to the right drop down box.</p><div id="my_example_inner"><table border="0"><tr><td colspan="4">Example 1:</td></tr>
            <tr><td colspan="2">Available Countries </td><td colspan="2">Your Selection </td></tr>
            <tr><td rowspan="3" align="right"><label><select name="selectLeft" size="10" id="selectLeft"><option value="AS" selected="selected">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua And Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia And Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, The Democratic Republic Of The</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Cote D'Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value=" Gg">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island And Mcdonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic Of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle Of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People'S Republic Of</option><option value="KR">Korea, Republic Of</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People'S Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libyan Arab Jamahiriya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia, The Former Yugoslav Republic Of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States Of</option><option value="MD">Moldova, Republic Of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="AN">Netherlands Antilles</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Reunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="SH">Saint Helena</option><option value="KN">Saint Kitts And Nevis</option><option value="LC">Saint Lucia</option><option value="PM">Saint Pierre And Miquelon</option><option value="VC">Saint Vincent And The Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome And Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="CS">Serbia And Montenegro</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia And The South Sandwich Islands</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard And Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan, Province Of China</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic Of</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad And Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks And Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands, British</option><option value="VI">Virgin Islands, U.S.</option><option value="WF">Wallis And Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select></label></td><td align="left">&nbsp;</td><td align="left">&nbsp;</td><td rowspan="3" align="left"><select name="selectRight" size="10" id="selectRight"><option value="AF" selected="selected">Afghanistan</option><option value="AX">&Atilde;&hellip;Land Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option></select></td></tr>
            <tr><td align="left">&nbsp;</td><td align="left"><label><input name="btnRight" type="button" id="btnRight" value="&gt;&gt;" onClick="javascript:moveToRightOrLeft(1);"></label></td></tr>
            <tr><td align="left">&nbsp;</td><td align="left"><label><input name="btnLeft" type="button" id="btnLeft" value="&lt;&lt;" onClick="javascript:moveToRightOrLeft(2);"></label></td></tr>
            <tr><td colspan="4"><script type="text/javascript">google_ad_client = "ca-pub-3128630725558105";google_ad_slot = "2539879450";google_ad_width = 234;google_ad_height = 60;</script><br />
                    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script></td></tr>
        </table><div id="my_code_example"><p><strong>How to swap/interchange list items between two dropdown boxes?</strong><br />
                <br />
                &lt;HTML xmlns=&quot;http://www.w3.org/1999/xhtml&quot;&gt;<br />
                &lt;head&gt;<br />
                &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/HTML; charset=iso-8859-1&quot; /&gt;<br />
                &lt;title&gt;Interchange/Swap List Items&lt;/title&gt;<br />
                &lt;script type=&quot;text/javaScript&quot;&gt;<br />
                function moveToRightOrLeft(side){<br />
                var listLeft=document.getElementById('selectLeft');<br />
                var listRight=document.getElementById('selectRight');<br />
                <br />
                if(side==1){<br />
                if(listLeft.options.length==0){<br />
                alert('You have already moved all countries to Right');<br />
                return false;<br />
                }else{<br />
                var selectedCountry=listLeft.options.selectedIndex;<br />
                <br />
                move(listRight,listLeft.options[selectedCountry].value,listLeft.options[selectedCountry].text);<br />
                listLeft.remove(selectedCountry);<br />
                <br />
                if(listLeft.options.length&gt;0){<br />
                listLeft.options[0].selected=true;<br />
                }<br />
                }<br />
                }else if(side==2){<br />
                if(listRight.options.length==0){<br />
                alert('You have already moved all countries to Left');<br />
                return false;<br />
                }else{<br />
                var selectedCountry=listRight.options.selectedIndex;<br />
                <br />
                move(listLeft,listRight.options[selectedCountry].value,listRight.options[selectedCountry].text);<br />
                listRight.remove(selectedCountry);<br />
                <br />
                if(listRight.options.length&gt;0){<br />
                listRight.options[0].selected=true;<br />
                }<br />
                }<br />
                }<br />
                }<br />
                <br />
                function move(listBoxTo,optionValue,optionDisplayText){<br />
                var newOption = document.createElement(&quot;option&quot;); <br />
                newOption.value = optionValue; <br />
                newOption.text = optionDisplayText; <br />
                listBoxTo.add(newOption, null); <br />
                return true; <br />
                }<br />
                &lt;/script&gt;<br />
                &lt;/head&gt;</p><p>&lt;body&gt;<br />
                &lt;div&gt;<br />
                &lt;ul&gt;<br />
                &lt;li&gt;&lt;table border=&quot;0&quot;&gt;<br />
                &lt;tr&gt;<br />
                &lt;td colspan=&quot;4&quot;&gt;Example 1:&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td colspan=&quot;2&quot;&gt;Available Countries &lt;/td&gt;<br />
                &lt;td colspan=&quot;2&quot;&gt;Your Selection &lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td rowspan=&quot;3&quot; align=&quot;right&quot;&gt;&lt;label&gt;<br />
                &lt;select name=&quot;selectLeft&quot; size=&quot;10&quot; id=&quot;selectLeft&quot;&gt; <br />
                &lt;option value=&quot;AS&quot; selected=&quot;selected&quot;&gt;American Samoa&lt;/option&gt;<br />
                &lt;option value=&quot;AD&quot;&gt;Andorra&lt;/option&gt;<br />
                &lt;option value=&quot;AO&quot;&gt;Angola&lt;/option&gt;<br />
                &lt;option value=&quot;AI&quot;&gt;Anguilla&lt;/option&gt;<br />
                &lt;option value=&quot;AQ&quot;&gt;Antarctica&lt;/option&gt;<br />
                &lt;option value=&quot;AG&quot;&gt;Antigua And Barbuda&lt;/option&gt;<br />
                &lt;option value=&quot;AR&quot;&gt;Argentina&lt;/option&gt;<br />
                &lt;option value=&quot;AM&quot;&gt;Armenia&lt;/option&gt;<br />
                &lt;option value=&quot;AW&quot;&gt;Aruba&lt;/option&gt;<br />
                &lt;option value=&quot;AU&quot;&gt;Australia&lt;/option&gt;<br />
                &lt;option value=&quot;AT&quot;&gt;Austria&lt;/option&gt; <br />
                &lt;/select&gt;<br />
                &lt;/label&gt;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td rowspan=&quot;3&quot; align=&quot;left&quot;&gt;&lt;select name=&quot;selectRight&quot; size=&quot;10&quot; id=&quot;selectRight&quot;&gt;<br />
                &lt;option value=&quot;AF&quot; selected=&quot;selected&quot;&gt;Afghanistan&lt;/option&gt;<br />
                &lt;option value=&quot;AX&quot;&gt;&amp;Atilde;&amp;hellip;Land Islands&lt;/option&gt;<br />
                &lt;option value=&quot;AL&quot;&gt;Albania&lt;/option&gt;<br />
                &lt;option value=&quot;DZ&quot;&gt;Algeria&lt;/option&gt; <br />
                &lt;/select&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;label&gt;<br />
                &lt;input name=&quot;btnRight&quot; type=&quot;button&quot; id=&quot;btnRight&quot; value=&quot;&amp;gt;&amp;gt;&quot; onClick=&quot;javaScript:moveToRightOrLeft(1);&quot;&gt;<br />
                &lt;/label&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&lt;label&gt;<br />
                &lt;input name=&quot;btnLeft&quot; type=&quot;button&quot; id=&quot;btnLeft&quot; value=&quot;&amp;lt;&amp;lt;&quot; onClick=&quot;javaScript:moveToRightOrLeft(2);&quot;&gt;<br />
                &lt;/label&gt;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;tr&gt;<br />
                &lt;td&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
                &lt;/tr&gt;<br />
                &lt;/table&gt;<br />
                &lt;/li&gt;<br />
                &lt;li&gt;<br />
                &lt;div&gt;<br />
                &lt;p&gt;Copy and paste above code and modify it to add string values &lt;br /&gt; &lt;br /&gt;<br />
                &lt;strong&gt;How to check option already exists or not?&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;<br />
                function isOptionAlreadyExist(listBox,value){&lt;br /&gt;<br />
                var exists=false;&lt;br /&gt;<br />
                for(var x=0;x&amp;lt;listBox.options.length;x++){&lt;br /&gt;<br />
                if(listBox.options[x].value==value || listBox.options[x].text==value){ &lt;br /&gt;<br />
                exists=true;&lt;br /&gt;<br />
                break;&lt;br /&gt;<br />
                }&lt;br /&gt;<br />
                }&lt;br /&gt;<br />
                return exists;&lt;br /&gt;<br />
                }&lt;/p&gt;<br />
                &lt;/div&gt;<br />
                &lt;/li&gt; <br />
                &lt;li class=&quot;code_right&quot;&gt;&lt;/li&gt;<br />
                &lt;/ul&gt; <br />
                &lt;/div&gt;<br />
                &lt;/body&gt;<br />
                &lt;/HTML&gt;<br />
            </p><p>&nbsp;<br />
            </p></div></div></div></form></div><!--End green notice--><br />
<!--End live example--><!--Example code for the post--><div id="code_example"></div><!--End example code--></div>
<DIV style='clear: both;'></DIV>
</DIV>
<DIV class='post-footer'>
    <script charset='utf-8' src='http://feeds.feedburner.com/~s/DumindaKottawa?i=http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html' type='text/javascript'></script>
    <DIV class='post-footer-line post-footer-line-1'>
<SPAN class='post-author vcard'>
Posted by
<SPAN class='fn'>Duminda Chamara</SPAN>
</SPAN>
<SPAN class='post-timestamp'>
at
<A class='timestamp-link' href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html' rel='bookmark' title='permanent link'><ABBR class='published' title='2011-07-10T03:54:00-07:00'>3:54 AM</ABBR></A>
</SPAN>
<SPAN class='reaction-buttons'>
</SPAN>
<SPAN class='star-ratings'>
</SPAN>
<SPAN class='post-comment-link'>
</SPAN>
<SPAN class='post-backlinks post-comment-link'>
</SPAN>
<SPAN class='post-icons'>
<SPAN class='item-action'>
<A href='http://www.blogger.com/email-post.g?blogID=7126589561612455473&postID=8813626944911503359' title='Email Post'>
    <IMG alt='' class='icon-action' height='13' src='http://www.blogger.com/img/icon18_email.gif' width='18'></IMG>
</A>
</SPAN>
<SPAN class='item-control blog-admin pid-1416784841'>
<A href='http://www.blogger.com/post-edit.g?blogID=7126589561612455473&postID=8813626944911503359&from=pencil' title='Edit Post'>
    <IMG alt='' class='icon-action' height='18' src='http://www.blogger.com/img/icon18_edit_allbkg.gif' width='18'></IMG>
</A>
</SPAN>
</SPAN>
    </DIV>
    <DIV class='post-footer-line post-footer-line-2'>
<SPAN class='post-labels'>
</SPAN>
    </DIV>
    <DIV class='post-footer-line post-footer-line-3'>
<SPAN class='post-location'>
</SPAN>
    </DIV>
</DIV>
</DIV>
<DIV class='comments' id='comments'>
<A name='comments'></A>
<H4>
    15
    comments:

</H4>
<DL class='avatar-comment-indent' id='comments-block'>
<DT class='comment-author ' id='c3086474175419844027'>
    <A name='c3086474175419844027'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>Thanx.help full code......</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1322153420820#c3086474175419844027' title='comment permalink'>
    November 24, 2011 at 8:50 AM
</A>
<SPAN class='item-control blog-admin pid-1627463723'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=3086474175419844027' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c4798915237439053043'>
    <A name='c4798915237439053043'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><a href="http://www.blogger.com/profile/17632442736320775960" rel="nofollow" onclick="" class="avatar-hovercard" id="av-1-17632442736320775960"><img src="http://img2.blogblog.com/img/b16-rounded.gif" width="16" height="16" alt="" title="AkoSiRenee">

        </a></span></div>
<A href='http://www.blogger.com/profile/17632442736320775960' rel='nofollow'>AkoSiRenee</A>
said...
</DT>
<DD class='comment-body'>
    <P>hi! but what is i am retrieving the datas from a database? how would i do it?<br /><br />currently what i can do right now is to display the data inside ONE LISTBOX... and i used pure php with that. <br />hoping u can help me. THANKS!</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1337792450988#c4798915237439053043' title='comment permalink'>
    May 23, 2012 at 10:00 AM
</A>
<SPAN class='item-control blog-admin pid-128978686'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=4798915237439053043' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c1505135011994575709'>
    <A name='c1505135011994575709'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>thanks....i was looking for such example</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1340439060617#c1505135011994575709' title='comment permalink'>
    June 23, 2012 at 1:11 AM
</A>
<SPAN class='item-control blog-admin pid-798102559'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=1505135011994575709' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c7040504334470050261'>
    <A name='c7040504334470050261'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>simply GREATE</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1346879701335#c7040504334470050261' title='comment permalink'>
    September 5, 2012 at 2:15 PM
</A>
<SPAN class='item-control blog-admin pid-1694494775'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=7040504334470050261' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c688822716023513424'>
    <A name='c688822716023513424'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Ram">

</span></div>
Ram
said...
</DT>
<DD class='comment-body'>
    <P>hi...<br /><br />wn i copy and paste the first example to empty html page... its not working! why?<br /><br />resolve for me<br /><br />Tnx</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1349057777021#c688822716023513424' title='comment permalink'>
    September 30, 2012 at 7:16 PM
</A>
<SPAN class='item-control blog-admin pid-414318909'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=688822716023513424' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c7037632653370059120'>
    <A name='c7037632653370059120'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><a href="http://www.blogger.com/profile/09442488176742308348" rel="nofollow" onclick="" class="avatar-hovercard" id="av-5-09442488176742308348"><img src="http://img2.blogblog.com/img/b16-rounded.gif" width="16" height="16" alt="" title="Austin Kim">

        </a></span></div>
<A href='http://www.blogger.com/profile/09442488176742308348' rel='nofollow'>Austin Kim</A>
said...
</DT>
<DD class='comment-body'>
    <P>I like your samples here.<br /><br />However, the last example which I was looking for need to add &#39;name=&quot;selectRight[]&quot; multiple=&quot;multiple&quot;&#39; in order to pass all values in the form.<br /><br />Also, it needs  javascript that set attribute to &quot;selected&quot; for all values in &quot;selectRight&quot;.<br /><br />Thanks</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1354639860997#c7037632653370059120' title='comment permalink'>
    December 4, 2012 at 8:51 AM
</A>
<SPAN class='item-control blog-admin pid-1146775516'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=7037632653370059120' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c5859332854733115091'>
    <A name='c5859332854733115091'></A>
<div class="avatar-image-container vcard"><span dir="ltr"><a href="http://www.blogger.com/profile/04516467156916436046" rel="nofollow" onclick="" class="avatar-hovercard" id="av-6-04516467156916436046"><img src="http://img1.blogblog.com/img/blank.gif" width="35" height="35" alt="" class="delayLoad" style="display: none;" longdesc="//lh6.googleusercontent.com/-1U4DHQfWpcc/AAAAAAAAAAI/AAAAAAAAADw/ZEnx8KYMJ7M/s512-c/photo.jpg" title="Ph&#7841;m Minh Ho&agrave;ng">

            <noscript><img src="//lh6.googleusercontent.com/-1U4DHQfWpcc/AAAAAAAAAAI/AAAAAAAAADw/ZEnx8KYMJ7M/s512-c/photo.jpg" width="35" height="35" class="photo" alt=""></noscript></a></span></div>
<A href='http://www.blogger.com/profile/04516467156916436046' rel='nofollow'>Phạm Minh Hoàng</A>
said...
</DT>
<DD class='comment-body'>
    <P>thanks you for examples. very useful</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1369683604546#c5859332854733115091' title='comment permalink'>
    May 27, 2013 at 12:40 PM
</A>
<SPAN class='item-control blog-admin pid-925826315'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=5859332854733115091' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c2356851220260718720'>
    <A name='c2356851220260718720'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Monika">

</span></div>
Monika
said...
</DT>
<DD class='comment-body'>
    <P>Great work :)<br />Really helped :D</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1372158518817#c2356851220260718720' title='comment permalink'>
    June 25, 2013 at 4:08 AM
</A>
<SPAN class='item-control blog-admin pid-1471633383'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=2356851220260718720' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c5080705424666353801'>
    <A name='c5080705424666353801'></A>
<div class="avatar-image-container vcard"><span dir="ltr"><a href="http://www.blogger.com/profile/13369838734950351330" rel="nofollow" onclick="" class="avatar-hovercard" id="av-8-13369838734950351330"><img src="http://img1.blogblog.com/img/blank.gif" width="35" height="35" alt="" class="delayLoad" style="display: none;" longdesc="http://3.bp.blogspot.com/_-xhOOzFWdSk/TKb9iqL8rZI/AAAAAAAAACE/8_Qtwa9qf0g/S45/18022010573.jpg" title="MUQTHAR">

            <noscript><img src="http://3.bp.blogspot.com/_-xhOOzFWdSk/TKb9iqL8rZI/AAAAAAAAACE/8_Qtwa9qf0g/S45/18022010573.jpg" width="35" height="35" class="photo" alt=""></noscript></a></span></div>
<A href='http://www.blogger.com/profile/13369838734950351330' rel='nofollow'>MUQTHAR</A>
said...
</DT>
<DD class='comment-body'>
    <P>Dear Friend <br /><br />How to insert list values in to mysql database in 5th example please help me</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1379074514125#c5080705424666353801' title='comment permalink'>
    September 13, 2013 at 5:15 AM
</A>
<SPAN class='item-control blog-admin pid-1384428600'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=5080705424666353801' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c6628503182222791369'>
    <A name='c6628503182222791369'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><a href="http://www.blogger.com/profile/00091527806261652102" rel="nofollow" onclick="" class="avatar-hovercard" id="av-9-00091527806261652102"><img src="http://img2.blogblog.com/img/b16-rounded.gif" width="16" height="16" alt="" title="Jorge">

        </a></span></div>
<A href='http://www.blogger.com/profile/00091527806261652102' rel='nofollow'>Jorge</A>
said...
</DT>
<DD class='comment-body'>
    <P>GREAT posting - Many thanks for posting this! <br /><br />On example 1, how can the new entry be the SELECTED OPTION?<br /><br /><br /></P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1387509999322#c6628503182222791369' title='comment permalink'>
    December 19, 2013 at 7:26 PM
</A>
<SPAN class='item-control blog-admin pid-613761792'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=6628503182222791369' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c2371341480692701001'>
    <A name='c2371341480692701001'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>Thx a lot.. I was looking exasctly for this..</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1395408603562#c2371341480692701001' title='comment permalink'>
    March 21, 2014 at 6:30 AM
</A>
<SPAN class='item-control blog-admin pid-906437050'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=2371341480692701001' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c6419459649874008626'>
    <A name='c6419459649874008626'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>You people need to learn English.</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1397845560402#c6419459649874008626' title='comment permalink'>
    April 18, 2014 at 11:26 AM
</A>
<SPAN class='item-control blog-admin pid-736050141'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=6419459649874008626' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c3272033471128222706'>
    <A name='c3272033471128222706'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>how u make option do like stuff 4 me pleaz resolve all my question now thanks</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1397845676204#c3272033471128222706' title='comment permalink'>
    April 18, 2014 at 11:27 AM
</A>
<SPAN class='item-control blog-admin pid-736050141'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=3272033471128222706' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c7667038285429731856'>
    <A name='c7667038285429731856'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="kumar">

</span></div>
kumar
said...
</DT>
<DD class='comment-body'>
    <P>how many days will takes to php <br /></P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1398417622628#c7667038285429731856' title='comment permalink'>
    April 25, 2014 at 2:20 AM
</A>
<SPAN class='item-control blog-admin pid-1559203380'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=7667038285429731856' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
<DT class='comment-author ' id='c8086921176827082384'>
    <A name='c8086921176827082384'></A>
<div class="avatar-image-container avatar-stock"><span dir="ltr"><img src="http://img1.blogblog.com/img/blank.gif" width="16" height="16" alt="" title="Anonymous">

</span></div>
Anonymous
said...
</DT>
<DD class='comment-body'>
    <P>how to add and remove data with in two drop down box</P>
</DD>
<DD class='comment-footer'>
<SPAN class='comment-timestamp'>
<A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html?showComment=1398417765527#c8086921176827082384' title='comment permalink'>
    April 25, 2014 at 2:22 AM
</A>
<SPAN class='item-control blog-admin pid-1559203380'>
<A href='http://www.blogger.com/delete-comment.g?blogID=7126589561612455473&postID=8086921176827082384' title='Delete Comment'>
    <IMG src='http://www.blogger.com/img/icon_delete13.gif'></IMG>
</A>
</SPAN>
</SPAN>
</DD>
</DL>
<P class='comment-footer'>
    <A href='http://www.blogger.com/comment.g?blogID=7126589561612455473&amp;postID=8813626944911503359' onclick=''>Post a Comment</A>
</P>
<DIV id='backlinks-container'>
    <DIV id='Blog1_backlinks-container'>
    </DIV>
</DIV>
</DIV>
<!-- google_ad_section_end(name=default) -->
<DIV class='inline-ad'>
</DIV>
<!-- google_ad_section_start -->
<!-- google_ad_section_end -->
</DIV>
<DIV class='blog-pager' id='blog-pager'>
<SPAN id='blog-pager-newer-link'>
<A class='blog-pager-newer-link' href='http://www.latestcode.net/2011/08/how-to-check-domain-availability-in-php.html' id='Blog1_blog-pager-newer-link' title='Newer Post'>Newer Post</A>
</SPAN>
<SPAN id='blog-pager-older-link'>
<A class='blog-pager-older-link' href='http://www.latestcode.net/2011/03/how-to-validate-email-address-in-php.html' id='Blog1_blog-pager-older-link' title='Older Post'>Older Post</A>
</SPAN>
    <A class='home-link' href='http://www.latestcode.net/'>Home</A>
</DIV>
<DIV class='clear'></DIV>
<DIV class='post-feeds'>
    <DIV class='feed-links'>
        Subscribe to:
        <A class='feed-link' href='http://www.latestcode.net/feeds/8813626944911503359/comments/default' target='_blank' type='application/atom+xml'>Post Comments (Atom)</A>
    </DIV>
</DIV>
</div></div>
</DIV>
<DIV id='sidebar-wrapper'>
<div class='sidebar section' id='sidebar'><div class='widget HTML' id='HTML7'>
    <div class='widget-content'>
        <script src="http://cdn.wibiya.com/Toolbars/dir_0965/Toolbar_965935/Loader_965935.js" type="text/javascript"></script><noscript><a href="http://www.wibiya.com/">Web Toolbar by Wibiya</a></noscript>
    </div>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML7&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML7"));' target='configHTML7' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget HTML' id='HTML5'>
    <div class='widget-content'>
        <!-- +1 button to render -->
        <g:plusone></g:plusone>
        <!-- End +1 render -->
    </div>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML5&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML5"));' target='configHTML5' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget HTML' id='HTML8'>
    <div class='widget-content'>
        <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/ProgrammingHelp" width="200" show_faces="true" stream="false" header="true"></fb:like-box>
    </div>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML8&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML8"));' target='configHTML8' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget HTML' id='HTML1'>
    <DIV class='widget-content'>
        <h4 style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;text-align:justify;padding-left:10px;padding-right:10px;padding-top:20px;color:#3B5998">Type keywords to search...</h4>
        <form id="cse-search-box" action="http://kottawadumi.blogspot.com">
            <div>
                <input value="partner-pub-3128630725558105:bwam88-qj24" name="cx" type="hidden" />
                <input value="FORID:10" name="cof" type="hidden" />
                <input value="ISO-8859-1" name="ie" type="hidden" />
                <input name="q" size="20" type="text" />
                <input value="Get It" name="sa" type="submit" />
            </div>
        </form>

        <script src="http://www.google.lk/coop/cse/brand?form=cse-search-box&amp;lang=en" type="text/javascript"></script>
    </DIV>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML1&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML1"));' target='configHTML1' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget Profile' id='Profile1'>
    <H2>About Me</H2>
    <DIV class='widget-content'>
        <A href='http://www.blogger.com/profile/12515495892282288021'><IMG alt='My Photo' class='profile-img' height='71' src='http://4.bp.blogspot.com/--WGn7lM7j-Y/Uv16S5hFu8I/AAAAAAAACWs/jnMiwGlCMBU/s1600/*' width='80'></IMG></A>
        <DL class='profile-datablock'>
            <DT class='profile-data'>Duminda Chamara</DT>
            <DD class='profile-textblock'>Never explain yourself. Your friends don't need it and your enemies won't believe it.</DD>
        </DL>
        <A class='profile-link' href='http://www.blogger.com/profile/12515495892282288021'>View my complete profile</A>
        <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=Profile&widgetId=Profile1&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("Profile1"));' target='configProfile1' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
        <div class='clear'></div>
    </DIV>
</div><div class='widget Followers' id='Followers1'>
    <h2 class='title'>Followers</h2>
    <div class='widget-content'>
        <div id='Followers1-wrapper'>
            <div style='margin-right:2px;'>
                <script type="text/javascript">
                    if (!window.google || !google.friendconnect) {
                        document.write('<script type="text/javascript"' +
                            'src="//www.google.com/friendconnect/script/friendconnect.js">' +
                            '</scr' + 'ipt>');
                    }
                </script>
                <script type="text/javascript">
                    if (!window.registeredBloggerCallbacks) {
                        window.registeredBloggerCallbacks = true;




                        gadgets.rpc.register('requestReload', function() {
                            document.location.reload();
                        });


                        gadgets.rpc.register('requestSignOut', function(siteId) {

                            google.friendconnect.container.openSocialSiteId = siteId;
                            google.friendconnect.requestSignOut();
                        });
                    }
                </script>
                <script type="text/javascript">

                    function registerGetBlogUrls() {
                        gadgets.rpc.register('getBlogUrls', function() {
                            var holder = {};




                            holder.currentPost = "http://www.blogger.com/feeds/7126589561612455473/posts/default/8813626944911503359";



                            holder.currentComments = "http://www.blogger.com/feeds/7126589561612455473/8813626944911503359/comments/default";

                            holder.currentPostUrl = "";
                            holder.currentPostId = 8813626944911503359



                            holder.postFeed = "http://www.blogger.com/feeds/7126589561612455473/posts/default";



                            holder.commentFeed = "http://www.blogger.com/feeds/7126589561612455473/comments/default";

                            holder.currentBlogUrl = "http://www.latestcode.net/";
                            holder.currentBlogId = "7126589561612455473";

                            return holder;
                        });
                    }
                </script>
                <script type="text/javascript">
                    if (!window.registeredCommonBloggerCallbacks) {
                        window.registeredCommonBloggerCallbacks = true;

                        gadgets.rpc.register('resize_iframe', function(height) {
                            var el = document.getElementById(this['f']);
                            if (el) {
                                el.style.height = height + 'px';
                            }
                        });


                        gadgets.rpc.register('set_pref', function() {});

                        registerGetBlogUrls();
                    }
                </script>
                <div id="div-1bg0au3isuel0" style="width: 100%; border: 1px solid #fff;"></div>
                <script type="text/javascript">
                    var skin = {};
                    skin['FACE_SIZE'] = '32';
                    skin['HEIGHT'] = "260";
                    skin['TITLE'] = "Followers";
                    skin['BORDER_COLOR'] = "#FFFFFF";
                    skin['ENDCAP_BG_COLOR'] = "transparent";
                    skin['ENDCAP_TEXT_COLOR'] = "#999999";
                    skin['ENDCAP_LINK_COLOR'] = "#6699cc";
                    skin['ALTERNATE_BG_COLOR'] = "transparent";

                    skin['CONTENT_BG_COLOR'] = "transparent";
                    skin['CONTENT_LINK_COLOR'] = "#6699cc";
                    skin['CONTENT_TEXT_COLOR'] = "#999999";
                    skin['CONTENT_SECONDARY_LINK_COLOR'] = "#6699cc";
                    skin['CONTENT_SECONDARY_TEXT_COLOR'] = "#000000";
                    skin['CONTENT_HEADLINE_COLOR'] = "#ff6633";
                    skin['FONT_FACE'] = "normal normal 100% Georgia, Serif";
                    google.friendconnect.container.setParentUrl("/");
                    google.friendconnect.container["renderMembersGadget"](
                        {id: "div-1bg0au3isuel0",
                            height: 260,



                            site: "13732758846160596305",

                            locale: 'en' },
                        skin);
                </script>
            </div>
        </div>
        <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=Followers&widgetId=Followers1&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("Followers1"));' target='configFollowers1' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
        <div class='clear'></div>
    </div>
</div><div class='widget HTML' id='HTML9'>
    <div class='widget-content'>
        <div id="cc_unported_license">
            <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Programming Help</span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName">Duminda Chamara</span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.en_US">Creative Commons Attribution 3.0 Unported License</a>.</div>
    </div>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML9&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML9"));' target='configHTML9' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget HTML' id='HTML6'>
    <div class='widget-content'>
        <script type="text/javascript">
            google_ad_client = "ca-pub-3128630725558105";
            google_ad_host = "pub-1556223355139109";
            /* ph-blog-right-160x600 */
            google_ad_slot = "0113646968";
            google_ad_width = 160;
            google_ad_height = 600;
        </script>
        <script type="text/javascript"
                src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
    </div>
    <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=HTML&widgetId=HTML6&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("HTML6"));' target='configHTML6' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
    <div class='clear'></div>
</div><div class='widget PopularPosts' id='PopularPosts1'>
    <h2>Popular Posts</h2>
    <div class='widget-content popular-posts'>
        <ul>
            <li>
                <div class='item-content'>
                    <div class='item-title'><a href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html'>Add or remove list box items dynamically in javascript</a></div>
                    <div class='item-snippet'>How to add or remove list box items dynamically using JavaScript  Following example shows you how to add or remove list items in HTML option...</div>
                </div>
                <div style='clear: both;'></div>
            </li>
            <li>
                <div class='item-content'>
                    <div class='item-title'><a href='http://www.latestcode.net/2010/05/how-to-validate-textbox-using.html'>how to validate textbox using javascript</a></div>
                    <div class='item-snippet'> How to validate text box/textarea in Java Script?   Following example shows you how to validate text box or textarea in your web applicatio...</div>
                </div>
                <div style='clear: both;'></div>
            </li>
            <li>
                <div class='item-content'>
                    <div class='item-title'><a href='http://www.latestcode.net/2010/01/how-to-validate-drop-down-list-in.html'>How to validate Drop-Down list in JavaScript</a></div>
                    <div class='item-snippet'>How to validate dropdown list in JavaScript? Following example shows you how to validate List-Box / Drop Down Box using JavaScript as client...</div>
                </div>
                <div style='clear: both;'></div>
            </li>
            <li>
                <div class='item-content'>
                    <div class='item-title'><a href='http://www.latestcode.net/2010/01/how-to-validate-radio-button-group-in.html'>How to validate radio button group in JavaScript</a></div>
                    <div class='item-snippet'>How to Validate Radio Button Group using JavaScript? Following example shows you how to validate Radio Button Group using JavaScript as clie...</div>
                </div>
                <div style='clear: both;'></div>
            </li>
            <li>
                <div class='item-content'>
                    <div class='item-thumbnail'>
                        <a href='http://www.latestcode.net/2010/01/how-to-validate-user-login-in.html' target='_blank'>
                            <img alt='' border='0' height='72' src='http://1.bp.blogspot.com/-ac0Iv6OylLc/UPLKYeFkREI/AAAAAAAAB7s/4S01EVkvPiU/s72-c/Validate-user-login-with-PHP-MySQL-and-JavaScript.gif' width='72'/>
                        </a>
                    </div>
                    <div class='item-title'><a href='http://www.latestcode.net/2010/01/how-to-validate-user-login-in.html'>how to validate user login </a></div>
                    <div class='item-snippet'>   How to validate user login using MySQL with PHP and JavaScript?    Following example shows you how to validate user login in your web app...</div>
                </div>
                <div style='clear: both;'></div>
            </li>
        </ul>
        <div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=PopularPosts&widgetId=PopularPosts1&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("PopularPosts1"));' target='configPopularPosts1' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
        <div class='clear'></div>
    </div>
</div><div class='widget BlogArchive' id='BlogArchive1'>
<H2>Blog Archive</H2>
<DIV class='widget-content'>
<DIV id='ArchiveList'>
<DIV id='BlogArchive1_ArchiveList'>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2014-01-01T00:00:00-08:00&amp;updated-max=2015-01-01T00:00:00-08:00&amp;max-results=1'>2014</A>
        <SPAN class='post-count' dir='ltr'>(1)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2014_01_01_archive.html'>January</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2013-01-01T00:00:00-08:00&amp;updated-max=2014-01-01T00:00:00-08:00&amp;max-results=8'>2013</A>
        <SPAN class='post-count' dir='ltr'>(8)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2013_06_01_archive.html'>June</A>
                <SPAN class='post-count' dir='ltr'>(2)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2013_05_01_archive.html'>May</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2013_03_01_archive.html'>March</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2013_02_01_archive.html'>February</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2013_01_01_archive.html'>January</A>
                <SPAN class='post-count' dir='ltr'>(3)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2012-01-01T00:00:00-08:00&amp;updated-max=2013-01-01T00:00:00-08:00&amp;max-results=6'>2012</A>
        <SPAN class='post-count' dir='ltr'>(6)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2012_12_01_archive.html'>December</A>
                <SPAN class='post-count' dir='ltr'>(5)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2012_11_01_archive.html'>November</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate expanded'>
        <A class='toggle' href='javascript:void(0)'>
            <SPAN class='zippy toggle-open'>&#9660;&#160;</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2011-01-01T00:00:00-08:00&amp;updated-max=2012-01-01T00:00:00-08:00&amp;max-results=3'>2011</A>
        <SPAN class='post-count' dir='ltr'>(3)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2011_08_01_archive.html'>August</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate expanded'>
                <A class='toggle' href='javascript:void(0)'>
                    <SPAN class='zippy toggle-open'>&#9660;&#160;</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2011_07_01_archive.html'>July</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
                <UL class='posts'>
                    <LI><A href='http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html'>Add or remove list box items dynamically in javasc...</A></LI>
                </UL>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2011_03_01_archive.html'>March</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2010-01-01T00:00:00-08:00&amp;updated-max=2011-01-01T00:00:00-08:00&amp;max-results=22'>2010</A>
        <SPAN class='post-count' dir='ltr'>(22)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_11_01_archive.html'>November</A>
                <SPAN class='post-count' dir='ltr'>(2)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_09_01_archive.html'>September</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_06_01_archive.html'>June</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_05_01_archive.html'>May</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_04_01_archive.html'>April</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_03_01_archive.html'>March</A>
                <SPAN class='post-count' dir='ltr'>(4)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_02_01_archive.html'>February</A>
                <SPAN class='post-count' dir='ltr'>(4)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2010_01_01_archive.html'>January</A>
                <SPAN class='post-count' dir='ltr'>(8)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2009-01-01T00:00:00-08:00&amp;updated-max=2010-01-01T00:00:00-08:00&amp;max-results=19'>2009</A>
        <SPAN class='post-count' dir='ltr'>(19)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_12_01_archive.html'>December</A>
                <SPAN class='post-count' dir='ltr'>(4)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_11_01_archive.html'>November</A>
                <SPAN class='post-count' dir='ltr'>(7)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_10_01_archive.html'>October</A>
                <SPAN class='post-count' dir='ltr'>(2)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_09_01_archive.html'>September</A>
                <SPAN class='post-count' dir='ltr'>(3)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_08_01_archive.html'>August</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2009_06_01_archive.html'>June</A>
                <SPAN class='post-count' dir='ltr'>(2)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
<UL>
    <LI class='archivedate collapsed'>
        <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
        </A>
        <A class='post-count-link' href='http://www.latestcode.net/search?updated-min=2008-01-01T00:00:00-08:00&amp;updated-max=2009-01-01T00:00:00-08:00&amp;max-results=1'>2008</A>
        <SPAN class='post-count' dir='ltr'>(1)</SPAN>
        <UL>
            <LI class='archivedate collapsed'>
                <A class='toggle' href='javascript:void(0)'>
<SPAN class='zippy'>

          &#9658;&#160;
        
</SPAN>
                </A>
                <A class='post-count-link' href='http://www.latestcode.net/2008_10_01_archive.html'>October</A>
                <SPAN class='post-count' dir='ltr'>(1)</SPAN>
            </LI>
        </UL>
    </LI>
</UL>
</DIV>
</DIV>
<div class='clear'></div>
<span class='widget-item-control'>
<span class='item-control blog-admin'>
<a class='quickedit' href='//www.blogger.com/rearrange?blogID=7126589561612455473&widgetType=BlogArchive&widgetId=BlogArchive1&action=editWidget&sectionId=sidebar' onclick='return _WidgetManager._PopupConfig(document.getElementById("BlogArchive1"));' target='configBlogArchive1' title='Edit'>
    <img alt='' height='18' src='http://img1.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
</a>
</span>
</span>
<div class='clear'></div>
</DIV>
</div></div>
</DIV>
<!-- spacer for skins that want sidebar and main to be the same height-->
<DIV class='clear'>&#160;</DIV>
</DIV>
<!-- end content-wrapper -->
<DIV id='footer-wrapper'>
    <div class='footer section' id='footer'></div>
</DIV>
</DIV>
</DIV>
<B class='round_border'>
    <B class='round_border_layer1'></B>
    <B class='round_border_layer2'></B>
    <B class='round_border_layer3'></B>
</B>
</DIV>
<!-- end outer-wrapper -->
<!-- Google Analytics Tracking Code -->
<script type='text/javascript'>

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39499986-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- End Tracking Code-->
<script type="text/javascript">
    if (window.jstiming) window.jstiming.load.tick('widgetJsBefore');
</script><script type="text/javascript" src="https://www.blogger.com/static/v1/widgets/1093374584-widgets.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type='text/javascript'>
    if (typeof(BLOG_attachCsiOnload) != 'undefined' && BLOG_attachCsiOnload != null) { window['blogger_templates_experiment_id'] = "templatesV1";window['blogger_blog_id'] = '7126589561612455473';BLOG_attachCsiOnload('item_'); }_WidgetManager._Init('//www.blogger.com/rearrange?blogID\x3d7126589561612455473','//www.latestcode.net/2011/07/add-or-remove-list-box-items.html','7126589561612455473');
    _WidgetManager._SetDataContext([{'name': 'blog', 'data': {'blogId': '7126589561612455473', 'bloggerUrl': 'http://www.blogger.com', 'title': 'Latest Code - Programming Help', 'pageType': 'item', 'postId': '8813626944911503359', 'url': 'http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html', 'canonicalUrl': 'http://www.latestcode.net/2011/07/add-or-remove-list-box-items.html', 'canonicalHomepageUrl': 'http://www.latestcode.net/', 'homepageUrl': 'http://www.latestcode.net/', 'blogspotFaviconUrl': 'http://www.latestcode.net/favicon.ico', 'enabledCommentProfileImages': true, 'adultContent': false, 'disableAdSenseWidget': false, 'analyticsAccountNumber': '', 'searchLabel': '', 'searchQuery': '', 'pageName': 'Add or remove list box items dynamically in javascript', 'pageTitle': 'Latest Code - Programming Help: Add or remove list box items dynamically in javascript', 'encoding': 'UTF-8', 'locale': 'en', 'localeUnderscoreDelimited': 'en', 'isPrivate': false, 'isMobile': false, 'isMobileRequest': false, 'mobileClass': '', 'isPrivateBlog': false, 'languageDirection': 'ltr', 'feedLinks': '\74link rel\75\42alternate\42 type\75\42application/atom+xml\42 title\75\42Latest Code - Programming Help - Atom\42 href\75\42http://www.latestcode.net/feeds/posts/default\42 /\76\n\74link rel\75\42alternate\42 type\75\42application/rss+xml\42 title\75\42Latest Code - Programming Help - RSS\42 href\75\42http://www.latestcode.net/feeds/posts/default?alt\75rss\42 /\76\n\74link rel\75\42service.post\42 type\75\42application/atom+xml\42 title\75\42Latest Code - Programming Help - Atom\42 href\75\42http://www.blogger.com/feeds/7126589561612455473/posts/default\42 /\76\n\n\74link rel\75\42alternate\42 type\75\42application/atom+xml\42 title\75\42Latest Code - Programming Help - Atom\42 href\75\42http://www.latestcode.net/feeds/8813626944911503359/comments/default\42 /\76\n', 'meTag': '', 'openIdOpTag': '', 'latencyHeadScript': '\74script type\75\42text/javascript\42\76(function() { var b\75window,f\75\42chrome\42,g\75\42tick\42,k\75\42jstiming\42;(function(){function d(a){this.t\75{};this.tick\75function(a,d,c){var e\75void 0!\75c?c:(new Date).getTime();this.t[a]\75[e,d];if(void 0\75\75c)try{b.console.timeStamp(\42CSI/\42+a)}catch(h){}};this[g](\42start\42,null,a)}var a;b.performance\46\46(a\75b.performance.timing);var n\75a?new d(a.responseStart):new d;b.jstiming\75{Timer:d,load:n};if(a){var c\75a.navigationStart,h\75a.responseStart;0\74c\46\46h\76\75c\46\46(b[k].srt\75h-c)}if(a){var e\75b[k].load;0\74c\46\46h\76\75c\46\46(e[g](\42_wtsrt\42,void 0,c),e[g](\42wtsrt_\42,\42_wtsrt\42,h),e[g](\42tbsd_\42,\42wtsrt_\42))}try{a\75null,\nb[f]\46\46b[f].csi\46\46(a\75Math.floor(b[f].csi().pageT),e\46\0460\74c\46\46(e[g](\42_tbnd\42,void 0,b[f].csi().startE),e[g](\42tbnd_\42,\42_tbnd\42,c))),null\75\75a\46\46b.gtbExternal\46\46(a\75b.gtbExternal.pageT()),null\75\75a\46\46b.external\46\46(a\75b.external.pageT,e\46\0460\74c\46\46(e[g](\42_tbnd\42,void 0,b.external.startE),e[g](\42tbnd_\42,\42_tbnd\42,c))),a\46\46(b[k].pt\75a)}catch(p){}})();b.tickAboveFold\75function(d){var a\0750;if(d.offsetParent){do a+\75d.offsetTop;while(d\75d.offsetParent)}d\75a;750\76\75d\46\46b[k].load[g](\42aft\42)};var l\75!1;function m(){l||(l\75!0,b[k].load[g](\42firstScrollTime\42))}b.addEventListener?b.addEventListener(\42scroll\42,m,!1):b.attachEvent(\42onscroll\42,m);\n })();\74/script\076', 'mobileHeadScript': '', 'adsenseClientId': 'ca-pub-3128630725558105', 'view': '', 'dynamicViewsCommentsSrc': '//www.blogblog.com/dynamicviews/4224c15c4e7c9321/js/comments.js', 'dynamicViewsScriptSrc': '//www.blogblog.com/dynamicviews/76f25a6f2e06af76', 'plusOneApiSrc': 'https://apis.google.com/js/plusone.js', 'sf': 'n', 'tf': ''}}, {'name': 'skin', 'data': {'vars': {'sidebartextcolor': '#666666', 'linkcolor': '#5588aa', 'visitedlinkcolor': '#999999', 'textcolor': '#333333', 'headerfont': 'normal normal 78% \47Trebuchet MS\47,Trebuchet,Arial,Verdana,Sans-serif', 'pagetitlefont': 'normal normal 200% Georgia, Serif', 'bgcolor': '#ffffff', 'descriptioncolor': '#999999', 'titlecolor': '#cc6600', 'bordercolor': '#cccccc', 'postfooterfont': 'normal normal 78% \47Trebuchet MS\47, Trebuchet, Arial, Verdana, Sans-serif', 'pagetitlecolor': '#666666', 'bodyfont': 'normal normal 100% Georgia, Serif', 'endSide': 'right', 'startSide': 'left', 'descriptionfont': 'normal normal 78% \47Trebuchet MS\47, Trebuchet, Arial, Verdana, Sans-serif', 'sidebarcolor': '#999999'}, 'override': '.code_preview{\n	font-family:\42Lucida Sans Unicode\42, \42Lucida Grande\42, sans-serif;\n	font-size:12px;	\n	border: 1px solid #0099CC;	\n	margin-left:10px;\n	padding-left:10px;\n	background-color:#FFFFEC;\n}\n'}}, {'name': 'view', 'data': {'classic': {'name': 'classic', 'url': '?view\75classic'}, 'flipcard': {'name': 'flipcard', 'url': '?view\75flipcard'}, 'magazine': {'name': 'magazine', 'url': '?view\75magazine'}, 'mosaic': {'name': 'mosaic', 'url': '?view\75mosaic'}, 'sidebar': {'name': 'sidebar', 'url': '?view\75sidebar'}, 'snapshot': {'name': 'snapshot', 'url': '?view\75snapshot'}, 'timeslide': {'name': 'timeslide', 'url': '?view\75timeslide'}}}]);
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML4', 'crosscol', null, document.getElementById('HTML4'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML2', 'crosscol', null, document.getElementById('HTML2'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML3', 'crosscol', null, document.getElementById('HTML3'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML7', 'sidebar', null, document.getElementById('HTML7'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML5', 'sidebar', null, document.getElementById('HTML5'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML8', 'sidebar', null, document.getElementById('HTML8'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML1', 'sidebar', null, document.getElementById('HTML1'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_ProfileView', new _WidgetInfo('Profile1', 'sidebar', null, document.getElementById('Profile1'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_FollowersView', new _WidgetInfo('Followers1', 'sidebar', null, document.getElementById('Followers1'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML9', 'sidebar', null, document.getElementById('HTML9'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HTMLView', new _WidgetInfo('HTML6', 'sidebar', null, document.getElementById('HTML6'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_PopularPostsView', new _WidgetInfo('PopularPosts1', 'sidebar', null, document.getElementById('PopularPosts1'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_BlogArchiveView', new _WidgetInfo('BlogArchive1', 'sidebar', null, document.getElementById('BlogArchive1'), {'languageDirection': 'ltr'}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_HeaderView', new _WidgetInfo('Header1', 'header', null, document.getElementById('Header1'), {}, 'displayModeFull'));
    _WidgetManager._RegisterWidget('_BlogView', new _WidgetInfo('Blog1', 'main', null, document.getElementById('Blog1'), {'cmtInteractionsEnabled': false, 'lightboxEnabled': true, 'lightboxModuleUrl': 'https://www.blogger.com/static/v1/jsbin/3694023982-lbx.js', 'lightboxCssUrl': 'https://www.blogger.com/static/v1/v-css/2392111094-lightbox_bundle.css'}, 'displayModeFull'));
</script>
</body>
</HTML>