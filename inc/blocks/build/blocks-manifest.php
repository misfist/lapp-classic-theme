<?php
// This file is generated. Do not modify it manually.
return array(
	'sponsor' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'lapp/sponsor',
		'version' => '0.1.0',
		'title' => 'Sponsor',
		'category' => 'lapp',
		'icon' => 'money-alt',
		'description' => 'Display sponsor.',
		'attributes' => array(
			'objectId' => array(
				'type' => 'string',
				'default' => '0'
			),
			'objectType' => array(
				'type' => 'string'
			)
		),
		'usesContext' => array(
			'postId',
			'termId'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => true,
			'customClassName' => true
		),
		'textdomain' => 'lapp',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	)
);
