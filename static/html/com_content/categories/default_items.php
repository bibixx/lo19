<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$class = ' class="first"';
$lang  = JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1]))
		{
			$class = ' class="last"';
		}
		?>
		<section <?php echo $class; ?>>
			<header>
			<?php $class = ''; ?>
				<h2>
					<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));?>">
					<?php echo $this->escape($item->title); ?></a>
				</h2>
				<?php if ($this->params->get('show_description_image') && $item->getParams()->get('image')) : ?>
					<a class="intro-image" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id, $item->language));?>">
						<div class="con" style="background-image: url('<?php echo $item->getParams()->get('image'); ?>')"></div>
					</a>
				<?php endif; ?>
				<?php if ($this->params->get('show_subcat_desc_cat') == 1) :?>
					<?php if ($item->description) : ?>
						<div class="category-desc">
							<?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</header>
			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) :?>
				<div class="collapse fade" id="category-<?php echo $item->id;?>">
				<?php
				$this->items[$item->id] = $item->getChildren();
				$this->parent = $item;
				$this->maxLevelcat--;
				echo $this->loadTemplate('items');
				$this->parent = $item->getParent();
				$this->maxLevelcat++;
				?>
				</div>
			<?php endif; ?>
		</section>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
