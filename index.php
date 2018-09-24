<?php
require __DIR__ . '/vendor/autoload.php';

use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient(
  'https://sso.tamacorp.co/oauth', // idp issuer
  'test', // client id
  'test'); //client secret

$oidc->providerConfigParam(array(
  'authorization_endpoint' => 'https://sso.tamacorp.co/oauth/authorize',
  'token_endpoint'=>'https://sso.tamacorp.co/oauth/token',
  'jwks_uri'=>'https://sso.tamacorp.co/oauth/jwks',
  'response_type'=>'code',
));
$oidc->setRedirectURL("http://localhost:3000");
$oidc->addScope(array('openid')); 
$oidc->authenticate();
$sub = $oidc->getVerifiedClaims();

print_r($sub);


?>
