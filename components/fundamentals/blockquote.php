<?php 
    $quote = '';
    $citation = ''
?>
<blockquote>
    <?php echo quote; ?>
    <?php if($citation) : ?>
    <footer><?php echo $citation ?></footer>
    <?php endif; ?>
</blockquote>