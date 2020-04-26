<?php
class Volusion {
	
	public $apiUrl = "";
	public $apiLogin = "";
	public $apiPassword = "";
	public $ediName = "";

	function __construct( $apiUrl, $apiLogin, $apiPassword, $ediName ) {
		$this->apiUrl = $apiUrl;
		$this->apiLogin = $apiLogin;
		$this->apiPassword = $apiPassword;
		$this->ediName = $ediName;
	}

	public function index() {
		exit("You seem somewhat lost, state your business here!");
	}

	public function getOrders() {

		$file = $this->apiUrl . 'net/WebService.aspx?Login=' . $this->apiLogin . '&EncryptedPassword=' . $this->apiPassword . '&EDI_Name=Generic\Orders&SELECT_Columns=*';

		$xml = simplexml_load_file($file,"SimpleXMLElement",LIBXML_NOCDATA);
		return $xml;
	}

	public function getCustomers() {

		$file = $this->apiUrl . 'net/WebService.aspx?Login=' . $this->apiLogin . '&EncryptedPassword=' . $this->apiPassword . '&EDI_Name=Generic\Customers&SELECT_Columns=*';

		$xml = simplexml_load_file($file,"SimpleXMLElement",LIBXML_NOCDATA);
		return $xml;
	}

	public function getCustomerById( $customerId ) {

		$file = $this->apiUrl . "net/WebService.aspx?Login=" . $this->apiLogin . "&EncryptedPassword=" . $this->apiPassword . "&EDI_Name=Generic\Customers&SELECT_Columns=*&WHERE_Column=CustomerID&WHERE_Value=" . $customerId;

		$xml = simplexml_load_file($file,"SimpleXMLElement",LIBXML_NOCDATA);
		return $xml;
	}

}
?>