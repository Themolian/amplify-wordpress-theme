<?php 
    $heading = isset($args['heading']) ? $args['heading'] : null;
    $body = isset($args['body']) ? $args['body'] : null;
    $image = array(
        'url' => isset($args['image']['url']) ? $args['image']['url'] : null,
        'alt' => isset($args['image']['alt']) ? $args['image']['alt'] : null,
        'width' => isset($args['image']['width']) ? $args['image']['width'] : null,
        'height' => isset($args['image']['height']) ? $args['image']['height'] : null,
    );
    $link = isset($args['link']) ? $args['link'] : null;
?>
<div class="card" data-component="card">
    <div class="l-box card__text">
        <h3 class="card__heading"><a class="card__link" href="<?php echo $link ?>"><?php echo $heading ?></a></h3>
        <?php echo $body ?>
    </div>
    <div class="l-frame card__image">
        <img src="<?php echo $image['url'] ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>" alt="<?php echo $image['alt'] ?>" loading="lazy">
    </div>
</div>