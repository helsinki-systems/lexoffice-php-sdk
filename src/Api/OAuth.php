<?php

declare (strict_types=1);

namespace LexofficeSdk\Api;

use DateTime;
use DateInterval;

use GuzzleHttp\Client;

class OAuth
{
    public static function constructRedirect(
        string $loginUri,
        string $redirectUri,
        string $clientID,
        string $scopes,
        string $code_verifier,
    ) {
        $code_challenge = rtrim(strtr(base64_encode(hash('sha256', $code_verifier, true)), '+/', '-_'), '=');
        return "{$loginUri}/oauth2/authorize?client_id={$clientID}&redirect_uri={$redirectUri}&response_type=code&scope={$scopes}&code_challenge={$code_challenge}&code_challenge_method=S256";
    }

    public static function token(
        string $authUri,
        string $redirectUri,
        string $clientID,
        string $clientSecret,
        string $code,
        string $code_verifier,
    ) {
        // POST $authUri . "/oauth2/token"
        // Content-Type: application/x-www-token-urlencoded
        $client = new Client();
        $res = $client->request('POST', $authUri . "/oauth2/token", [
          'auth' => [$clientID, $clientSecret],
          'form_params' => [
              'grant_type' => 'authorization_code',
              'code_verifier' => $code_verifier,
              'code' => $code,
              'redirect_uri' => $redirectUri,
          ]
        ]);
        $body = json_decode($res->getBody()->getContents());

        $now = new DateTime();
        $now->add(new DateInterval("PT" . $body->expires_in . "S"));

        return array(
          'access_token' => $body->access_token,
          'until' => $now->getTimestamp(),
        );
    }

    public static function revoke(
        string $authUri,
        string $clientID,
        string $clientSecret,
        string $token,
    ) {
        // POST $authUri . "/oauth2/revoke"
        // Content-Type: application/x-www-token-urlencoded
        $client = new Client();
        $client->request('POST', $authUri . "/oauth2/revoke", [
          'auth' => [$clientID, $clientSecret],
          'form_params' => [
              'token' => $token,
          ]
        ]);
    }
}
