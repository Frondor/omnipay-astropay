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

  public function getData() {
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

    $this->response = new Response($this, $httpResponse->json());

    return $this->response;
  }
}
