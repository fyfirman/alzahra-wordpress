<div class="sb">
    <?php if ( ! dynamic_sidebar( 'blog' ) ) : ?>
        <div class="tagcloud tags">
            <?php the_tags(' ',' '); ?>
        </div>
    <?php endif; ?>
</div>