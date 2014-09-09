<?php

/**
 * Add meta boxes
 */
function pronamic_persons_add_meta_boxes() {
	add_meta_box(  
		'pronamic_persons_meta_box',
		__( 'Person details', 'pronamic_persons' ),
		'pronamic_persons_meta_box',
		'pronamic_person',
		'normal',
		'high'
	);
}

add_action( 'add_meta_boxes', 'pronamic_persons_add_meta_boxes', 10, 2 );

/**
 * Print subscription metabox
 */
function pronamic_persons_meta_box( $post ) {
	wp_nonce_field( 'pronamic_persons_save_meta_box_nonce', 'pronamic_persons_meta_box_nonce' );

	?>

	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_email_address">
						<?php _e( 'Email address', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_email_address" name="_pronamic_persons_email_address" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_email_address', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_phone_number">
						<?php _e( 'Phone number', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_phone_number" name="_pronamic_persons_phone_number" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_phone_number', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_company">
						<?php _e( 'Company', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_company" name="_pronamic_persons_company" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_company', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_address">
						<?php _e( 'Address', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_address" name="_pronamic_persons_address" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_address', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_zip_code">
						<?php _e( 'Zip code', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_zip_code" name="_pronamic_persons_zip_code" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_zip_code', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_city">
						<?php _e( 'City', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_city" name="_pronamic_persons_city" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_city', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="pronamic_persons_website">
						<?php _e( 'Website', 'pronamic_persons' ); ?>
					</label>
				</th>
				<td>
					<input id="pronamic_persons_website" name="_pronamic_persons_website" value="<?php echo esc_attr( get_post_meta( $post->ID, '_pronamic_persons_website', true ) ); ?>" type="text" size="20" class="regular-text" />
				</td>
			</tr>
		</tbody>
	</table>

	<?php
}

/**
 * Save subscription metabox
 */
function pronamic_persons_save_meta_box( $post_id ) {
	global $post;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { 
    	return;
    }

	if ( ! isset( $_POST['pronamic_persons_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['pronamic_persons_meta_box_nonce'], 'pronamic_persons_save_meta_box_nonce' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post' ) ) {
		return;
	}

	$data = filter_input_array( INPUT_POST, array(
		'_pronamic_persons_email_address' => FILTER_SANITIZE_STRING,
		'_pronamic_persons_phone_number'  => FILTER_SANITIZE_STRING,
		'_pronamic_persons_company'       => FILTER_SANITIZE_STRING,
		'_pronamic_persons_address'       => FILTER_SANITIZE_STRING,
		'_pronamic_persons_zip_code'      => FILTER_SANITIZE_STRING,
		'_pronamic_persons_city'          => FILTER_SANITIZE_STRING,
		'_pronamic_persons_website'       => FILTER_SANITIZE_STRING,
	) );

	foreach ( $data as $key => $value ) {
		update_post_meta( $post_id, $key, $value );
	}
}

add_action( 'save_post', 'pronamic_persons_save_meta_box' );
