<?php if ( ! defined( 'FW' ) ) {
    die( 'Forbidden' );
}

$options = array(

    'service' => array(
        'type' => 'addable-popup',
        'label' => __('Услуги', '{domain}'),
        'desc'  => __('Услуги', '{domain}'),
        'template' => '{{- title }}',
        'popup-title' => null,
        'size' => 'large', // small, medium, large
        'limit' => 0, // limit the number of popup`s that can be added
        'add-button-text' => __('Добавить', '{domain}'),
        'sortable' => true,
        'popup-options' => array(
            'title' => array(
                'label' => __('Заголовок', '{domain}'),
                'type' => 'text',
                'value' => 'Website design',
            ),
        ),
    )
);