<?php
/**
 * @package tvsc-data-editoriale
 * @version 1.0
 */
/*
Plugin Name: Tvsc Data Editoriale
Description: Plugin that adds data editoriale as meta box
Author: Eric Antonello
Author URI: http://ericantonello.com
*/

function tvsc_custom_metaboxes_data_editoriale() {
    add_meta_box(
        'tvsc_data_editoriale',
        'Data Editoriale',
        'get_tvsc_data_editoriale',
        'news',
        'side',
        'high',
        array( 'id' => 'data_editoriale')
    );

    add_meta_box(
        'tvsc_data_editoriale',
        'Data Editoriale',
        'get_tvsc_data_editoriale',
        'gigs',
        'side',
        'high',
        array( 'id' => 'data_editoriale')
    );

    add_meta_box(
        'tvsc_data_editoriale',
        'Data Editoriale',
        'get_tvsc_data_editoriale',
        'releases',
        'side',
        'high',
        array( 'id' => 'data_editoriale')
    );

    add_meta_box(
        'tvsc_data_editoriale',
        'Data Editoriale',
        'get_tvsc_data_editoriale',
        'photos',
        'side',
        'high',
        array( 'id' => 'data_editoriale')
    );
}

add_action( 'admin_init', 'tvsc_custom_metaboxes_data_editoriale' );

// Metabox HTML

function get_tvsc_data_editoriale($post, $args) {
    $metabox_id = $args['args']['id'];
    global $post, $wp_locale;

    // Use nonce for verification
    wp_nonce_field( plugin_basename( __FILE__ ), 'tvsc_data_editoriale_nonce' );

    $time_adj = current_time( 'timestamp' );
    $month = get_post_meta( $post->ID, $metabox_id . '_month', true );

    if ( empty( $month ) ) {
        $month = gmdate( 'm', $time_adj );
    }

    $day = get_post_meta( $post->ID, $metabox_id . '_day', true );

    if ( empty( $day ) ) {
        $day = gmdate( 'd', $time_adj );
    }

    $year = get_post_meta( $post->ID, $metabox_id . '_year', true );

    if ( empty( $year ) ) {
        $year = gmdate( 'Y', $time_adj );
    }

    $hour = get_post_meta($post->ID, $metabox_id . '_hour', true);

    if ( empty($hour) ) {
        $hour = gmdate( 'H', $time_adj );
    }

    $min = get_post_meta($post->ID, $metabox_id . '_minute', true);

    if ( empty($min) ) {
        $min = gmdate( 'i', $time_adj );
    }

    $month_s = '<select name="' . $metabox_id . '_month">';
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        $month_s .= "\t\t\t" . '<option value="' . zeroise( $i, 2 ) . '"';
        if ( $i == $month )
            $month_s .= ' selected="selected"';
        $month_s .= '>' . $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) ) . "</option>\n";
    }
    $month_s .= '</select>';

    echo $month_s;
    echo '<input type="text" name="' . $metabox_id . '_day" value="' . $day  . '" size="2" maxlength="2" />';
    echo '<input type="text" name="' . $metabox_id . '_year" value="' . $year . '" size="4" maxlength="4" /> @ ';
    echo '<input type="text" name="' . $metabox_id . '_hour" value="' . $hour . '" size="2" maxlength="2"/>:';
    echo '<input type="text" name="' . $metabox_id . '_minute" value="' . $min . '" size="2" maxlength="2" />';

}

// Save the Metabox Data

function tvsc_data_editoriale_save_meta( $post_id, $post ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( !isset( $_POST['tvsc_data_editoriale_nonce'] ) )
        return;

    if ( !wp_verify_nonce( $_POST['tvsc_data_editoriale_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ) )
        return;

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though

    $metabox_ids = array( 'data_editoriale', );

    foreach ($metabox_ids as $key ) {
        $events_meta[$key . '_month'] = $_POST[$key . '_month'];
        $events_meta[$key . '_day'] = $_POST[$key . '_day'];
        if($_POST[$key . '_hour']<10){
            $events_meta[$key . '_hour'] = '0'.$_POST[$key . '_hour'];
        } else {
            $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
        }
        $events_meta[$key . '_year'] = $_POST[$key . '_year'];
        $events_meta[$key . '_hour'] = $_POST[$key . '_hour'];
        $events_meta[$key . '_minute'] = $_POST[$key . '_minute'];
        $events_meta[$key] = $events_meta[$key . '_year'] . $events_meta[$key . '_month'] . $events_meta[$key . '_day'] . $events_meta[$key . '_hour'] . $events_meta[$key . '_minute'];
    }

    // Add values of $events_meta as custom fields

    foreach ( $events_meta as $key => $value ) { // Cycle through the $events_meta array!
        if ( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode( ',', (array)$value ); // If $value is an array, make it a CSV (unlikely)
        if ( get_post_meta( $post->ID, $key, FALSE ) ) { // If the custom field already has a value
            update_post_meta( $post->ID, $key, $value );
        } else { // If the custom field doesn't have a value
            add_post_meta( $post->ID, $key, $value );
        }
        if ( !$value ) delete_post_meta( $post->ID, $key ); // Delete if blank
    }

}

add_action( 'save_post', 'tvsc_data_editoriale_save_meta', 1, 2 );

/**
 * Helpers to display the date on the front end
 */

// Get the Month Abbreviation

function get_the_month_abbr($month) {
    global $wp_locale;
    for ( $i = 1; $i < 13; $i = $i +1 ) {
        if ( $i == $month )
            $monthabbr = $wp_locale->get_month_abbrev( $wp_locale->get_month( $i ) );
    }
    return $monthabbr;
}

// Display the date

function eventposttype_get_the_event_date() {
    global $post;
    $eventdate = '';
    $month = get_post_meta($post->ID, '_month', true);
    $eventdate = get_the_month_abbr($month);
    $eventdate .= ' ' . get_post_meta($post->ID, '_day', true) . ',';
    $eventdate .= ' ' . get_post_meta($post->ID, '_year', true);
    $eventdate .= ' at ' . get_post_meta($post->ID, '_hour', true);
    $eventdate .= ':' . get_post_meta($post->ID, '_minute', true);
    echo $eventdate;
}