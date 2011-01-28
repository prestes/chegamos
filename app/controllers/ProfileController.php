<?php

namespace app\controllers;

use app\models\ApontadorApi;
use app\models\oauth;
use lithium\storage\Session;

class ProfileController extends \lithium\action\Controller {

	var $api;

	public function __construct(array $config = array()) {
		$this->api = new ApontadorApi();
		parent::__construct($config);
	}

	public function places($userId, $page='page1') {
		if (empty($userId)) {
			$this->redirect('/');
		}

		$page = str_replace('page', '', $page);

		$user = $this->api->getUserPlaces(array('userId' => $userId, 'page' => $page));

		$user = $this->api->getUser(array('userid' => $userId));

		$title = 'Locais cadastrados por ' . $user->getName();
		return compact('title', 'user', 'geocode', 'placeId', 'placeName', 'zipcode', 'cityState', 'lat', 'lng');
	}

	public function following($userId=null, $page='page1') {
		OauthController::verifyLogged('apontador');

		if (empty($userId)) {
			$userId = Session::read('apontadorId');
		}

		$page = str_replace('page', '', $page);

		\extract(OauthController::whereAmI());

		$following = $this->api->getUserFollowing(array(
					'userId' => $userId,
					'nearby' => false,
					'lat' => $lat,
					'lng' => $lng,
					'page' => $page
				));

		$user = $this->api->getUser(array('userid' => $userId));

		$title = 'Quem ' . $user->getName() . ' segue';
		return compact('title', 'following', 'geocode', 'placeId', 'placeName', 'zipcode', 'cityState', 'lat', 'lng');
	}

	public function followers($userId=null, $page='page1') {
		OauthController::verifyLogged('apontador');

		if (empty($userId)) {
			$userId = Session::read('apontadorId');
		}

		$page = str_replace('page', '', $page);

		\extract(OauthController::whereAmI());

		$following = $this->api->getUserFollowers(array(
					'userId' => $userId,
					'nearby' => true,
					'lat' => $lat,
					'lng' => $lng,
					'page' => $page
				));
		$user = $this->api->getUser(array('userid' => $userId));

		$title = 'Quem segue ' . $user->getName();
		return compact('title', 'following', 'geocode', 'placeId', 'placeName', 'zipcode', 'cityState', 'lat', 'lng');
	}

	public function show($userId) {
		$user = $this->api->getUser(array('userid' => $userId));

		\extract(OauthController::whereAmI());

		$title = 'Perfil de ' . $user->getName();
		return compact('title', 'user', 'geocode', 'placeId', 'placeName', 'zipcode', 'cityState', 'lat', 'lng');
	}

}
