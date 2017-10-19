<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
      if($this->params->get('show_count_cat_top')): ?>
  <div class="jg_catcountsubcats">
<?php   if($this->totalcategories == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_SUBCATEGORY_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalcategories > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_SUBCATEGORIES_IN_CATEGORY', $this->totalcategories); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_cat_top')): ?>
  <div class="pagination">
    <?php echo $this->catpagination->getPagesLinks(); ?>
  </div>
<?php endif; ?>
<?php if($this->_config->get('jg_showsubcathead')): ?>
    <div class="well well-small jg-header">
<?php if($this->params->get('show_feed_icon')): ?>
      <div class="jg_feed_icon">
        <a href="<?php echo $this->params->get('feed_url'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_CATEGORY_FEED_SUBCATEGORIES_TIPTEXT', 'COM_JOOMGALLERY_CATEGORY_FEED_TIPCAPTION', true); ?>>
          <?php echo JHtml::_('joomgallery.icon', 'feed.png', 'COM_JOOMGALLERY_CATEGORY_FEED_TIPCAPTION'); ?>
        </a>
      </div>
<?php $this->params->set('show_feed_icon', 0);
      endif;
      if($this->params->get('show_upload_icon')): ?>
      <div class="jg_upload_icon">
        <a href="<?php echo JRoute::_('index.php?view=mini&format=raw&upload_category='.$this->category->cid); ?>" class="modal<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPTEXT', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?>" rel="{handler: 'iframe', size: {x: 620, y: 550}}">
          <?php echo JHtml::_('joomgallery.icon', 'add.png', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?>
        </a>
      </div>
<?php $this->params->set('show_upload_icon', 0);
      endif; ?>
      <?php echo JText::_('COM_JOOMGALLERY_COMMON_SUBCATEGORIES'); ?>
    </div>
<?php endif;
      $cat_count = count($this->categories);
      $num_rows  = ceil($cat_count / $this->_config->get('jg_colsubcat'));
      $index     = 0;
      $this->i   = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++): ?>
<?php   for($col_count = 0; ($col_count < $this->_config->get('jg_colsubcat')) && ($index < $cat_count); $col_count++):
          $row = $this->categories[$index]; ?>
      <section>
<?php
          if($this->_config->get('jg_showsubthumbs')): ?>
<?php       if($row->thumb_src): ?>
        <header>
            <h2>
              <a href="<?php echo $row->link; ?>">
                <?php echo $this->escape($row->name); ?>
              </a>
            </h2>
        </header>
        <main>
          <a class="gallery-image<?php
            list($width, $height) = getimagesize($row->thumb_src);
            if ($width <= $height) {
              echo " gallery-vertical";
            }
          ?>" title="<?php echo $row->name; ?>" href="<?php echo $row->link; ?>">
            <div class="con" style="background-image: url('<?php echo $row->thumb_src; ?>')"></div>
          </a>
        </main>
<?php       endif;
          endif;
          if($this->_config->get('jg_showsubthumbs') && $row->thumb_src):?>
<?php     endif; ?>
      </section>
<?php     $index++;
        endfor; ?>
<?php endfor;
      if($this->params->get('show_count_cat_bottom')): ?>
    <div class="jg_catcountsubcats">
<?php   if($this->totalcategories == 1): ?>
      <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_SUBCATEGORY_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalcategories > 1): ?>
      <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_SUBCATEGORIES_IN_CATEGORY', $this->totalcategories); ?>
<?php   endif; ?>
    </div>
<?php endif;
      if($this->params->get('show_pagination_cat_bottom')): ?>
    <div class="pagination">
      <?php echo $this->catpagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>
