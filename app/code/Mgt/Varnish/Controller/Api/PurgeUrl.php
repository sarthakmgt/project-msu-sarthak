<?php
 namespace Mgt\Varnish\Controller\Api; class PurgeUrl extends \Magento\Framework\App\Action\Action { protected $cachePurger; protected $config; public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\CacheInvalidate\Model\PurgeCache $cachePurger, \Mgt\Varnish\Model\Cache\Config $config) { goto eff7b; eff7b: $this->cachePurger = $cachePurger; goto Cad14; Cad14: $this->config = $config; goto Ae2dc; Ae2dc: parent::__construct($context); goto ebdf1; ebdf1: } public function execute() { goto ef7ec; c6a26: if (!($secretKey && $url)) { goto d8e55; } goto f196a; cbc3d: exit; goto C3e3c; f196a: try { goto B4c54; B4c54: $apiSecretKey = $this->config->getApiSecretKey(); goto Da5f8; Cbc44: throw new \Exception("\x53\145\x63\162\145\x74\x20\141\x70\x69\x20\153\x65\171\40\151\x73\x20\x6e\157\x74\40\x63\x6f\x72\162\145\143\164"); goto C3a0b; C3a0b: b629e: goto bc7fc; F33a4: $body = ["\163\x75\143\x63\x65\163\x73" => 1, "\x6d\145\163\x73\141\147\145" => sprintf("\x54\150\145\x20\x55\122\114\x20\x22\45\163\42\40\x68\x61\x73\40\x62\x65\x65\156\x20\160\x75\x72\147\145\x64\56", $url)]; goto F1cf3; bc7fc: $this->cachePurger->purgeUrlRequest($url); goto F33a4; Da5f8: if (!($secretKey != $apiSecretKey)) { goto b629e; } goto Cbc44; F1cf3: } catch (\Exception $e) { $errorMessage = $e->getMessage(); $body = ["\163\x75\143\x63\145\163\x73" => 0, "\155\145\163\163\x61\x67\x65" => $errorMessage]; } goto E3c28; ef7ec: $request = $this->getRequest(); goto b801c; dab92: $response->setBody($body); goto E9be1; A7bcf: $url = $request->getParam("\x75\x72\154"); goto c6a26; b801c: $response = $this->getResponse(); goto Eb8b7; E3c28: d8e55: goto A1b80; Eb8b7: $body = []; goto e8986; e8986: $secretKey = $request->getParam("\163\145\143\162\x65\164\x4b\145\171"); goto A7bcf; E9be1: $response->sendResponse(); goto cbc3d; A1b80: $body = json_encode($body); goto cf94a; cf94a: $response->setHeader("\x43\x6f\x6e\164\145\x6e\x74\55\x54\x79\160\x65", "\141\x70\x70\x6c\x69\143\x61\164\151\x6f\156\57\x6a\x73\157\156"); goto dab92; C3e3c: } }
