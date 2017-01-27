<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'panel_1' => array(
		'title'   => __( 'Почта администратора', '{domain}' ),
		'options' => array(
			'mail' => array(
				'type'  => 'text',
				'label' => __( 'Почта администратора', '{domain}' ),

			),
		),
	),
	'panel_2' => array(
		'title'   => __( 'Услуги', '{domain}' ),
		'options' => array(
			'services' => array(
				'type'            => 'addable-popup',
				'label'           => __( 'Услуги', '{domain}' ),
				'desc'            => __( 'Услуги', '{domain}' ),
				'template'        => '{{- title }}',
				'popup-title'     => null,
				'size'            => 'large', // small, medium, large
				'limit'           => 0, // limit the number of popup`s that can be added
				'add-button-text' => __( 'Добавить', '{domain}' ),
				'sortable'        => true,
				'popup-options'   => array(
					'title'       => array(
						'label' => __( 'Заголовок', '{domain}' ),
						'type'  => 'text',
						'desc'  => __( 'Заголовок услуги', '{domain}' ),
					),
					'placeholder' => array(
						'label' => __( 'Плейсхолдер', '{domain}' ),
						'type'  => 'text',
						'desc'  => __( 'Плейсхолдер услуги', '{domain}' ),
					),
				),
			),
		),
	),
);