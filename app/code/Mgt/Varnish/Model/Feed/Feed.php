<?php
 namespace Mgt\Varnish\Model\Feed; use Magento\Framework\Config\ConfigOptionsListConstants; class Feed extends \Magento\Framework\Model\AbstractModel { const FEED_URL = "\150\164\164\x70\72\x2f\x2f\146\145\145\x64\56\155\147\164\55\143\157\155\x6d\145\162\x63\145\56\x63\157\155\57"; const UPDATE_FREQUENCY = 21600; const SEVERITY_INFORMATION = 4; protected $backendConfig; protected $inboxFactory; protected $storeManager; protected $deploymentConfig; protected $productMetadata; protected $urlBuilder; public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Backend\App\ConfigInterface $backendConfig, \Magento\AdminNotification\Model\InboxFactory $inboxFactory, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\DeploymentConfig $deploymentConfig, \Magento\Framework\App\ProductMetadataInterface $productMetadata, \Magento\Framework\UrlInterface $urlBuilder, \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = []) { goto d506f; d506f: parent::__construct($context, $registry, $resource, $resourceCollection, $data); goto e17c3; F94d6: $this->inboxFactory = $inboxFactory; goto B9593; c9b90: $this->deploymentConfig = $deploymentConfig; goto a9343; B9593: $this->storeManager = $storeManager; goto c9b90; a9343: $this->productMetadata = $productMetadata; goto Ede99; e17c3: $this->backendConfig = $backendConfig; goto F94d6; Ede99: $this->urlBuilder = $urlBuilder; goto bde90; bde90: } protected function _construct() { } public function checkUpdate() { goto d1419; d1419: $frequency = $this->getFrequency(); goto C64fb; B0961: foreach ($feedXml->channel->item as $item) { goto e12da; e12da: $itemPublicationDate = strtotime((string) $item->pubDate); goto f51bb; f51bb: if (!($installDate <= $itemPublicationDate)) { goto fb5b4; } goto Cea61; E2d99: fb5b4: goto c7e0b; Cea61: $feedData[] = ["\163\145\x76\145\162\x69\x74\x79" => self::SEVERITY_INFORMATION, "\x64\x61\x74\145\137\x61\144\144\x65\144" => date("\131\x2d\x6d\55\x64\x20\x48\x3a\151\72\163", $itemPublicationDate), "\x74\151\x74\x6c\145" => (string) $item->title, "\x64\145\163\x63\x72\x69\x70\x74\151\x6f\x6e" => (string) $item->description, "\x75\162\154" => (string) $item->link]; goto E2d99; c7e0b: dbc95: goto b5436; b5436: } goto a7572; cfab3: F1110: goto Aedda; f873b: $installDate = strtotime($this->deploymentConfig->get(ConfigOptionsListConstants::CONFIG_PATH_INSTALL_DATE)); goto bbf25; Aedda: $feedData = []; goto A5f82; A518d: if (!$feedData) { goto b5563; } goto E2a19; bbf25: if (!($feedXml && isset($feedXml->channel) && isset($feedXml->channel->item))) { goto E9c7b; } goto B0961; F5f90: b5563: goto B301e; eff85: return $this; goto cfab3; B301e: E9c7b: goto Bff7e; f6db9: if (!($frequency + $lastUpdate > time())) { goto F1110; } goto eff85; a7572: Bdbd6: goto A518d; Bff7e: $this->setLastUpdate(); goto cffb4; E2a19: $this->inboxFactory->create()->parse(array_reverse($feedData)); goto F5f90; C64fb: $lastUpdate = $this->getLastUpdate(); goto f6db9; A5f82: $feedXml = $this->getFeedData(); goto f873b; cffb4: return $this; goto a3def; a3def: } public function getFrequency() { return self::UPDATE_FREQUENCY; } public function getLastUpdate() { return $this->_cacheManager->load("\x6d\147\164\x5f\146\x65\145\x64\137\x61\144\155\x69\156\x5f\x6e\157\x74\x69\146\151\143\141\x74\x69\x6f\156\163\137\x6c\141\x73\x74\143\150\x65\143\x6b"); } public function setLastUpdate() { $this->_cacheManager->save(time(), "\155\x67\x74\x5f\146\145\145\x64\137\x61\x64\x6d\151\x6e\137\156\x6f\x74\x69\x66\x69\x63\141\x74\x69\x6f\x6e\163\x5f\x6c\x61\163\164\x63\150\145\143\x6b"); return $this; } public function getFeedData() { try { $xml = ''; } catch (\Exception $e) { return false; } return $xml; } }
