<?php
/**
 * Template Helper Functions
 *
 * @package Greshma_Portfolio
 */

defined( 'ABSPATH' ) || exit;

/**
 * Returns the URL for a page by its slug.
 *
 * Falls back to the homepage if the page is not found.
 *
 * @param string $slug Page slug.
 * @return string
 */
function greshma_page_url( $slug ) {

    $page = get_page_by_path( $slug );

    if ( $page ) {
        return get_permalink( $page->ID );
    }

    return home_url( '/' );

}