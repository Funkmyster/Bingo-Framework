<?php

/**
 *
 * Remote class for the Bingo Framework
 * Helps handle calls to web services
 * You don't have to use this as you can add GuzzleHttp to your project
 * @see https://www.github.com/guzzle-http
 *
 * @package Bingo Framework
 * @author Lochemem Bruno Michael
 *
 */

namespace Core;

class Remote
{
	/**
	 *
	 * Access web services via streams
	 *
	 * @param string $method The verb for the request
	 * @param string $url The URL of the web service
	 * @param array $headers The required headers for the request
	 * @param array $data_fields The data to be sent (Applies to POST and PUT verbs)
	 * @return array $result The data returned by the web service consumed
	 *
	 */
	
	public function streamCreate($method, $url, $headers, $data_fields = null)
	{
		switch($method){
			case "GET":
				$method = "GET";
				break;
				
			case "POST":
				$method = "POST";
				if(is_null($data_fields)){
					throw new \Exception("Missing data");
				}
				break;
				
			case "PUT":
				$method = "PUT";
				if(is_null($data_fields)){
					throw new \Exception("Missing data");
				}
				break;
				
			case "DELETE":
				$method = "DELETE";
				break;
				
			default:
				throw new \Exception("Method not supported");
				break;
		}
		if(!is_array($headers)){
			throw new \Exception("Invalid header data");
		}
		if(is_null($data_fields)){
			$options = [
				'http' => [
					'method' => $method,
					'header' => $headers
				]
			];
		}else{
			$options = [
				'http' => [
					'method' => $method,
					'header' => $headers,
					'content' => $data_fields
				]
			];
		}
		$url_regex =  '/(?:http|https)?(?:\:\/\/)?(?:www.)?(([A-Za-z0-9-]+\.)*[A-Za-z0-9-]+\.[A-Za-z]+)(?:\/.*)?/im';
		if(!preg_match($url_regex, $url, $matches)){
			throw new \Exception('Invalid URL');
		}
		$result = file_get_contents($url, null, stream_context_create($options));
		return $result;
	}
	
	/**
	 *
	 * Access web services via CURL
	 *
	 * @param string $method The verb for the request
	 * @param string $url The URL of the web service
	 * @param array $headers The required headers for the request
	 * @param array $data_fields The data to be sent (Applies to POST and PUT verbs)
	 * @return array $result The data returned by the web service consumed
	 *
	 */
	
	public function curlRequest($method, $url, $headers, $auth = null, $data_fields = null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		switch($method){
			case "GET":
				$method = "GET";
				$data_fields = null;
				break;
				
			case "POST":
				$method = "POST";
				if(is_null($data_fields)){
					throw new \Exception("Missing data");
				}
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_fields);
				break;
				
			case "PUT":
				$method = "PUT";
				if(is_null($data_fields)){
					throw new \Exception("Missing data");
				}
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_fields);
				break;
				
			case "DELETE":
				$method = "DELETE";
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
				break;
				
			default:
				throw new \Exception("Method not supported");
				break;		
		}
		if(!is_null($auth)){
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, $auth);
		}
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}	
}	