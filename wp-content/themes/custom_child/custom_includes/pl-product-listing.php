<?php
function program_productlisting() {
    ob_start();
    $page = get_the_ID();
?>

<?php
	return ob_get_clean();
}
add_shortcode('show_productlisting', 'program_productlisting');
?>