<?php 
    $steps = isset($args['steps']) ? $args['steps'] : array(
        array(
            'text' => ''
        )
    );
?>
<ol class="clean-list progress-list" role="list">
    <?php 
        $index = 1;
        foreach($steps as $step) : 
    ?>
    <li class="progress-step complete">
        <span class="visuallyhidden">Completed: </span>
        <a href="" class="progress-step__inner">
            <div class="progress-step__marker complete" aria-hidden="true"><?php echo $index ?></div>
            <span><?php echo $step ?></span>
        </a>
    </li>
    <?php $index++; endforeach; ?>
</ol>