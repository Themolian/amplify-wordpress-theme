<?php 
    $heading = '';
    $body = '';
    $link = array(
        'url' => '',
        'title' => ''
    );
    $image = array(
        'url' => '',
        'alt' => '',
        'width' => 640,
        'height' => 491
    );
?>
<div class="card">
    <div class="l-box card__text">
        <h3 class="card__heading"><?php echo $heading ?></h3>
        <?php echo $body; ?>
        <a class="button" href="<?php echo $link['url'] ?>"><span class="visuallyhidden"><?php echo $heading ?></span> <?php echo $link['title'] ?></a>
    </div>
    <div class="l-frame card__image">
        <img src="<?php echo $image['url'] ?>" width="640" height="491" alt="<?php echo $image['alt'] ?>" loading="lazy">
    </div>
</div>