<?php
App::uses('AppModel', 'Model');

class Book extends AppModel {


	public $displayField = 'name';


	public $hasAndBelongsToMany = array(
		'Type' => array(
			'className' => 'Type',
			'joinTable' => 'books_types',
			'foreignKey' => 'book_id',
			'associationForeignKey' => 'type_id',
			'unique' => 'keepExisting',
		),
		'Author' => array(
			'className' => 'Author',
			'joinTable' => 'books_authors',
			'foreignKey' => 'book_id',
			'associationForeignKey' => 'author_id',
			'unique' => 'keepExisting',
		)
	);

	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'isbn' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'Author' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
		),
		'Type' => array(
			'multiple' => array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'You need to select at least one type',
				'required' => true,
			),
		),
		'image' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
				'message' => 'Invalid file, only images allowed',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
	);

	/**
	* Upload Directory relative to WWW_ROOT
	*/
	public $uploadDir = 'img/uploads';

	/**
	* Before Validation Callback
	*/
	public function beforeValidate($options = array()) {
		// ignore empty file
		if (!empty($this->data[$this->alias]['image']['error']) &&
		$this->data[$this->alias]['image']['error']==4 &&
		$this->data[$this->alias]['image']['size']==0) {
			unset($this->data[$this->alias]['image']);
		}

		return parent::beforeValidate($options);
	}

	public function processUpload($check=array()) {
		if (!empty($check['image']['tmp_name'])) {
			// check whether file is uploaded
			if (!is_uploaded_file($check['image']['tmp_name']))
			return FALSE;
			$filename = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['image']['name'], 		PATHINFO_FILENAME)).'.'.pathinfo($check['image']['name'], PATHINFO_EXTENSION);
			if (!move_uploaded_file($check['image']['tmp_name'], $filename))
			return FALSE;
			else
			// save the file path relative from WWW_ROOT e.g. img/uploads/example_filename.jpg
			$this->data[$this->alias]['image'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );

		}
		return TRUE;
	}

	/**
	* Transforms the data array to save the HABTM relation
	*/
	public function beforeSave($options = array()){
		// a file has been uploaded so grab the filepath
		if (!empty($this->data[$this->alias]['filepath'])) {
			$this->data[$this->alias]['image'] = $this->data[$this->alias]['filepath'];
		}
		foreach (array_keys($this->hasAndBelongsToMany) as $model){
			if(isset($this->data[$this->name][$model])){
				$this->data[$model][$model] = $this->data[$this->name][$model];
				unset($this->data[$this->name][$model]);
			}
		}
		return parent::beforeSave($options);
	}

}
