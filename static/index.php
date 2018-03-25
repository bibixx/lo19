<?php
  defined( '_JEXEC' ) or die( 'Restricted access' );
  $app = JFactory::getApplication();
  $menu = $app->getMenu()->getActive();
  $pageclass = '';

  if (is_object($menu))
    $pageclass .= $menu->params->get('pageclass_sfx');

  if(array_search(JFactory::getUser()->getAuthorisedGroups()[1], array(2,3,4,5,6,7,8)))
    $pageclass = ($pageclass != '') ? $pageclass.' logged-in' : 'logged-in' ;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="head" />

    <!--[if lt IE 9]>
      <script type="text/javascript" src="<?php echo $this->baseurl."/templates/".$this->template."/js/html5shiv.js"?>"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,400i|Roboto+Slab:300,400,700&amp;subset=latin-ext" media="screen">
    <link rel="stylesheet" href="<?php echo $this->baseurl."/templates/".$this->template."/css/style.css" ?>" media="screen">
    <link rel="stylesheet" href="<?php echo $this->baseurl."/templates/".$this->template."/css/articles.css" ?>" media="screen">

    <!--[if lt IE 9]>
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie-fix.css" type="text/css" />
    <![endif]-->

  </head>
  <body <?php if ($pageclass != '') echo 'class="'.htmlspecialchars($pageclass).'"';?>>
    <nav id="menu" class="loading">
      <a href="#content" class="tab-hidden">Przejdź do zawartości strony</a>
      <a href=".">
        <img alt="XIX LO im. Powstańców Warszawy" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/page-content/logo-shadow.png" class="logo">
      </a>
      <input type="checkbox" id="toggle-menu" />
      <label class="hamburger-cont" for="toggle-menu">
        <div class="hamburger-text">MENU</div>
        <div class="hamburger">
          <div class="middle-bar"></div>
        </div>
      </label>
      <jdoc:include type="modules" name="menu" />
    </nav>

    <jdoc:include type="modules" name="banner" />

    <div class="container">
      <div class="row" id="content">

        <jdoc:include type="message" />

        <jdoc:include type="modules" name="breadcrumbs" />

        <jdoc:include type="component" />

        <aside>

          <jdoc:include type="modules" name="sidebar" />

        </aside>
      </div>
    </div>

    <jdoc:include type="modules" name="footer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" charset="utf-8"></script>
    <script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js" charset="utf-8"></script>
    <script src="https://use.fontawesome.com/df7081a616.js" charset="utf-8"></script>

    <?php
      if( strrpos($pageclass, "gallery") >= 0 || strrpos($pageclass, "gallery-all") >= 0 ){
    ?>
    <script src="<?php echo $this->baseurl."/templates/".$this->template."/js/jquery.colorbox.js" ?>" charset="utf-8"></script>
    <script>
      $(document).ready(function(){
        var cboxDefaultSettings = {
          rel: "group",
          slideshow: false,
          opacity: 0.8,
          previous: "",
          next: "",
          close: "",
          maxWidth: "80%",
          maxHeight: "80%",
          current: "Zdjęcie {current} z {total}",
          onLoad: function(){
            $("#colorbox").find("#cboxTitle, #cboxCurrent, #cboxClose").addClass("hidden");
          },
          onComplete: function(){
            $("#colorbox").find("#cboxTitle, #cboxCurrent, #cboxClose").removeClass("hidden");
          }
        };

        var group = Object.assign({}, cboxDefaultSettings);
        group.loop = false;
        group.photo = true;

        var yt = Object.assign({}, cboxDefaultSettings);
        yt.iframe = true;
        yt.innerWidth = 640;
        yt.innerHeight = 390;
        yt.className = "youtube";

        $(".colorbox").colorbox(group);
        $(".youtube").colorbox(yt);
      });
    </script>
    <?php
      }
    ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-91325461-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
