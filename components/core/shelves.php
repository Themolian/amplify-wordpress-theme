<?php 
    $intro = array(
        'heading' => isset($args['intro']['heading']) ? $args['intro']['heading'] : '',
        'text' => isset($args['intro']['text']) ? $args['intro']['text'] : ''
    );
    $cards = isset($args['cards']) ? $args['cards'] : '';
?>
<div class="component component--shelves">
    <?php if(!empty($intro)) : ?>
        <div class="component--shelves__intro">
            <?php if(!empty($intro['heading'])) : ?>
                <h2><?php echo $intro['heading'] ?></h2>
            <?php endif; ?>
            <?php if($intro['text']) : ?>
                <?php echo $intro['text']; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if(!empty($cards)) : ?>
        <ul class="component--shelves__items clean-list" role="presentation">
            <?php foreach($cards as $card) : ?>
            <li>
                <?php get_template_part('components/core/card', null, array(
                    'heading' => $card['heading'],
                    'body' => $card['body'],
                    'link' => $card['link'],
                    'image' => $card['image'],
                )) ?>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>