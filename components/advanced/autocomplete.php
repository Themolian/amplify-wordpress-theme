<?php
    $class = isset($args['class']) ? $args['class'] : null;
    $default_option = isset($args['default_option']) ? $args['default_option'] : null;
    $list_title = isset($args['list_title']) ? $args['list_title'] : null;
    // Array with two items: value, data-alt and label
    $options = isset($args['options']) ? $args['options'] : null;
?>
<div class="component<?php echo isset($class) ? ' ' . $class : '' ?>">
    <div class="field">
        <label for="<?php echo slugify($list_title) ?>">
            <span class="field-label"><?php echo $list_title ?></span>
        </label>
        <select id="<?php echo slugify($list_title) ?>">
            <option value=""><?php echo $default_option ?></option>
            <?php foreach($options as $option) : ?>
                <option value="<?php echo $option['value'] ?>" data-alt="<?php echo $option['data-alt'] ?>"><?php echo $option['label'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>