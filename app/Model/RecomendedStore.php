<?php
App::uses('AppModel', 'Model');
/**
 * RecomendedStore Model
 *
 */
class RecomendedStore extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'store_img';
	public $actsAs = array(
		'Uploader.Attachment' => array(
			'store_img' => array(
				'overwrite' => false,
				'uploadDir' => 'files/uploads/recomended_stores/',
				'transportDir' => 'files/uploads/recomended_stores/',
				'finalPath' => 'files/uploads/recomended_stores/',
				'transforms' => array(
					'store_img_small' => array(
						'class' => 'resize',
						'append' => '-small',
						'overwrite' => false,
						'self' => false,
						'width' => 150,
						'height' => 150,
						'quality' => 100
					),
					'store_img_medium' => array(
						'class' => 'resize',
						'append' => '-medium',
						'overwrite' => false,
						'width' => 134,
						'height' => 57,
						'quality' => 100,
						'aspect' => true,
						'mode' => 'height'
					)
				)
			)
		),
		'Search.Searchable'
	);
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
