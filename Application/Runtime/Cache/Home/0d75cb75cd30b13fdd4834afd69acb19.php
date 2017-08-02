<?php if (!defined('THINK_PATH')) exit(); $vo = $result['news'];?>
<?php
 $navs = D('Menu')->getHomeTrueMenus(); $config = D('Basic')->select(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo ($config["title"]); ?></title>
  <meta name="keywords" content="<?php echo ($config["keywords"]); ?>" />
  <meta name="description" content="<?php echo ($config["description"]); ?>" />
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="/Public/css/home/main.css" type="text/css" />
  <style type="text/css">
    a:hover{
      text-decoration: none;
    }
  </style>
</head>
<body>
<header id="header">
  <div class="navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/">
          <img src="/Public/images/logo.png" alt="">
        </a>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li><a href="/" <?php if($result['catid'] == 0): ?>class="curr"<?php endif; ?>>首页</a></li>
        <?php if(is_array($navs)): foreach($navs as $key=>$nav): ?><li><a href="/index.php?c=cat&id=<?php echo ($nav["menu_id"]); ?>" <?php if($nav['menu_id'] == $result['catid']): ?>class="curr"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
  </div>
</header>
<section>
  <div class="container">
    <div class="row"> 
      <div class="col-sm-9 col-md-9">
        
        <div class="news-detail">
          <h1 style="color: <?php echo ($vo["title_font_color"]); ?>"><?php echo ($vo["title"]); ?></h1>
          <h5><?php echo ($vo["small_title"]); ?></h5>阅读（<i news-id="<?php echo ($vo["news_id"]); ?>" class="news_count node-<?php echo ($vo["news_id"]); ?>"></i>）
          <p><?php echo ($vo["content"]); ?></p>
        </div>
        
      </div>
      <!--网站右侧信息-->
      <div class="col-sm-3 col-md-3">
  <div class="right-title">
    <h3>文章排行</h3>
    <span>TOP ARTICLES</span>
  </div>
  <div class="right-content">
    <ul>
      <?php if(is_array($result['rankNews'])): $k = 0; $__LIST__ = $result['rankNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="num<?php echo ($k); ?> curr">
          <a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>" target="_blank"><?php echo ($vo["title"]); ?></a>
          <?php if($k == 1): ?><div class="intro">
              <?php echo ($vo["description"]); ?>
            </div><?php endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <?php if(is_array($result['advNews'])): $i = 0; $__LIST__ = $result['advNews'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="right-hot">
      <a href="/index.php?c=detail&id=<?php echo ($vo["news_id"]); ?>&contentid=<?php echo ($vo["id"]); ?>" target="_blank"><img src="<?php echo ($vo["thumb"]); ?>" alt="<?php echo ($vo["title"]); ?>" width="262" height="171"></a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
    </div>
  </div>
</section>
<script>
  var SCOPE = {
    'count_url' : '/index.php?c=index&a=get_count',
    
  }
</script>
</body>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/count.js"></script>
</html>