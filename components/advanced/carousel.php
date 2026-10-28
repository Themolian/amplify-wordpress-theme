<?php 
    $images = isset($args['images']) ? $args['images'] : null;
?>
<div class="splide" data-component="carousel" role="group" aria-label="">
    <div class="splide__track">
        <?php if(!empty($images)) : ?>
            <ul class="splide__list">
                <?php foreach($imageas as $image) : ?>
                    <li class="splide__slide">
                        <div class="l-frame">
                            <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" width="<?php echo $image['width'] ?>" height="<?php echo $image['height'] ?>">
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>