<?php

namespace app\models;
use lithium\util\Inflector;

class Subcategory {

	var $id = "";
	var $name = "";

	public function __construct($data) {
		$this->populate($data);
	}

	public function populate($data) {
		$this->setId($data->id);
		$this->setName($data->name);
	}
	
	public function __toString() {
		return $this->getName();
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setName($name) {
		$this->name = Inflector::formatTitle($name);
	}

	public function getName() {
		return $this->name;
	}
}
