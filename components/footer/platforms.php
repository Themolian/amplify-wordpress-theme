<?php 
    $client_name = '';
    $platforms = get_field('platforms', 'options');
?>
<?php if($platforms && !empty($platforms)) : ?>
    <div class="footer-platforms">
            <ul class="clean-list">
                <?php foreach($platforms as $platform): ?>
                    <li><a href="<?php echo $platform['platform_link']['url'] ?>">
                        <span class="visuallyhidden"><?php echo $client_name ?> is on <?php echo $platform['platform_name'] ?></span>
                        <img src="<?php echo get_template_directory_uri(); ?>/dist/svg/<?php echo strtolower($platform['platform_name']); ?>.svg" alt="">
                    </a></li>
                <?php endforeach; ?>
            </ul>
    </div>
<?php endif; ?>