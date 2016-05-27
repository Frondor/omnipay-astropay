<?php

namespace Omnipay\Astropay\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest {
  protected $endpoint = 'https://sandbox-api.astropaycard.com';
  protected $x_version = "2.0";
  protected $x_delim_char = "|";
  protected $x_test_request = "N"; //Change to N for production
  protected $x_duplicate_window = 120;
  protected $x_method = "CC";
  protected $x_response_format = "json";

  abstract public function getEndpoint();

  public function getXLogin() {
      return $this->getParameter('x_login');
  }

  public function setXLogin($value) {
      return $this->setParameter('x_login', $value);
  }

  public function getXTransKey() {
      return $this->getParameter('x_trans_key');
  }

  public function setXTransKey($value) {
      return $this->setParameter('x_trans_key', $value);
  }

  public function getUserId() {
      return $this->getParameter('UserId');
  }

  public function setUserId($value) {
      return $this->setParameter('UserId', $value);
  }

  public function getCardNum() {
      return $this->getParameter('card_num');
  }

  public function setCardNum($value) {
      return $this->setParameter('card_num', $value);
  }

  public function getCvv() {
      return $this->getParameter('cvv');
  }

  public function setCvv($value) {
      return $this->setParameter('cvv', $value);
  }

  public function getExpDate() {
      return $this->getParameter('exp_date');
  }

  public function setExpDate($value) {
      return $this->setParameter('exp_date', $value);
  }


  public function getData() {
    $this->validate('x_login', 'x_trans_key');
    $data['x_login'] = $this->getXLogin();
    $data['x_trans_key'] = $this->getXTransKey();
    $data['x_version'] = $this->x_version;
    $data['x_delim_char'] = $this->x_delim_char;
    $data['x_test_request'] = $this->x_test_request;
    $data['x_duplicate_window'] = $this->x_duplicate_window;
    $data['x_method'] = $this->x_method;
    $data['x_response_format'] = $this->x_response_format;
    return $data;
  }

  public function getHttpMethod() {
    return 'POST';
  }

  public function sendData($data) {
    $httpRequest = $this->httpClient->createRequest(
      $this->getHttpMethod(),
      $this->getEndpoint(),
      null,
      $data
    );

    $httpResponse = $httpRequest->send();

    $this->response = new Response($this, $httpResponse->json());

    return $this->response;
  }
}
