<?php get_header(); ?>

<div class="row">
	<div class="col-md-8">
		<div id="core" role="main">
			<div class="block">
				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h1 class="entry-title"><?php the_title(); ?></h1>
						</header>
				
						<div class="entry-content clearfix">
							<?php the_content(); ?>
						</div>
					</article>

				<?php endwhile; ?>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<?php if ( is_active_sidebar( 'subscriptions-sidebar' ) ) : ?> 

			<?php dynamic_sidebar( 'subscriptions-sidebar' ); ?>

		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>