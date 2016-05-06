<?php
/**
 * Plugin Name: GlotPress Master Glossary
 * Author: Automattic
 * Version: 0.1
 */

/**
 * The id of the project that should be used as a master glossary.
 * Define this in wp-config.php
 */
// define( 'GP_MASTER_GLOSSARY_PROJECT', <intval> );

add_filter( 'gp_get_translation_set_glossary', function( $glossary, $project, $translation_set ) {

	if ( ! defined( 'GP_MASTER_GLOSSARY_PROJECT' ) ) {
		return $glossary;
	}

	$main_translation_set = GP::$translation_set->by_project_id_slug_and_locale( GP_MASTER_GLOSSARY_PROJECT, $translation_set->slug , $translation_set->locale );

	if ( ! $main_translation_set ) {
		return $glossary;
	}

	$master_glossary = GP::$glossary->by_set_id( $main_translation_set->id );

	if ( ! is_array( $glossary ) ) {
		return $master_glossary;
	}

	return array_merge( $glossary, $master_glossary );
}, 10, 3 );
