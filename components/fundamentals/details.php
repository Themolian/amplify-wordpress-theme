<?php 
// This is good for accordion items
$heading = isset($args['heading']) ? $args['heading'] : '';
$body = isset($args['body']) ? $args['body'] : '';
?>
<details>
    <summary><?php echo $heading ?></summary>
    <?php echo $body ?>
</details>