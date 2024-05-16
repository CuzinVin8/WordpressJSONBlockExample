<?php
/**
 * Block template file: C:\Users\Vincent\Local Sites\efknew\app\public/wp-content/themes/efk-group-child/template-parts/blocks/videogrid.php
 *
 * Videogrid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'videogrid-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-videogrid';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> parent">
	<?php if ( have_rows( 'grid_items' ) ) : $ct=1; ?>
		<?php while ( have_rows( 'grid_items' ) ) : the_row(); ?>
			<div class="div<?php echo $ct; ?> diver">  <!--- div counter --->
				<?php if(get_sub_field( 'grid_item_background_type' ) == 'image'){ ?>  <!--- image bg --->	
					<?php $grid_item_background_image = get_sub_field( 'grid_item_background_image' ); ?>
					<div class="itemHold">
						<div class="video-container video-container<?php echo $ct; ?>" style="background-image:url(<?php echo $grid_item_background_image['url']; ?>);background-size:cover;background-position:center center;">
							<div class="gridboxpad">
								<?php if ( get_sub_field( 'grid_item_heading_image' ) ) : ?>
									<img class="vidtitleimg" src="<?php the_sub_field( 'grid_item_heading_image' ); ?>" alt="<?php the_sub_field( 'grid_item_heading' ); ?>" />
								<?php endif ?>
							</div>
						</div>
						<?php if ( get_sub_field( 'grid_item_description_left' ) ) : ?>
							<div class="underwriter">	  
								<div class="flexhalf">
									<p><?php the_sub_field( 'grid_item_description_left' ); ?></p>
									<?php $grid_item_link = get_sub_field( 'grid_item_link' ); ?>
									<?php if ( $grid_item_link ) : ?><div class="smbtn"><a class="gridbtn" href="<?php echo esc_url( $grid_item_link['url'] ); ?>" target="<?php echo esc_attr( $grid_item_link['target'] ); ?>"><img width="100" src="/wp-content/uploads/2023/01/explore-button.svg" /></a></div><?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php } else if(get_sub_field( 'grid_item_background_type' ) == 'video'){ ?> <!--- video bg --->
					<div class="itemHold">
						<div class="video-container video-container<?php echo $ct; ?>">
							<video id="background-video" autoplay loop muted>
							<source src="<?php echo get_sub_field( 'grid_item_background_video' ); ?>" type="video/mp4">
							</video>
							<div class="gridboxpad <?php if(get_sub_field( 'grid_block_align' ) == 'left'){ echo 'gbpleft'; } ?>">
								<?php if ( get_sub_field( 'grid_item_heading_image' ) ) : ?>
									<img class="vidtitleimg" src="<?php the_sub_field( 'grid_item_heading_image' ); ?>" alt="<?php the_sub_field( 'grid_item_heading' ); ?>" />
								<?php endif ?>
							</div>
						</div>
						<?php if ( get_sub_field( 'grid_item_description_left' ) ) : ?>
							<div class="underwriter">
								<div class="flexhalf">
									<p><?php the_sub_field( 'grid_item_description_left' ); ?></p>
									<?php $grid_item_link = get_sub_field( 'grid_item_link' ); ?>
									<?php if ( $grid_item_link ) : ?><div class="smbtn"><a class="gridbtn" href="<?php echo esc_url( $grid_item_link['url'] ); ?>" target="<?php echo esc_attr( $grid_item_link['target'] ); ?>"><img width="100" src="/wp-content/uploads/2023/01/explore-button.svg" /></a></div><?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				<?php } else { ?>  <!--- video bg style 2--->
					<div class="itemHold">
						<div class="video-container video-container<?php echo $ct; ?>">
							<video id="background-video" autoplay loop muted>
							<source src="<?php echo get_sub_field( 'grid_item_background_video' ); ?>" type="video/mp4">
							</video>
							<div class="gridboxpad <?php if(get_sub_field( 'grid_block_align' ) == 'left'){ echo 'gbpleft'; } ?>">
								<?php if ( get_sub_field( 'grid_item_heading_image' ) ) : ?>
									<img class="vidtitleimg vtihide" src="<?php the_sub_field( 'grid_item_heading_image' ); ?>" alt="<?php the_sub_field( 'grid_item_heading' ); ?>" />
								<?php endif ?>
								<?php if ( have_rows( 'grid_item_stats' ) ) : ?>
									<div class="slideStat">
										<?php while ( have_rows( 'grid_item_stats' ) ) : the_row(); ?>
											<?php $stat_image = get_sub_field( 'stat_image' ); ?>
											<?php if ( $stat_image ) : ?>
												<div><img src="<?php echo esc_url( $stat_image['url'] ); ?>" alt="<?php echo esc_attr( $stat_image['alt'] ); ?>" /></div>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php else : ?>
									<?php // No rows found ?>
								<?php endif; ?>
							</div>
						</div>
						<?php if ( get_sub_field( 'grid_item_description_left' ) ) : ?>
							<div class="underwriter">
								<div class="flexhalf">
									<p><h3><?php the_sub_field( 'grid_item_heading' ); ?></h3><?php the_sub_field( 'grid_item_description_left' ); ?></p>
									<?php $grid_item_link = get_sub_field( 'grid_item_link' ); ?>
									<?php if ( $grid_item_link ) : ?><div class="smbtn"><a class="gridbtn" href="<?php echo esc_url( $grid_item_link['url'] ); ?>" target="<?php echo esc_attr( $grid_item_link['target'] ); ?>"><img width="100" src="/wp-content/uploads/2023/01/explore-button.svg" /></a></div><?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php } ?>
				<?php $ct++; ?>  <!--- increment the div counter to match css layout styles --->
			</div>
		<?php endwhile; ?>
	<?php else : ?>
		<?php // No rows found ?>
	<?php endif; ?>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.slideStat').slick({
		autoplay: true,
		arrows: false,
		infinite: true,
		speed: 300
		});
	});
</script>