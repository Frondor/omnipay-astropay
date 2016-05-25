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

  public function getXUniqueId() {
      return $this->getParameter('x_unique_id');
  }

  public function setXUniqueId($value) {
      return $this->setParameter('x_unique_id', $value);
  }

  public function getXCardNum() {
      return $this->getParameter('x_card_num');
  }

  public function setXCardNum($value) {
      return $this->setParameter('x_card_num', $value);
  }

  public function getXCardCode() {
      return $this->getParameter('x_card_code');
  }

  public function setXCardCode($value) {
      return $this->setParameter('x_card_code', $value);
  }

  public function getXExpDate() {
      return $this->getParameter('x_exp_date');
  }

  public function setXExpDate($value) {
      return $this->setParameter('x_exp_date', $value);
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
