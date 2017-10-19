<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
      if($this->_config->get('jg_anchors')): ?>
<?php endif;
      if($this->params->get('show_count_img_top')): ?>
  <div class="jg_catcountimg">
<?php   if($this->totalimages == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_IMAGE_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalimages > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_IMAGES_IN_CATEGORY', $this->totalimages); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_img_top')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif;
      if($this->params->get('show_all_in_popup')):
        echo $this->popup['before'];
      endif;
      $count_pics = count($this->images);
      $column     = $this->_config->get('jg_colnumb');
      $num_rows   = ceil($count_pics / $column);
      $index      = 0;
      $this->i    = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++): ?>

<?php   for($col_count = 0; ($col_count < $column) && ($index < $count_pics); $col_count++):
          $row = $this->images[$index]; ?>
    <section>
      <main>
        <?php
          $imageLink = $row->link;
          $title = $row->atagtitle;
          $thumbSrc = $row->thumb_src;
          $classNames = "";
          if(preg_match("/\[(.*)\]\(http[s]?:\/\/(?:www.)?youtube.com\/.*=(.*)\)/", $row->atagtitle, $link)) {
            $imageLink = "http://www.youtube.com/embed/".$link[2]."?rel=0&wmode=transparent";
            $thumbSrc = "https://img.youtube.com/vi/".$link[2]."/sddefault.jpg";
            $title = 'title="'.$link[1].'"';
            $classNames .= " youtube";
          }

          list($width, $height) = getimagesize($thumbSrc);
          if ($width <= $height) {
            $classNames .= " gallery-vertical";
          }
        ?>
        <a <?php echo $title; ?> href="<?php echo $imageLink; ?>" class="gallery-image colorbox<?php echo $classNames ?>">
          <div class="con" style="background-image: url('<?php echo $thumbSrc; ?>')"></div>
        </a>
      </main>
    </section>
<?php     $index++;
        endfor; ?>

<?php endfor;
      if($this->params->get('show_all_in_popup')):
        echo $this->popup['after'];
      endif;
      if($this->_config->get('jg_showcathead')): ?>
  <div class="jg-footer">
    &nbsp;
  </div>
<?php endif;
      if($this->params->get('show_count_img_bottom')): ?>
  <div class="jg_catcountimg">
<?php   if($this->totalimages == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_IMAGE_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalimages > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_IMAGES_IN_CATEGORY', $this->totalimages); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_img_bottom')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif;
