<?php
/**
 * Theme Shortcodes
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// -----------------------------------------------------------------------------
// [year] – Outputs the current year
// Usage: © [year] My Company
// -----------------------------------------------------------------------------

add_shortcode( 'year', 'mv_shortcode_year' );

function mv_shortcode_year( $atts ) {
	$atts = shortcode_atts( [
		'format' => 'Y' // PHP date format
	], $atts );

	return esc_html( date( $atts['format'] ) );
}

// [acf_option field="contact_email" type="email"]
// [acf_option field="contact_phone" type="phone"]
// [acf_option field="website_url" type="url" label="Visit Our Site"]
// [acf_option field="company_name"]
add_shortcode('acf_option', function($atts) {
    $atts = shortcode_atts([
        'field' => '',
        'type'  => 'text',   // text | email | phone | url
        'label' => '',       // optional link text (defaults to value)
        'class' => '',       // optional CSS class on the <a>
        'format'=> '1',
    ], $atts);

    if (!$atts['field']) return '';

    $value = get_field($atts['field'], 'option');
    if (!$value) return '';

    // If it's an array (group, etc.), bail safely.
    if (is_array($value)) return '';

    $raw   = trim((string) $value);
    $label = $atts['label'] !== '' ? $atts['label'] : $raw;
    $class = $atts['class'] !== '' ? ' class="' . esc_attr($atts['class']) . '"' : '';

    switch (strtolower($atts['type'])) {
        case 'email':
            $email = sanitize_email($raw);
            if (!$email) return '';
            return '<a href="mailto:' . esc_attr($email) . '"' . $class . '>' . esc_html($label) . '</a>';

        case 'phone':
            // Keep + and digits only for tel:
            $tel = preg_replace('/[^0-9\+]/', '', $raw);
            if (!$tel) return '';
            return '<a href="tel:' . esc_attr($tel) . '"' . $class . '>' . esc_html($label) . '</a>';

        case 'url':
            $url = esc_url($raw);
            if (!$url) return '';
            return '<a href="' . $url . '"' . $class . '>' . esc_html($label) . '</a>';

        case 'text':
        default:
            return wp_kses_post(wpautop($raw));
    }
});