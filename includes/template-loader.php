<?php

class aseShowcaseTemplateLoader {

	function __construct() {

		add_filter( 'template_include', array($this,'template_loader'));

	}

	/**
	*
	* @since version 1.0
	* @param $template - return based on view
	* @return page template based on view
	*/
	function template_loader($template) {
		
	    // override single
	    if ( 'ase_showcase' == get_post_type() ):

	    	if ( $overridden_template = locate_template( 'single-ase_showcase.php', true ) ) {

			   $template = load_template( $overridden_template );

			} else {

			    $template = ASE_SHOWCASE_DIR.'includes/single-ase_showcase.php';
			}

	    endif;
	    

	    // override archive
	    if ( is_post_type_archive('ase_showcase')):

	    	if ( $overridden_template = locate_template( 'archive-ase_showcase.php', true ) ) {

			   $template = load_template( $overridden_template );

			} else {

	        	$template = ASE_SHOWCASE_DIR.'includes/archive-ase_showcase.php';
	        }

		endif;

	    return $template;

	}

}
new aseShowcaseTemplateLoader;