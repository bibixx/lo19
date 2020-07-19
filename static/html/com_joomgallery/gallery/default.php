<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<?php
      if($this->params->get('show_count_top')): ?>
  <div class="jg_galcountcats">
<?php   if($this->total == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_GALLERY_THERE_IS_ONE_CATEGORY_IN_GALLERY'); ?>
<?php   endif;
        if($this->total > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_GALLERY_THERE_ARE_CATEGORIES_IN_GALLERY', $this->total); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_top')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif;
      if($this->_config->get('jg_showallcathead')): ?>
  <div class="well well-small jg-header">
    <?php echo JText::_('COM_JOOMGALLERY_COMMON_CATEGORIES'); ?>
  </div>
  <?php endif; ?>
  <main id="content">
    <?php
      $this->i  = 0;
      $num_rows = ceil(count($this->rows ) / $this->_config->get('jg_colcat'));
      $index    = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++):?>
<?php   for($col_count = 0; (($col_count < $this->_config->get('jg_colcat')) && ($index < count($this->rows))); $col_count++):
          $row = $this->rows[$index]; ?>
    <section>
<?php     if($row->thumb_src): ?>
      <header>
        <h2>
          <a href="<?php echo $row->link; ?>">
            <?php echo $this->escape($row->name); ?>
          </a>
        </h2>
      </header>
      <main>
        <a
          title="<?php echo $row->name; ?>"
          href="<?php echo $row->link ?>"
          class="gallery-image<?php
            list($width, $height) = getimagesize($row->thumb_src);
            if ($width <= $height) {
              echo " gallery-vertical";
            }
          ?>"
          >
          <div class="con" style="background-image: url('<?php echo $row->thumb_src; ?>')"></div>
        </a>
      </main>
<?php     endif; ?>
<?php     //TODO: config option? -> add possibility of solution without javascript (like it had been before dtree was added)
          if($this->_config->get('jg_showsubsingalleryview')):
            JHTML::_('joomgallery.categorytree', $row->cid, $row->textcontainer);
          endif; ?>
    </section>
<?php     $index++;
        endfor; ?>
  </main>
<?php   $this->i++;
      endfor;
      if($this->_config->get('jg_showallcathead')): ?>
  <div class="jg-footer">
    &nbsp;
  </div>
<?php endif;
      if($this->params->get('show_count_bottom')): ?>
  <div class="jg_galcountcats">
<?php   if($this->total == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_GALLERY_THERE_IS_ONE_CATEGORY_IN_GALLERY'); ?>
<?php   endif;
        if($this->total > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_GALLERY_THERE_ARE_CATEGORIES_IN_GALLERY', $this->total); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_bottom')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif; ?>
