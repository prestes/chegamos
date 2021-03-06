<?php

namespace app\models;

/**
 * Test class for Place.
 * Generated by PHPUnit on 2010-12-01 at 13:13:49.
 */
class PlaceTest extends \PHPUnit_Framework_TestCase {

	/**
	 * @var Place
	 */
	protected $object;

	protected function setUp() {
		$this->object = new Place;
	}

	protected function tearDown() {
		unset($this->object);
	}

	public function testPopulate() {

		$subCategory = new Subcategory();
		$subCategory->setId(1234);
		$subCategory->setName("Self Service");

		$category = new Category();
		$category->setId(12);
		$category->setName("Restaurantes");
		$category->setSubCategory($subCategory);

		$city = new City();
		$city->setCountry("Brasil");
		$city->setState("SP");
		$city->setName("São Paulo");

		$address = new Address();
		$address->setCity($city);
		$address->setComplement("1 Andar");
   		$address->setDistrict("Vila Olímpia");
		$address->setNumber("129");
		$address->setStreet("Rua Funchal");
		$address->setZipcode("04551-069");

		$gasStation = new GasStation(
			array(
				'price_gas' => 1,23,
				'price_vodka' => 23,45
			)
		);

		$placeInfo = new PlaceInfo();
		$placeInfo->setGasStation($gasStation);

		$data = new \stdClass();
		$data->id = 123;
		$data->name = "Chegamos!";
		$data->average_rating = 4;
		$data->review_count = 3;
		$data->category = $category;
		$data->subcategory = $subCategory;
		$data->address = $address;
		$data->point->lat = "-23.529366";
		$data->point->lng = "-47.467117";
		$data->main_url = "http://chegamos.com/";
		$data->other_url = "http://chegamos.com.br/";
		$data->icon_url = "http://chegamos.com/img/icon.png";
		$data->description = "Description";
		$data->created = "01/12/2010 16:19";
		$data->phone = "11 2222-3333";
		$data->extended = $placeInfo;
		$data->num_visitors = 1024;
		$data->num_photos = 5;

		$this->object->populate($data);

		$this->assertEquals(123, $this->object->getId());
		$this->assertEquals("Chegamos!", $this->object->getName());
		$this->assertEquals(4, $this->object->getAverageRating());
		$this->assertEquals("Bom", $this->object->getAverageRatingString());
		$this->assertEquals(3, $this->object->getReviewCount());
		$this->assertEquals("app\models\Category", \get_class((object) $this->object->getCategory()));
		$this->assertEquals("Restaurantes - Self Service", (string) $this->object->getCategory());
		$this->assertEquals("app\models\Address", \get_class((object) $this->object->getAddress()));
		$this->assertEquals("Rua Funchal, 129 - Vila Olímpia<br/>São Paulo - SP", (string) $this->object->getAddress());
		$this->assertEquals("-23.529366,-47.467117", (string) $this->object->getPoint());
		$this->assertEquals("http://chegamos.com/", $this->object->getMainUrl());
		$this->assertEquals("http://chegamos.com.br/", $this->object->getOtherUrl());
		$this->assertEquals("http://chegamos.com/img/icon.png", $this->object->getIconUrl());
		$this->assertEquals("Description", $this->object->getDescription());
		$this->assertEquals("01/12/2010 16:19", $this->object->getCreated());
		$this->assertEquals("11 2222-3333", $this->object->getPhone());
		$this->assertEquals("app\models\PlaceInfo", \get_class((object) $this->object->getPlaceInfo()));
		$this->assertEquals(1024, $this->object->getNumVisitors());
		$this->assertEquals(5, $this->object->getNumPhotos());
	}

	public function testSetGetId() {
		$this->object->setId(123);
		$this->assertEquals(123, $this->object->getId());
	}

	public function testSetGetNumVisitors() {
		$this->object->setNumVisitors(1024);
		$this->assertEquals(1024, $this->object->getNumVisitors());
	}

	public function testSetGetNumPhotos() {
		$this->object->setNumPhotos(5);
		$this->assertEquals(5, $this->object->getNumPhotos());
	}

	public function testSetGetName() {
		$this->object->setName("Chegamos!");
		$this->assertEquals("Chegamos!", $this->object->getName());
	}

	public function testSetGetCreated() {
		$this->object->setCreated("01/12/2010 13:27");
		$this->assertEquals("01/12/2010 13:27", $this->object->getCreated());
	}

	public function testSetGetPlaceInfo() {
		$this->object->setPlaceInfo("Place Info?");
		$this->assertEquals("Place Info?", $this->object->getPlaceInfo());
	}

	public function testSetGetPhone() {
		$this->object->setPhone("Place Info?");
		$this->assertEquals("Place Info?", $this->object->getPhone());
	}

	public function testSetGetDescription() {
		$this->object->setDescription("Description");
		$this->assertEquals("Description", $this->object->getDescription());
	}

	public function testSetGetAverageRating() {
		$this->object->setAverageRating(1);
		$this->assertEquals(1, $this->object->getAverageRating());
		$this->object->setAverageRating(2);
		$this->assertEquals(2, $this->object->getAverageRating());
		$this->object->setAverageRating(3);
		$this->assertEquals(3, $this->object->getAverageRating());
		$this->object->setAverageRating(4);
		$this->assertEquals(4, $this->object->getAverageRating());
		$this->object->setAverageRating(5);
		$this->assertEquals(5, $this->object->getAverageRating());
	}

//	public function testSetGetAverageRatingString() {
//		$this->object->setAverageRatingString("String");
//		$this->assertEquals("String", $this->object->getAverageRatingString());
//	}

	public function testSetGetReviewCount() {
		$this->object->setReviewCount(3);
		$this->assertEquals(3, $this->object->getReviewCount());
	}

	public function testSetGetCategory() {
		$this->object->setCategory("String");
		$this->assertEquals("String", $this->object->getCategory());
	}

	public function testSetGetAddress() {
		$this->object->setAddress("Address");
		$this->assertEquals("Address", $this->object->getAddress());
	}

	public function testSetGetPoint() {
		$point = new Point();
		$point->setLat("-23.529366");
		$point->setLng("-47.467117");

		$this->object->setPoint($point);
		$this->assertEquals("-23.529366,-47.467117", (string) $this->object->getPoint());
	}

	public function testSetGetMainUrl() {
		$this->object->setMainUrl("http://chegamos.com/");
		$this->assertEquals("http://chegamos.com/", $this->object->getMainUrl());
	}

	public function testSetGetOtherUrl() {
		$this->object->setOtherUrl("http://chegamos.com/");
		$this->assertEquals("http://chegamos.com/", $this->object->getOtherUrl());
	}

	public function testSetGetIconUrl() {
		$this->object->setIconUrl("http://chegamos.com/img/logo.jpg");
		$this->assertEquals("http://chegamos.com/img/logo.jpg", $this->object->getIconUrl());
	}

	public function testGetRouteUrl() {

		//$this->assertEquals("http://chegamos.com/img/logo.jpg", $this->object->getIconUrl());
	}

}

?>
