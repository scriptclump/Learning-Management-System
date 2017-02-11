<?php
App::uses('AppModel', 'Model');
/**
 * SlidingBanner Model
 *
 */
class SlidingBanner extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	public $actsAs = array(
		'Uploader.Attachment' => array(
			'banner_img' => array(
				'overwrite' => false,
				'uploadDir' => 'files/uploads/banners/',
				'transportDir' => 'files/uploads/banners/',
				'finalPath' => 'files/uploads/banners/',
				'transforms' => array(
					'banner_img_small' => array(
						'class' => 'resize',
						'append' => '-small',
						'overwrite' => false,
						'self' => false,
						'width' => 150,
						'height' => 150,
						'quality' => 100
					),
					'banner_img_medium' => array(
						'class' => 'resize',
						'append' => '-medium',
						'overwrite' => false,
						'width' => 510,
						'height' => 284,
						'quality' => 100,
						'aspect' => true,
						'mode' => 'width'
					)
				)
			)
		),
		'Search.Searchable'
	);
	// Search
	public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )

    );
}
