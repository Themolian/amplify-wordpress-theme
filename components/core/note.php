<?php
    $heading = '';
    /**
     * Note types:
     * info (blue)
     * success (green)
     * warning (orange)
     * error (red)
     */
    $type = 'info';
    $body = '';
?>
<div class="component">
    <div class="note note--info" role="<?php echo $type == 'error' ? 'alert' : 'status' ?>">
        <h2 class="note__heading">$heading</h2>
        <?php echo $body ?>
    </div>
</div>