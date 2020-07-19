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
<html class="offline" lang="pl-pl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
      $document = &JFactory::getDocument();
      $document->_styleSheets = Array();
      $document->_custom = Array();
      $headData = $document->getHeadData();

      // print_r($headData);
    ?>

    <jdoc:include type="head" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,400i|Roboto+Slab:300,400&amp;subset=latin-ext" media="screen">
    <link rel="stylesheet" href="<?php echo $this->baseurl."/templates/".$this->template."/css/style.css" ?>" media="screen">

    <?php
      if( $pageclass === "gallery" ){
    ?>
    <link rel="stylesheet" href="<?php echo $this->baseurl."/templates/".$this->template."/css/colorbox.css" ?>" media="screen">
    <?php
      }
    ?>

    <!--[if lt IE 9]>
      <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie-fix.css" type="text/css" />
    <![endif]-->
  </head>
  <body class="offline">
    <div class="container">
      <div class="row">
        <main>
          <h1>
            <?php echo htmlspecialchars($app->get('sitename'), ENT_COMPAT, 'UTF-8'); ?>
          </h1>

          <?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
        		<h3>
        			<?php echo $app->get('offline_message'); ?>
        		</h3>
        	<?php elseif ($app->get('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != '') : ?>
        		<h3>
        			<?php echo JText::_('JOFFLINE_MESSAGE'); ?>
        		</h3>
        	<?php endif; ?>
            <h2>
              <jdoc:include type="message" />
            </h2>
        	<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="form-login">
          		<p id="form-login-username">
          			<label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
                <br>
          			<input name="username" id="username" type="text" class="inputbox" alt="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" autocomplete="off" autocapitalize="none" />
          		</p>
          		<p id="form-login-password">
          			<label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
                <br>
          			<input type="password" name="password" class="inputbox" alt="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" id="passwd" />
          		</p>
          		<?php if (count($twofactormethods) > 1) : ?>
          			<p id="form-login-secretkey">
          				<label for="secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?></label>
                  <br>
          				<input type="text" name="secretkey" class="inputbox" alt="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>" id="secretkey" />
          			</p>
          		<?php endif; ?>
          		<p id="submit-button">
          			<input type="submit" name="Submit" class="button login" value="<?php echo JText::_('JLOGIN'); ?>" />
          		</p>
          		<input type="hidden" name="option" value="com_users" />
          		<input type="hidden" name="task" value="user.login" />
          		<input type="hidden" name="return" value="<?php echo base64_encode(JUri::base()); ?>" />
          		<?php echo JHtml::_('form.token'); ?>
        	</form>
        </main>
      </div>
    </div>

    <jdoc:include type="modules" name="footer" />

    <script src="https://use.fontawesome.com/df7081a616.js" charset="utf-8"></script>
  </body>
</html>
