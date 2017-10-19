<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
$params = $displayData->params;
?>
<?php $images = json_decode($displayData->images); ?>
<?php if (isset($images->image_intro) && !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>

	<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
		<a class="intro-image" href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($displayData->slug, $displayData->catid, $displayData->language)); ?>">
			<div
			<?php if ($images->image_intro_caption) : ?>
				<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
			<?php endif; ?>
			class="con" style="background-image: url('<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>')" itemprop="thumbnailUrl"></div>
		</a>
	<?php else : ?>
		<div class="intro-image">
			<div
			<?php if ($images->image_intro_caption) : ?>
				<?php echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_intro_caption) . '"'; ?>
			<?php endif; ?>
			class="con" style="background-image: url('<?php echo htmlspecialchars($images->image_intro, ENT_COMPAT, 'UTF-8'); ?>')" itemprop="thumbnailUrl"></div>
		</div>
	<?php endif; ?>
<?php endif; ?>
