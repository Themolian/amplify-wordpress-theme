<?php 
    $video = array(
        $title => isset($args['video']['title']) ? $args['video']['title'] : '',
        $src => isset($args['video']['src']) ? $args['video']['src'] : '',
        $caption => isset($args['video']['caption']) ? $args['video']['caption'] : '',
        $transcript_link => isset($args['video']['transcript_link']) ? $args['video']['transcript_link'] : '',
        $width => isset($args['video']['width']) ? $args['video']['width'] : '',
        $height => isset($args['video']['height']) ? $args['video']['height'] : '',
    )
?>
<figure class="component component--video">
    <div class="l-frame">
        <iframe title="<?php echo $video['title'] ?>" loading="lazy" width="<?php echo $video['width'] ?>" height="<?php echo $video['width'] ?>" src="<?php echo $video['src'] ?>" allowfullscreen></iframe>
    </div>
    <?php if(isset($video['caption'])) : ?>
        <figcaption>
            <p><?php echo $video['caption'] ?></p>
            <a href="<?php echo $video['transcript_link'] ?>">Video transcript</a>
        </figcaption>
    <?php endif; ?>
</figure>