<?php
/**
 * Gallery Page — Filters.
 *
 * @package Greshma
 */

defined( 'ABSPATH' ) || exit;

$gallery_categories = get_terms(
	array(
		'taxonomy'   => 'greshma_gallery_category',
		'hide_empty' => true,
		'orderby'    => 'name',
		'order'      => 'ASC',
	)
);
?>

<section class="gallery-filters">

    <div class="container">

        <div
            class="gallery-filters__bar"
            data-gallery-filter-bar
        >

            <!-- ==========================================
                 FILTER PILLS
            =========================================== -->

            <div class="gallery-filters__categories">

              <button
	type="button"
	class="gallery-filter is-active"
	data-gallery-filter="all"
>
	<?php esc_html_e( 'All', 'greshma' ); ?>
</button>

<?php if (
	! empty( $gallery_categories ) &&
	! is_wp_error( $gallery_categories )
) : ?>

	<?php foreach ( $gallery_categories as $gallery_category ) : ?>

		<button
			type="button"
			class="gallery-filter"
			data-gallery-filter="<?php echo esc_attr( $gallery_category->slug ); ?>"
		>
			<?php echo esc_html( $gallery_category->name ); ?>
		</button>

	<?php endforeach; ?>

<?php endif; ?>

            </div>


            <!-- ==========================================
                 VIEW TOGGLE
            =========================================== -->

            <div class="gallery-filters__view">

                <button
                    type="button"
                    class="gallery-view-toggle is-active"
                    data-gallery-view="grid"
                    aria-label="Grid view"
                    title="Grid view"
                >
                    <span aria-hidden="true">
                        ▦
                    </span>
                </button>


                <button
                    type="button"
                    class="gallery-view-toggle"
                    data-gallery-view="list"
                    aria-label="List view"
                    title="List view"
                >
                    <span aria-hidden="true">
                        ☷
                    </span>
                </button>

            </div>

        </div>

    </div>

</section>