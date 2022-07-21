<?php
/**
 * Send a Message Block.
 *
 * @package automattic/jetpack
 */

namespace Automattic\Jetpack\Extensions\Send_A_Message;

require_once __DIR__ . '/whatsapp-button/whatsapp-button.php';

use Automattic\Jetpack\Blocks;
use Jetpack_Gutenberg;

const FEATURE_NAME = 'send-a-message';
const BLOCK_NAME   = 'jetpack/' . FEATURE_NAME;

/**
 * Registers the block for use in Gutenberg
 * This is done via an action so that we can disable
 * registration if we need to.
 */
function register_block() {
	Blocks::jetpack_register_block(
		BLOCK_NAME,
		array(
			'render_callback' => __NAMESPACE__ . '\render_block',
			'plan_check'      => true,
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\register_block' );

/**
 * Render callback.
 *
 * @param array  $attributes Array containing the block attributes.
 * @param string $content    String containing the block content.
 *
 * @return string
 */
function render_block( $attributes, $content ) {
	Jetpack_Gutenberg::load_styles_as_required( FEATURE_NAME );

	return $content;
}
