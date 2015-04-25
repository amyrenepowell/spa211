<?php
/**
 * Theme Options
 *
 * @package WP Day Spa
 * @subpackage Admin
 */


	/*-----------------------------------------------------------------------------------*/
	/* Create Sections */
	/*-----------------------------------------------------------------------------------*/

	function woc_sections( $wp_customize ) {

		$wp_customize->add_section( 'general', array(
			'title'    => __( 'General', 'contempo' ),
			'priority' => 11
		) );
 
		$wp_customize->add_section( 'layout', array(
			'title'    => __( 'Layout', 'contempo' ),
			'priority' => 12
		) );

		$wp_customize->add_section( 'header', array(
			'title'    => __( 'Header', 'contempo' ),
			'priority' => 13
		) );

		$wp_customize->add_section( 'create_a_skin', array(
			'title'    => __( 'Create a Skin', 'contempo' ),
			'priority' => 14
		) );

		$wp_customize->add_section( 'footer', array(
			'title'    => __( 'Footer', 'contempo' ),
			'priority' => 15
		) );
	 
	}
	add_action( 'customize_register', 'woc_sections' );

 
	/*-----------------------------------------------------------------------------------*/
	/* Create Settings */
	/*-----------------------------------------------------------------------------------*/

	function woc_settings( $controls ) {

		$prefix = 'woc_';
	 
		// General

			$controls[] = array(
				'type'     => 'radio',
				'mode'     => 'image',
				'setting'  => $prefix . 'layout',
				'label'    => __( 'Layout', 'contempo' ),
				'section'  => 'layout',
				'subtitle' => __( 'Choose whether you\'d like full width, left or right sidebar.', 'contempo' ),
				'priority' => 1,
				'default'  => '2-col-left',
				'choices'  => array(
					'1-col' => get_template_directory_uri() . '/admin/assets/images/1cl.png',
					'2-col-right' => get_template_directory_uri() . '/admin/assets/images/2cr.png',
					'2-col-left' => get_template_directory_uri() . '/admin/assets/images/2cl.png',
				),
			);

			$controls[] = array(
				'type'     => 'select',
				'setting'  => $prefix . 'heading_font',
				'label'    => __( 'Heading Font', 'contempo' ),
				'section'  => 'general',
				'priority' => 1,
				'default'  => 3,
				'choices'  => woc_get_fonts(), //TODO: Uncomment couldn't figure out how to fix parse error
			);

			$controls[] = array(
				'type'     => 'select',
				'setting'  => $prefix . 'body_font',
				'label'    => __( 'Body Font', 'contempo' ),
				'section'  => 'general',
				'priority' => 1,
				'default'  => 3,
				'choices'  => woc_get_fonts(), //TODO: Uncomment couldn't figure out how to fix parse error
			);

		// Header

			$controls[] = array(
				'type'     => 'image',
				'setting'  => $prefix . 'logo',
				'label'    => __( 'Custom Logo', 'contempo' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 0,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'facebook',
				'label'    => __( 'Facebook URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'twitter',
				'label'    => __( 'Twitter URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'linkedin',
				'label'    => __( 'LinkedIn URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'dribble',
				'label'    => __( 'Dribble URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'pinterest',
				'label'    => __( 'Pinterest URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'instagram',
				'label'    => __( 'Instagram URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'github',
				'label'    => __( 'Github URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

			$controls[] = array(
				'type'     => 'text',
				'setting'  => $prefix . 'contact',
				'label'    => __( 'Contact URL', 'contempo' ),
				'section'  => 'header',
				'default'  => __( '', 'contempo' ),
				'priority' => 1,
			);

		// Create a Skin

		$controls[] = array(
			'type'         => 'background',
			'setting'      => $prefix . 'body_bg',
			'label'        => __( 'Body Background', 'contempo' ),
			'section'      => 'create_a_skin',
			'default'      => array(
				'color'    => '#ffffff',
				'image'    => null,
				'repeat'   => 'repeat',
				'size'     => 'inherit',
				'attach'   => 'inherit',
				'position' => 'left-top',
				'opacity'  => 100,
			),
			'priority' => 0,
			'output' => 'body',
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'header_top_bar_bg_color',
			'label'    => __( 'Top Bar Background Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 1,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'header_top_bar_border',
			'label'    => __( 'Top Bar Border Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 2,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'a_link_color',
			'label'    => __( 'Link Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 3,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'a_visited_color',
			'label'    => __( 'Visited Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 4,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'a_hover_color',
			'label'    => __( 'Hover Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 5,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'a_active_color',
			'label'    => __( 'Active Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 6,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'footer_bg_color',
			'label'    => __( 'Footer Background Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 7,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'footer_border_color',
			'label'    => __( 'Footer Border Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 8,
		);

		$controls[] = array(
			'type'     => 'color',
			'setting'  => $prefix . 'footer_a_link_color',
			'label'    => __( 'Footer Link Color', 'contempo' ),
			'section'  => 'create_a_skin',
			'default'  => '',
			'priority' => 9,
		);


		// Footer

		$controls[] = array(
			'type'     => 'checkbox',
			'setting'  => $prefix . 'footer_widgets',
			'label'    => __( 'Show Footer Widget Area', 'contempo' ),
			'section'  => 'footer',
			'default'  => 0,
			'priority' => 1,
		);

		$controls[] = array(
			'type'     => 'textarea',
			'setting'  => $prefix . 'footer_text',
			'label'    => __( 'Footer Text', 'contempo' ),
			'section'  => 'footer',
			'default'  => __( '', 'contempo' ),
			'priority' => 2,
		);

		$controls[] = array(
			'type'     => 'textarea',
			'setting'  => $prefix . 'footer_tracking',
			'label'    => __( 'Tracking Code', 'contempo' ),
			'section'  => 'footer',
			'default'  => __( '', 'contempo' ),
			'priority' => 3,
		);
	 
		return $controls;
	}
	add_filter( 'kirki/controls', 'woc_settings' );

?>