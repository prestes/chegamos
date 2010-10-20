<?php

namespace app\controllers;
use app\models\Place;

class PlacesController extends \lithium\action\Controller {

    public function index() {
        $place = new \app\models\Place();
        $zipcode = $_GET['cep'];
        $search = $place->searchByZipcode($zipcode);
		//$lat = "-23.593873718812";
		//$lng = "-46.688480447148";
        //$search = $place->searchByPoint($lat, $lng);
        return compact('search');
    }

    public function add() {
        $success = false;

        if ($this->request->data) {
            $place = Place::create($this->request->data);
            $success = $place->save();
        }

        return compact('success');
    }

}
