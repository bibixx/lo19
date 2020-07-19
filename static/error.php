<?php
/**
 * @package     Joomla.Site
 * @subpackage  Template.system
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (!isset($this->error))
{
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

// Get language and direction
$doc             = JFactory::getDocument();
$app             = JFactory::getApplication();
$this->language  = $doc->language;
$this->direction = $doc->direction;
?>

<!DOCTYPE html>
<html class="offline error" lang="pl-pl">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
  <body>
    <div class="container">
      <div class="row">
        <main>
          <h1>
            <?php echo htmlspecialchars($app->get('sitename'), ENT_COMPAT, 'UTF-8'); ?>
          </h1>

      		<h2>
      			Błąd <?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
      		</h2>

          <?php if ($this->error->getCode() == "404") { ?>
            <h3>Niestety strona, której szukałeś nie jest dostępna.</h3>
            <h3>Odwiedź <a href="/">stronę główną</a> i spróbuj zacząć od nowa.</h3>
          <?php } ?>
        </main>
      </div>
    </div>

    <?php
      $modules = JModuleHelper::getModules( 'footer' );
      $attribs['style'] = 'xhtml';
      foreach ($modules AS $module ) {
        $module = json_decode(json_encode($module), true);
        if ($module["title"] === "Stopka") {
          echo $module["content"];
        }
      }
    ?>

    <script src="https://use.fontawesome.com/df7081a616.js" charset="utf-8"></script>
  </body>
</html>
