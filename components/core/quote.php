<?php 
    $quote = isset($args['quote']) ? $args['quote'] : '';
    $citation = isset($args['citation']) ? $args['citation'] : '';
?>
<blockquote class="component component--quote">
    <?php echo $quote ?>
    <footer><?php echo $citation ?></footer>
</blockquote>