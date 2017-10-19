<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
			<span class="hits" title="<?php echo JText::_('COM_CONTENT_ARTICLE_HITS_PLAIN'); ?>">
				<i class="fa fa-eye" aria-hidden="true"></i>
				<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $displayData['item']->hits; ?>" />
				<?php echo $displayData['item']->hits; ?>
			</span>
