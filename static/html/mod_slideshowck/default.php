<?php
/**
 * @copyright	Copyright (C) 2012 Cedric KEIFLIN alias ced1870
 * http://www.joomlack.fr
 * Module Slideshow CK
 * @license		GNU/GPL
 * */
// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<header id="banner">
	<ul class="slideshow">
	<?php
		foreach ($items as $i => $item) {
	?>
		<li style="background-image: url('<?php echo $item->imgname; ?>'); <?php echo $item->imgtitle ?>"></li>
	<?php } ?>
	</ul>

	<h1><span>XIX Liceum Ogólnokształcące</span><span>im. Powstańców Warszawy</span></h1>
	<cite>„Niech ku przyszłości dążą pokolenia”</cite>
	<address>ul. Zbaraska 1<br>
04-014 Warszawa<br>
tel./fax: (22) 810 38 29<br>
	<a class="school-email" href="mailto:lo19@edu.um.warszawa.pl">lo19@edu.um.warszawa.pl</a></address>
</header>
