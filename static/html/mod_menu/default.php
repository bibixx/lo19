<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if (($tagId = $params->get('tag_id', '')))
{
	$id = ' id="' . $tagId . '"';
}

// The menu class is deprecated. Use nav instead
?>

<ul class="nav menu<?php echo $class_sfx; ?>"<?php echo $id; ?>>
<?php foreach ($list as $i => &$item)
{
	$class = '';

	if (($item->id == $active_id) || ($item->type == 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		$class .= 'current-page ';
	}

	if ($item->type == 'separator')
	{
		$class .= 'divider ';
	}

	$class .= $item->anchor_css;

	if( $class !== "" ){
		// echo "<li>" . json_encode($item) . "</li>";
		echo '<li tabindex="0" href="#" class="' . $class . '">';
	} else {
		echo '<li tabindex="0" href="#">';
	}

	switch ($item->type) :
		case 'separator':
		case 'component':
		case 'heading':
		case 'url':
			if ($item->deeper){
				require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type.'_deeper');
			} else {
				require JModuleHelper::getLayoutPath('mod_menu', 'default_' . $item->type);
			}
			break;

		default:
			if ($item->deeper){
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url_deeper');
			} else {
				require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			}
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		echo '<ul class="submenu">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?></ul>
