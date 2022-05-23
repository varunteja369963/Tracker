<html>
    <head>
</head>

    <body>
<?php
//ob_start();
error_reporting(0);
ini_set('display_errors', 0);

session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('cache.class.php');
include_once('browser.php');

include_once('connection10.php');
$pageId = $_POST['pageId'];

$articleReturnId = '';
$httpReferrer = "";
$fakeUser = 'no';
//######### DATA-SET ##########
$sessionStorageSet = $_POST['sessionStorageSet'];
$localStorageSet = $_POST['localStorageSet'];
$localforageSet = $_POST['localforageSet'];
$superCookiesSet = $_POST['superCookiesSet'];
$everCookiesSet = $_POST['everCookiesSet'];
//######### DATA-SET ##########


//######### UNIQUE-KEYS ##########
$canvas1 = $_POST['canvas1'];
$canvas2 = $_POST['canvas2'];
$privateUserIp = $_POST['privateUserIp'];
$webgl = $_POST['webgl'];
//######### UNIQUE-KEYS ##########


//######### STORAGE-DATA ###########
$sessionStorage_returnId = $_POST['sessionStorage_returnId'];
$sessionStorage_lastVisitedDate = $_POST['sessionStorage_lastVisitedDate'];
$localStorage_returnId = $_POST['localStorage_returnId'];
$localStorage_lastVisitedDate = $_POST['localStorage_lastVisitedDate'];
$localforage_returnId = $_POST['localforage_returnId'];
$localforage_lastVisitedDate = $_POST['localforage_lastVisitedDate'];
$superCookies_returnId = $_POST['superCookies_returnId'];
$superCookies_lastVisitedDate = $_POST['superCookies_lastVisitedDate'];
$everCookies_returnId = $_POST['everCookies_returnId'];
$everCookies_lastVisitedDate = $_POST['everCookies_lastVisitedDate'];
//######### STORAGE-DATA ###########


//######### FINGERPRINT-DATA ###########
$fingerPrintData = $_POST['fingerPrintData'];
$webDriver = '';
$language = '';
$colorDepth = '';
$deviceMemory = '';
$hardwareConcurrency = ''; 
$screenResolutionWidth = '';
$screenResolutionHeight = '';
$viewPortWidth = '';
$viewPortHeight = '';
$timezoneOffset = '';
$timezone = '';
$sessionStorageSupport = '';
$localStorageSupport = '';
$indexedDbSupport = '';
$addBehaviorSupport = '';
$openDatabaseSupport = '';
$cpuClassValue = '';
$plugins = '';
$webglVendor = '';
$adBlock = '';
$liedLanguages = '';
$liedResolution = '';
$liedOs = '';
$liedBrowser = '';
$touchSupport = '';
$fonts = '';
$audio = 'no';

//echo '<pre>';
//print_r($fingerPrintData);
//echo '</pre>';

//######### FINGERPRINT-DATA ###########

$total_array = array();

//######### CROSS-CHECKING PHP ##########


//########## PHP-SET ############
$sessionsSet = 'no';
$cookiesSet = 'no';
$cacheSet = 'no';
//########## PHP-SET ############


//########### PHP-DATA ###########
$sessions_returnId = '';
$sessions_lastVisitedDate = '';
$cookies_returnId = '';
$cookies_lastVisitedDate = '';
$cache_returnId = '';
$cache_lastVisitedDate = '';
//########### PHP-DATA ###########
 

//########### FINAL DATA #############
$final_returnId = '';
$final_lastVisitedDate = '';
//########### FINAL DATA #############


$usingProxy = 'no';
$ipaddress = 'no';

//######### ABOUT-DEVICE #########
$deviceType = '';
$operatingSystem = '';
$osVersion = '';
$browserType = '';
$browserVersion = '';
$isAol = 'no';
$aolVersion = '';
$userAgent = 'no';
$osBit = '';
//######### ABOUT-DEVICE #########


//########## LOCATION ###########
$locationTraced = 'no';
$continentName = '';
$countryName = '';
$countryCapital = '';
$stateName = '';
$cityName = '';
$zipcode = '';
$latitude = '';
$longitude =  '';
$callingCode = '';
$countryFlag = '';
$countryTld = '';
$isp = '';
$organization = '';
$geonameId = '';
$currencyCode = '';
$currencyName = '';
//########## LOCATION ###########


//######### CROSS-CHECKING PHP END ##########
if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
else
    $ipaddress = '';

class retreiveInfo {

  function detectProxy() {
     global $usingProxy;
     global $ipaddress;
     
$sockport = false;

     $proxyports=array(80,8080,6588,8000,3128,3127,3124,1080,553,554);
 for ($i = 0; $i <= count($proxyports); $i++) {
 if(@fsockopen($ipaddress,$proxyports[$i],$errstr,$errno,0.5)){
 $sockport=true;
 }
 }
 
 if(
     isset($_SERVER['HTTP_VIA'])
     || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
     || isset($_SERVER['HTTP_FORWARDED_FOR'])
     || isset($_SERVER['HTTP_X_FORWARDED'])
     || isset($_SERVER['HTTP_FORWARDED'])
     || isset($_SERVER['HTTP_CLIENT_IP'])
     || isset($_SERVER['HTTP_FORWARDED_FOR_IP'])
     || isset($_SERVER['VIA'])
     || isset($_SERVER['X_FORWARDED_FOR'])
     || isset($_SERVER['FORWARDED_FOR'])
     || isset($_SERVER['X_FORWARDED'])
     || isset($_SERVER['FORWARDED'])
     || isset($_SERVER['CLIENT_IP'])
     || isset($_SERVER['FORWARDED_FOR_IP'])
     || isset($_SERVER['HTTP_PROXY_CONNECTION'])
     || $sockport === true
 ) {
     $usingProxy = 'yes';
 }
 else{
     $usingProxy = 'no';    
  }
   /*
      $checkProxy=$this::checkProxy($ipaddress);
      echo "'".$checkProxy."'";
         print($checkProxy);
     if ($checkProxy>=0.99) {
       $usingProxy = 'yes';
     }
     else{
        $usingProxy = 'no';  
     }
  
   */
       return true;
 }
 
  function checkProxy($ip) {
     $url = "http://check.getipintel.net/check.php?ip=".$ip."&contact=varunteja369963@gmail.com&flags=m";
    // $url = "http://check.getipintel.net/check.php?ip=103.15.60.34&contact=varunteja369963@gmail.com&flags=m";
     
     $cURL = curl_init();
     
     curl_setopt($cURL, CURLOPT_URL, $url);
     curl_setopt($cURL, CURLOPT_HTTPGET, true);
     curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Accept: application/json'
     ));
     return curl_exec($cURL);
     }
     
 function ipLocation() {
     global $ipaddress, $locationTraced, $continentName, $countryName, $countryCapital, $stateName, $cityName, 
     $zipcode, $latitude, $longitude, $callingCode, $countryFlag, $countryTld, $isp, $organization, $geonameId, $currencyCode, 
     $currencyName;

     $apiKey = "0a86b455495b467aa0f8309fc4e30270";
     $ip = $ipaddress;
     $location = self::get_geolocation($apiKey, $ip);
     $decodedLocation = json_decode($location, true);
     //print_r($decodedLocation);
     if ($decodedLocation == '') {
          $locationTraced = 'no';
     }
     else {
         $locationTraced = 'yes';
         if (isset($decodedLocation['continent_name']))
         $continentName = $decodedLocation['continent_name'];

         if (isset($decodedLocation['country_name']))
         $countryName = $decodedLocation['country_name'];

         if (isset($decodedLocation['country_capital']))
         $countryCapital = $decodedLocation['country_capital'];

         if (isset($decodedLocation['state_prov']))
         $stateName = $decodedLocation['state_prov'];

         if (isset($decodedLocation['city']))
         $cityName = $decodedLocation['city'];

         if (isset($decodedLocation['zipcode']))
         $zipcode = $decodedLocation['zipcode'];

         if (isset($decodedLocation['latitude']))
         $latitude = $decodedLocation['latitude'];

         if (isset($decodedLocation['longitude']))
         $longitude = $decodedLocation['longitude'];

         if (isset($decodedLocation['calling_code']))
         $callingCode = $decodedLocation['calling_code'];

         if (isset($decodedLocation['country_flag']))
         $countryFlag = $decodedLocation['country_flag'];

         if (isset($decodedLocation['country_tld']))
         $countryTld = $decodedLocation['country_tld'];

         if (isset($decodedLocation['isp']))
         $isp = $decodedLocation['isp'];

         if (isset($decodedLocation['organization']))
         $organization = $decodedLocation['organization'];

         if (isset($decodedLocation['geoname_id']))
         $geonameId = $decodedLocation['geoname_id'];

         if (isset($decodedLocation['currency']['code']))
         $currencyCode = $decodedLocation['currency']['code'];

         if (isset($decodedLocation['currency']['name']))
         $currencyName = $decodedLocation['currency']['name'];
     }
     return true;
 }
 
 private function get_geolocation($apiKey, $ip, $lang = "en", $fields = "*", $excludes = "") {
     $url = "https://api.ipgeolocation.io/ipgeo?apiKey=".$apiKey."&ip=".$ip."&lang=".$lang."&fields=".$fields."&excludes=".$excludes;
     $cURL = curl_init();
     
     curl_setopt($cURL, CURLOPT_URL, $url);
     curl_setopt($cURL, CURLOPT_HTTPGET, true);
     curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Accept: application/json'
     ));
     return curl_exec($cURL); 
     }
 
     private function browserInfo() {
         global $platform, $deviceType, $operatingSystem, $osVersion, $browserType, $browserVersion, $aolVersion, $userAgent;

         $browser = new Browser();
         
         if ($browser->isMobile()) {
             $deviceType = 'Mobile';
         }
         else if ($browser->isTablet()) {
             $deviceType = 'Tablet';
         }
         else if ($browser->isRobot()) {
             $deviceType = 'Robot';
         }
         else if ($browser->isFacebook()) {
             $deviceType = 'Facebook';
         }
         else if ($browser->isChromeFrame()) {
             $deviceType = 'ChromeFrame';
         }
         else {
             $deviceType = 'Computer';
         }
          
         if ($browser->isAol()) {
             $aolVersion = $browser->getAolVersion();
         }
 
         $operatingSystem = $browser->getPlatform();
         
         $browserType = $browser->getBrowser();
 
         $browserVersion = $browser->getVersion();
         
         $userAgent = $browser->getUserAgent();
 
         if ($platform === 'unknown') {
             if ( isset( $_SERVER ) ) {
                 $agent = $_SERVER['HTTP_USER_AGENT'] ;
                  }
               else {
               global $HTTP_SERVER_VARS ;
               if ( isset( $HTTP_SERVER_VARS ) ) {
               $agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ;
               }
               else {
               global $HTTP_USER_AGENT ;
               $agent = $HTTP_USER_AGENT ;
               }
               }
             $blackberry = array(
                 '/blackberry/i' => 'blackberry',
                 '/bb/i' => 'blackberry'
             );
             foreach($blackberry as $berry => $berryvalue) {
                 if (preg_match($berry, $agent)) {
                     $platform = "blackberry";
                     break;
                 }
             }
         }    
         
         $osVersion = self::os_version_detection();
         if ($osVersion === 'Unknown' || trim($osVersion) == "") {
           $osVersion = $operatingSystem;
         }
         return true;
     }
 
     private function os_version_detection() {
         global $platform, $operatingSystem;
         $platform = $operatingSystem;
     if ( isset( $_SERVER ) ) {
         $agent = $_SERVER['HTTP_USER_AGENT'] ;
          }
       else {
       global $HTTP_SERVER_VARS ;
       if ( isset( $HTTP_SERVER_VARS ) ) {
       $agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'] ;
       }
       else {
       global $HTTP_USER_AGENT ;
       $agent = $HTTP_USER_AGENT ;
       }
       }
       if ($platform === 'unknown') {
           return 'Unknown';
       }
     
       else if ($platform === 'blackberry') {
           return 'blackberry';
       }
     
         else if ($platform === 'Android') {  
            $android_version  = "Unknown";
      
            preg_match("/Android (\d+(?:\.\d+)+)/i", $agent, $version);
            $android_version = $version[1];
            
            if ($android_version === 'Unknown') {
             goto detect_platform;
         }
         else {
             return $android_version;
         }    
         }
     
         else if ($platform === 'Windows') {
             $os_platform  = "Unknown";
              
             $os_array     = array(
                     '/windows nt 10/i'      =>  'Windows 10',
                     '/windows nt 6.3/i'     =>  'Windows 8.1',
                     '/windows nt 6.2/i'     =>  'Windows 8',
                     '/windows nt 6.1/i'     =>  'Windows 7',
                     '/windows nt 6.0/i'     =>  'Windows Vista',
                     '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                     '/windows nt 5.1/i'     =>  'Windows XP',
                     '/windows xp/i'         =>  'Windows XP',
                     '/windows nt 5.0/i'     =>  'Windows 2000',
                     '/windows nt 5.01/i'    =>  'Windows 2000 spl',
                     '/windows nt 4.0/i'     =>  'Windows NT 4.0',
                     '/windows me/i'         =>  'Windows ME',
                     '/win98/i'              =>  'Windows 98',
                     '/win95/i'              =>  'Windows 95',
                     '/windows ce/i'         =>  'Windows CE',
                     '/win16/i'              =>  'Windows 3.11',
                     '/windows/i'            =>  'Windows'
             );
         
             foreach ($os_array as $regex => $value) { 
                 if (preg_match($regex, $agent)) { 
                     $os_platform = $value;
                     break;
                 }
             }
             if ($os_platform === 'Unknown') {
                 goto detect_platform;
             }
             else {
                 return $os_platform;
             }
         }
     
         else if ($platform === 'iPhone' || $platform === 'iPod' || $platform === 'iPad') {
             $iphone_platform = 'Unknown';
             $a = array();
             preg_match("/\b[0-9]+_[0-9]+(?:_[0-9]+)?\b/", $agent, $a);
             $iphone_platform = preg_replace("/_/", ".", $a[0]);
     
             if ($iphone_platform === 'Unknown') {
                 goto detect_platform;
             }
             else {
                 return $iphone_platform;
             }
         }
     
         else if ($platform === 'Apple') {
             $mac_version  = "Unknown";
     
             $agent_replace = preg_replace("/_/", ".", $agent); 
             preg_match("/Mac OS X (\d+(?:\.\d+)+)/i", $agent_replace, $version);
             $mac_version = $version[1];
             
             if ($mac_version === 'Unknown') {
              goto detect_platform;
          }
          else {
              return $mac_version;
          }             
         }
     
         else { 
             goto detect_platform;
         }
     
         detect_platform: { 
         $ros[] = array('Windows XP', 'Windows XP');
         $ros[] = array('Windows NT 5.1|Windows NT5.1', 'Windows XP');
         $ros[] = array('Windows 2000', 'Windows 2000');
         $ros[] = array('Windows NT 5.0', 'Windows 2000');
         $ros[] = array('Windows NT 4.0|WinNT4.0', 'Windows NT');
         $ros[] = array('Windows NT 5.2', 'Windows Server 2003');
         $ros[] = array('Windows NT 6.0', 'Windows Vista');
         $ros[] = array('Windows NT 7.0', 'Windows 7');
         $ros[] = array('Windows CE', 'Windows CE');
         $ros[] = array('(media center pc).([0-9]{1,2}\.[0-9]{1,2})', 'Windows Media Center');
         $ros[] = array('(win)([0-9]{1,2}\.[0-9x]{1,2})', 'Windows');
         $ros[] = array('(win)([0-9]{2})', 'Windows');
         $ros[] = array('(windows)([0-9x]{2})', 'Windows');
         // Doesn't seem like these are necessary...not totally sure though..
         //$ros[] = array('(winnt)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'Windows NT');
         //$ros[] = array('(windows nt)(([0-9]{1,2}\.[0-9]{1,2}){0,1})', 'Windows NT'); // fix by bg
         $ros[] = array('Windows ME', 'Windows ME');
         $ros[] = array('Win 9x 4.90', 'Windows ME');
         $ros[] = array('Windows 98|Win98', 'Windows 98');
         $ros[] = array('Windows 95', 'Windows 95');
         $ros[] = array('(windows)([0-9]{1,2}\.[0-9]{1,2})', 'Windows');
         $ros[] = array('win32', 'Windows');
         $ros[] = array('(java)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2})', 'Java');
         $ros[] = array('(Solaris)([0-9]{1,2}\.[0-9x]{1,2}){0,1}', 'Solaris');
         $ros[] = array('dos x86', 'DOS');
         $ros[] = array('unix', 'Unix');
         $ros[] = array('Mac OS X', 'Mac OS X');
         $ros[] = array('Mac_PowerPC', 'Macintosh PowerPC');
         $ros[] = array('(mac|Macintosh)', 'Mac OS');
         $ros[] = array('(sunos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'SunOS');
         $ros[] = array('(beos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'BeOS');
         $ros[] = array('(risc os)([0-9]{1,2}\.[0-9]{1,2})', 'RISC OS');
         $ros[] = array('OS2', 'OS/2');
         $ros[] = array('freebsd', 'FreeBSD');
         $ros[] = array('openbsd', 'OpenBSD');
         $ros[] = array('netbsd', 'NetBSD');
         $ros[] = array('irix', 'IRIX');
         $ros[] = array('plan9', 'Plan9');
         $ros[] = array('osf', 'OSF');
         $ros[] = array('aix', 'AIX');
         $ros[] = array('GNU Hurd', 'GNU Hurd');
         $ros[] = array('(fedora)', 'Fedora');
         $ros[] = array('(kubuntu)', 'Kubuntu');
         $ros[] = array('(ubuntu)', 'Ubuntu');
         $ros[] = array('(debian)', 'Debian');
         $ros[] = array('(CentOS)', 'CentOS');
         $ros[] = array('(Mandriva).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'Mandriva');
         $ros[] = array('(SUSE).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'SUSE');
         $ros[] = array('(Dropline)', 'Linux - Slackware (Dropline GNOME)');
         $ros[] = array('(ASPLinux)', 'ASPLinux');
         $ros[] = array('(Red Hat)', 'Red Hat');
         // Loads of Linux machines will be detected as unix.
         // Actually, all of the linux machines I've checked have the 'X11' in the User Agent.
         //$ros[] = array('X11', 'Unix');
         $ros[] = array('(linux)', 'Linux');
         $ros[] = array('(amigaos)([0-9]{1,2}\.[0-9]{1,2})', 'AmigaOS');
         $ros[] = array('amiga-aweb', 'AmigaOS');
         $ros[] = array('amiga', 'Amiga');
         $ros[] = array('AvantGo', 'PalmOS');
         //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1}-([0-9]{1,2}) i([0-9]{1})86){1}', 'Linux');
         //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1} i([0-9]{1}86)){1}', 'Linux');
         //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1})', 'Linux');
         //$ros[] = array('[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3})', 'Linux');
         //$ros[] = array('(webtv)/([0-9]{1,2}\.[0-9]{1,2})', 'WebTV');
         $ros[] = array('Dreamcast', 'Dreamcast OS');
         $ros[] = array('GetRight', 'Windows');
         $ros[] = array('go!zilla', 'Windows');
         $ros[] = array('gozilla', 'Windows');
         $ros[] = array('gulliver', 'Windows');
         $ros[] = array('ia archiver', 'Windows');
         $ros[] = array('NetPositive', 'Windows');
         $ros[] = array('mass downloader', 'Windows');
         $ros[] = array('microsoft', 'Windows');
         $ros[] = array('offline explorer', 'Windows');
         $ros[] = array('teleport', 'Windows');
         $ros[] = array('web downloader', 'Windows');
         $ros[] = array('webcapture', 'Windows');
         $ros[] = array('webcollage', 'Windows');
         $ros[] = array('webcopier', 'Windows');
         $ros[] = array('webstripper', 'Windows');
         $ros[] = array('webzip', 'Windows');
         $ros[] = array('wget', 'Windows');
         $ros[] = array('Java', 'Unknown');
         $ros[] = array('flashget', 'Windows');
         // delete next line if the script show not the right OS
         //$ros[] = array('(PHP)/([0-9]{1,2}.[0-9]{1,2})', 'PHP');
         $ros[] = array('MS FrontPage', 'Windows');
         //$ros[] = array('(msproxy)/([0-9]{1,2}.[0-9]{1,2})', 'Windows');
         $ros[] = array('(msie)([0-9]{1,2}.[0-9]{1,2})', 'Windows');
         $ros[] = array('libwww-perl', 'Unix');
         $ros[] = array('UP.Browser', 'Windows CE');
         $ros[] = array('NetAnts', 'Windows');
         $file = count ( $ros );
         $os = '';
         try {
         for ($n=0 ; $n<$file ; $n++ ){
          // echo $ros[$n][0]."<br/>";
             if ( preg_match('/'.$ros[$n][0].'/i' , $agent, $name)){
                 $os = @$ros[$n][1].' '.@$name[2];
                 break;
             }
         }
     }
     catch (Exception $e) {
         $os = "Unknown";
     }
         return trim($os);
     }
         }
 
   function detectOSBit() {
     global $osBit;
 
     if (strlen(decbin(~0)) == 32 ||PHP_INT_SIZE === 4) {
         $osBit = 32;
     }
     else {
         $osBit = 64;
     }
     return true;
         }
 
 private function setFingerprint() {
     global $fingerPrintData, $webDriver, $language, $colorDepth, $deviceMemory, $hardwareConcurrency, 
     $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $timezoneOffset, $timezone, 
     $sessionStorageSupport, $localStorageSupport, $indexedDbSupport, $addBehaviorSupport, $openDatabaseSupport,
     $cpuClassValue, $plugins, $webglVendor, $adBlock, $liedLanguages, $liedResolution, $liedOs, $liedBrowser,
     $touchSupport, $fonts, $audio;
 
     $webDriverValue = $fingerPrintData[1]['value'];
 
     if ($webDriverValue === 'false' || $webDriverValue == "" || $webDriverValue == null) {
         $webDriver = 'no';
     }
     else if ($webDriverValue === 'true' || $webDriverValue === '1') {
         $webDriver = 'yes';
     }
     else {
         $webDriver = $webDriverValue;
     }
 
     $language = $fingerPrintData[2]['value'];
 
     $colorDepth = $fingerPrintData[3]['value'];
 
     $deviceMemory = $fingerPrintData[4]['value'];
 
     $hardwareConcurrency = $fingerPrintData[5]['value'];
 
     $screenResolutionWidth = $fingerPrintData[6]['value'][1];
     $screenResolutionHeight = $fingerPrintData[6]['value'][0];
 
     $viewPortWidth = $fingerPrintData[7]['value'][1];
     $viewPortHeight = $fingerPrintData[7]['value'][0];
 
     $timezoneOffset = $fingerPrintData[8]['value'];
 
 if (isset($fingerPrintData[9]['value'])) {
     $timezone = $fingerPrintData[9]['value'];
 }
 else {
     $timezone = 'none';
 }
 
 
     $sessionStorageValue = $fingerPrintData[10]['value'];
     
     if ($sessionStorageValue === 'false' || $sessionStorageValue == "" || $sessionStorageValue == null) {
         $sessionStorageSupport = 'no';
     }
     else if ($sessionStorageValue === 'true' || $sessionStorageValue === '1') {
         $sessionStorageSupport = 'yes';
     }
     else {
         $sessionStorageSupport = $sessionStorageValue;
     }
 
 
     $localStorageValue = $fingerPrintData[11]['value'];
 
     if ($localStorageValue === 'false' || $localStorageValue == "" || $localStorageValue == null) {
         $localStorageSupport = 'no';
     }
     else if ($localStorageValue === 'true' || $localStorageValue === '1') {
         $localStorageSupport = 'yes';
     }
     else {
         $localStorageSupport = $localStorageValue;
     }
 
 
     $indexedDbValue = $fingerPrintData[12]['value'];
 
     if ($indexedDbValue === 'false' || $indexedDbValue == "" || $indexedDbValue == null) {
         $indexedDbSupport = 'no';
     }
     else if ($indexedDbValue === 'true' || $indexedDbValue === '1') {
         $indexedDbSupport = 'yes';
     }
     else {
         $indexedDbSupport = $indexedDbValue;
     }
 
 
     $addBehaviorValue = $fingerPrintData[13]['value'];
 
     if ($addBehaviorValue === 'false' || $addBehaviorValue == "" || $addBehaviorValue == null) {
         $addBehaviorSupport = 'no';
     }
     else if ($addBehaviorValue === 'true' || $addBehaviorValue === '1') {
         $addBehaviorSupport = 'yes';
     }
     else {
         $addBehaviorSupport = $addBehaviorValue;
     }
 
 
     $openDatabaseValue = $fingerPrintData[14]['value'];
 
     if ($openDatabaseValue === 'false' || $openDatabaseValue == "" || $indexedDbValue == null) {
         $openDatabaseSupport = 'no';
     }
     else if ($openDatabaseValue === 'true' || $openDatabaseValue === '1') {
         $openDatabaseSupport = 'yes';
     }
     else {
         $openDatabaseSupport = $openDatabaseValue;
     }
 
     $cpuClassValue = $fingerPrintData[15]['value'];
 
     $i = 1;
     $plugins_array = $fingerPrintData[17];
     
     foreach($plugins_array as $plugin) {
         if (is_array($plugin) || is_object($plugin)) {
             foreach($plugins_array as $val) {
                 if (is_array($val) || is_object($val)) {
                     foreach($val as $val2) {
                         if (is_array($val2) || is_object($val2)) {
                             foreach($val2 as $val3) {
                                 if (is_array($val3) || is_object($val3)) {
                                     foreach($val3 as $val4) {
                                         if (is_array($val4) || is_object($val4)) {
                                             foreach($val4 as $val5) {
                                                 if (is_array($val5) || is_object($val5)) {
                                                     continue;
                                                 }
                                                 else {
                                                     if (strlen($val5) > 2 && $val5 !== 'plugins') {
                                                     $plugins .= $val5;
                                                     $plugins .= ';';
                                                 } 
                                                 }
                                             }
                                         }
                                         else {
                                             if (strlen($val4) > 2 && $val4 !== 'plugins') {
                                             $plugins .= $val4;
                                             $plugins .= ';';
                                             }
                                         }
                                     }
                                 }
                                 else {
                                     if (strlen($val3) > 2 && $val3 !== 'plugins') {
                                     $plugins .= $val3;
                                     $plugins .= ';';
                                     }
                                 }
                             }
                         }
                         else {
                             if (strlen($val2) > 2 && $val2 !== 'plugins') {
                             $plugins .= $val2;
                             $plugins .= ';';
                             }
                         }
                     }
                 }
                 else {
                     if ($val !== "" && $val !== 'plugins') {
                     $plugins .= $val;
                     $plugins .= ';';
                     }
                 }
             }
         }
         else {
             if ($plugin == '' || $plugin == 'plugins') {
                 continue;
             }
             else {
                 $plugins .= $plugin;
                 $plugins .= ';';
             }
         }
     }
 
 
     $webglVendor = $fingerPrintData[20]['value'];
 
     
     $adBlockValue = $fingerPrintData[21]['value'];
 
     if ($adBlockValue === 'false' || $adBlockValue == "" || $adBlockValue == null || $adBlockValue == 0 || $adBlockValue == false) {
         $adBlock = 'no';
     }
     else if ($adBlockValue === 'true' || $adBlockValue === '1') {
         $adBlock = 'yes';
     }
     else {
         $adBlock = $adBlockValue;
     }
 
 
     $liedLanguagesValue = $fingerPrintData[22]['value'];
 
     if ($liedLanguagesValue === 'false' || $liedLanguagesValue == "" || $liedLanguagesValue == null || $liedLanguagesValue == 0 || $liedLanguagesValue == false) {
         $liedLanguages = 'no';
     }
     else if ($liedLanguagesValue === 'true' || $liedLanguagesValue === '1') {
         $liedLanguages = 'yes';
     }
     else {
         $liedLanguages = $liedLanguagesValue;
     }
 
 
     $liedResolutionValue = $fingerPrintData[23]['value'];
 
     if ($liedResolutionValue === 'false' || $liedResolutionValue == "" || $liedResolutionValue == null || $liedResolutionValue == 0 || $liedResolutionValue == false) {
         $liedResolution = 'no';
     }
     else if ($liedResolutionValue === 'true' || $liedResolutionValue === '1') {
         $liedResolution = 'yes';
     }
     else {
         $liedResolution = $liedResolutionValue;
     }
 
 
     $liedOsValue = $fingerPrintData[24]['value'];
 
     if ($liedOsValue === 'false' || $liedOsValue == "" || $liedOsValue == 0 || $liedOsValue == false) {
         $liedOs = 'no';
     }
     else if ($liedOsValue === 'true' || $liedOsValue === '1') {
         $liedOs = 'yes';
     }
     else {
         $liedOs = $liedOsValue;
     }
 
 
     $liedBrowserValue = $fingerPrintData[25]['value'];
 
     if ($liedBrowserValue === 'false' || $liedBrowserValue == "" || $liedBrowserValue == null || $liedBrowserValue == 0 || $liedBrowserValue == false) {
         $liedBrowser = 'no';
     }
     else if ($liedBrowserValue === 'true' || $liedBrowserValue === '1') {
         $liedBrowser = 'yes';
     }
     else {
         $liedBrowser = $liedBrowserValue;
     }
  
     
     $touchSupportValue = $fingerPrintData[26]['value'][1];
 
     if ($touchSupportValue === 'false' || $touchSupportValue == "" || $touchSupportValue == null || $touchSupportValue == 0 || $touchSupportValue == false) {
         $touchSupport = 'no';
     }
     else if ($touchSupportValue === 'true' || $touchSupportValue === '1') {
         $touchSupport = 'yes';
     }
     else {
         $touchSupport = $touchSupportValue;
     }
 
 if (isset($fingerPringData[27]['value'])) {
     $fontarray = $fingerPrintData[27]['value'];
     foreach($fontarray as $font) {
         $fonts .= $font;
         $fonts .= ';';
     }
 }
 
 
     $audio = $fingerPrintData[28]['value'];
     
     return true;
 }
 

  private function checkSessions() {
    global $pageId;
    global $sessionsSet;
    global $sessions_returnId;
    global $sessions_lastVisitedDate;

   if (isset($_SESSION[$pageId])) {
     $sessionsSet = "set";
     $sessions_returnId = trim($_SESSION[$pageId]['returnId']);
     $sessions_lastVisitedDate = trim($_SESSION[$pageId]['lastVisitedDate']);
   }
   else {
     $sessionsSet = "no";
   }
   return true;
 }

 private function checkCookies() {
   global $pageId;
   global $cookiesSet;
   global $cookies_returnId;
   global $cookies_lastVisitedDate;

   if (isset($_COOKIE[$pageId])) {
    $cookiesSet = "set";
    $cookies = json_decode($_COOKIE[$pageId], true);

    $cookies_returnId = trim($cookies['returnId']);
    $cookies_lastVisitedDate = trim($cookies['lastVisitedDate']);
   }
   else {
    $cookiesSet = "no";
   }
   return true;
 }

private function checkCache() {
 global $pageId;
 global $cacheSet;
 global $cache_returnId;
 global $cache_lastVisitedDate;

 $c = new Cache();
 $c->setCache('sabiduria');

 $result = $c->retrieve($pageId);

 $cache_bef_returnId = $result['returnId'];
 $cache_bef_visitedDate = $result['lastVisitedDate'];
if ($cache_bef_returnId == "" || $cache_bef_visitedDate == "" || strlen($cache_bef_returnId) !== 6 ) {
    $cacheSet = "no";
}
else {
    $cacheSet = 'set';
    $cache_returnId = trim($cache_bef_returnId);
    $cache_lastVisitedDate = trim($cache_bef_visitedDate);
}
return true;
}

   private function checkUserVisit() {
        global $conn;
        global $sessionStorageSet, $localStorageSet, $localforageSet, $superCookiesSet, $everCookiesSet, 
        $canvas1, $canvas2, $privateUserIp, $webgl, $sessionStorage_returnId, $sessionStorage_lastVisitedDate, 
        $localStorage_returnId, $localStorage_lastVisitedDate, $localforage_returnId, $localforage_lastVisitedDate,
        $superCookies_returnId, $superCookies_lastVisitedDate, $everCookies_returnId, $everCookies_lastVisitedDate,
        $sessionsSet, $cookiesSet, $cacheSet, $sessions_returnId, $sessions_lastVisitedDate, $cookies_returnId, 
        $cookies_lastVisitedDate, $cache_returnId, $cache_lastVisitedDate, $ipaddress, $locationTraced, 
        $continentName, $countryName, $countryCapital, $stateName, $cityName, $zipcode, $latitude, $longitude, 
        $callingCode, $countryFlag, $countryTld, $isp, $organization, $geonameId, $currencyCode, $currencyName, 
        $usingProxy, $ipaddress, $deviceType, $operatingSystem, $osVersion, $osBit, $isAol, $browserType, $browserVersion, 
        $aolVersion, $userAgent, $fingerPrintData, $webDriver, $language, $colorDepth, $deviceMemory, $hardwareConcurrency, 
        $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $timezoneOffset, $timezone, 
        $sessionStorageSupport, $localStorageSupport, $indexedDbSupport, $addBehaviorSupport, $openDatabaseSupport,
        $cpuClassValue, $plugins, $webglVendor, $adBlock, $liedLanguages, $liedResolution, $liedOs, $liedBrowser,
        $touchSupport, $fonts, $audio, $final_returnId, $final_lastVisitedDate;
        
        
                  $GLOBALS['total_array'] = array(
                    'sessionStorageSet' => $sessionStorageSet,
                    'sessionsSet' => $sessionsSet,
                    'cookiesSet' => $cookiesSet,
                    'localStorageSet' => $localStorageSet,
                    'cacheSet' => $cacheSet,
                    'localforageSet' => $localforageSet,
                    'superCookiesSet' => $superCookiesSet,
                    'everCookiesSet' => $everCookiesSet,
                    'canvas1' => $canvas1,
                    'canvas2' => $canvas2,
                    'webgl' => $webgl,
                    'privateUserIp' => $privateUserIp,
                    'sessionStorage_returnId' => $sessionStorage_returnId,
                    'sessionStorage_lastVisitedDate' => $sessionStorage_lastVisitedDate,
                    'sessions_returnId' => $sessions_returnId,
                    'sessions_lastVisitedDate' => $sessions_lastVisitedDate,
                    'cookies_returnId' => $cookies_returnId,
                    'cookies_lastVisitedDate' => $cookies_lastVisitedDate,
                    'localStorage_returnId' => $localStorage_returnId,
                    'localStorage_lastVisitedDate' => $localStorage_lastVisitedDate,
                    'cache_returnId' => $cache_returnId,
                    'cache_lastVisitedDate' => $cache_lastVisitedDate,
                    'localforage_returnId' => $localforage_returnId,
                    'localforage_lastVisitedDate' => $localforage_lastVisitedDate,
                    'superCookies_returnId' => $superCookies_returnId,
                    'superCookies_lastVisitedDate' => $superCookies_lastVisitedDate,
                    'everCookies_returnId' => $everCookies_returnId,
                    'everCookies_lastVisitedDate' => $everCookies_lastVisitedDate
                );
                //echo '<pre>';
                //print_r($GLOBALS['total_array']);
                //echo '</pre>';
                
                if ($GLOBALS['total_array']['everCookiesSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['everCookies_returnId']) == 6) {
                    $final_returnId = $GLOBALS['total_array']['everCookies_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['everCookies_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['superCookiesSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['everCookies_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['superCookies_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['superCookies_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['localforageSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['localforage_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['localforage_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['localforage_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['cacheSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['cache_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['cache_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['cache_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['localStorageSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['localStorage_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['localStorage_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['localStorage_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['cookiesSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['cookies_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['cookies_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['cookies_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['sessionsSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['sessions_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['sessions_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['sessions_lastVisitedDate'];
                    return true;
                  }
                }

                if ($GLOBALS['total_array']['sessionStorageSet'] === 'set') {
                  if (strlen($GLOBALS['total_array']['sessionStorage_returnId']) == 6 && $final_returnId == '') {
                    $final_returnId = $GLOBALS['total_array']['sessionStorage_returnId'];
                    $final_lastVisitedDate = $GLOBALS['total_array']['sessionStorage_lastVisitedDate'];
                    return true;
                  }
                }

                $userPoints = array();

                if ($final_returnId == '') {
                  $select = "SELECT * FROM `trackingusers`";
                  $result = $conn->query($select);
                  if($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      $fingerprintPoints = 0;
                      $rightAnswers = 0;
                      $totalQuestions = 0;
                      $points = 0;

                      $userId = $row['returnid'];
                      $userPoints[$userId] = $points;

                      $totalQuestions = $totalQuestions + 1;
                      if ($sessionStorageSet === $row['sessionStorageSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($localStorageSet === $row['localStorageSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($localforageSet === $row['localforageSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($superCookiesSet === $row['superCookiesSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($everCookiesSet === $row['everCookiesSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($sessionsSet === $row['sessionsSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($cookiesSet === $row['cookiesSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($cacheSet === $row['cacheSet']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($webDriver === $row['webDriver']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($colorDepth === $row['colorDepth']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($deviceMemory === $row['deviceMemory']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($hardwareConcurrency === $row['hardwareConcurrency']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($sessionStorageSupport === $row['sessionStorageSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($localStorageSupport === $row['localStorageSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($indexedDbSupport === $row['indexedDbSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($addBehaviorSupport === $row['addBehaviorSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($openDatabaseSupport === $row['openDatabaseSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($cpuClassValue === $row['cpuClassValue']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($webglVendor === $row['webglVendor']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($adBlock === $row['adBlock']) {
                        $rightAnswers = $rightAnswers + 1;
                      }
                      
                      $totalQuestions = $totalQuestions + 1;
                      if ($touchSupport === $row['touchSupport']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      $totalQuestions = $totalQuestions + 1;
                      if ($osBit === $row['osBit']) {
                        $rightAnswers = $rightAnswers + 1;
                      }

                      if ($isAol === 'yes') {
                      $totalQuestions = $totalQuestions + 1;
                      if ($aolVersion === $row['aolVersion']) {
                        $rightAnswers = $rightAnswers + 1;
                      }
                    }

                    $totalQuestions = $totalQuestions + 1;
                    if ($timezoneOffset === $row['timezoneOffset']) {
                      $rightAnswers = $rightAnswers + 1;
                    }

                    $totalQuestions = $totalQuestions + 1;
                    if ($timezone === $row['timezone']) {
                      $rightAnswers = $rightAnswers + 1;
                    }

                    $fingerprintPoints = $rightAnswers/$totalQuestions * 100;


                    if ($usingProxy === 'no'  && $locationTraced === 'yes') { 
                      $locationAnswer = 0;
                      $locationQuestions = 0;
                      $locationPercentage = 0;

                      if ($row['continentName'] !== 'no') {
                        $totalQuestions = $totalQuestions + 1;
                        $locationQuestions = $locationQuestions + 1; 
                      if ($continentName === $row['continentName']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                    if ($row['countryName'] !== 'no') { 
                      $totalQuestions = $totalQuestions + 1;
                      $locationQuestions = $locationQuestions + 1; 
                      if ($countryName === $row['countryName']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                    if ($row['stateName'] !== 'no') {
                      $locationQuestions = $locationQuestions + 1; 
                      $totalQuestions = $totalQuestions + 1;
                      if ($stateName === $row['stateName']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                      if ($row['cityName'] !== 'no') { 
                        $locationQuestions = $locationQuestions + 1; 
                        $totalQuestions = $totalQuestions + 1;
                      if ($cityName === $row['cityName']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                    if ($row['zipcode'] !== 'no') {
                      $locationQuestions = $locationQuestions + 1; 
                      $totalQuestions = $totalQuestions + 1;
                      if ($zipcode === $row['zipcode']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                  
                    if ($row['isp'] !== 'no') {
                      $locationQuestions = $locationQuestions + 1; 
                      $totalQuestions = $totalQuestions + 1;
                      if ($isp === $row['isp']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                    if ($row['organization'] !== 'no') { 
                      $locationQuestions = $locationQuestions + 1; 
                      $totalQuestions = $totalQuestions + 1;
                      if ($organization === $row['organization']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }
                      
                    if ($row['geonameId'] !== 'no') { 
                      $locationQuestions = $locationQuestions + 1; 
                      $totalQuestions = $totalQuestions + 1;
                      if ($geonameId === $row['geonameId']) {
                        $rightAnswers = $rightAnswers + 1;
                        $locationAnswer = $locationAnswer + 1;
                      }
                    }

                    $locationPercentage = $locationAnswer/$locationQuestions*100;

                    if ($locationPercentage >=95 && $fingerprintPoints >= 95) {
                      $final_returnId = $row['returnid'];
                      $final_lastVisitedDate = $row['lastVisitedDate'];
                      return true;
                    }
                }

                if ($liedOs === 'false' || $liedOs == "" || $liedOs == null || $liedOs === 'no' || $liedOs === false) {
                  $totalQuestions = $totalQuestions + 1;
                  if ($operatingSystem === $row['operatingSystem']) {
                    $rightAnswers = $rightAnswers + 1;
                  }

                  $totalQuestions = $totalQuestions + 1;
                  if ($osVersion === $row['osVersion']) {
                    $rightAnswers = $rightAnswers + 1;
                  }

                  $totalQuestions = $totalQuestions + 1;
                  if ($deviceType === $row['deviceType']) {
                    $rightAnswers = $rightAnswers + 1;
                  }
                }

                if ($liedResolution === 'false' || $liedResolution == "" || $liedResolution == null || $liedResolution === 'no' || $liedResolution === false) {
                  
                  $totalQuestions = $totalQuestions + 1;                    
                  if ($screenResolutionWidth === $row['screenResolutionWidth']) {
                    $rightAnswers = $rightAnswers + 1;
                  }

                  $totalQuestions = $totalQuestions + 1;
                  if ($screenResolutionHeight === $row['screenResolutionHeight']) {
                    $rightAnswers = $rightAnswers + 1;
                  }

                  $totalQuestions = $totalQuestions + 1;
                  if ($viewPortWidth === $row['viewPortWidth']) {
                    $rightAnswers = $rightAnswers + 1;
                  }

                  $totalQuestions = $totalQuestions + 1;
                  if ($viewPortHeight === $row['viewPortHeight']) {
                    $rightAnswers = $rightAnswers + 1;
                  }
                }

                if ($liedLanguages === 'false' || $liedLanguages == "" || $liedLanguages == null || $liedLanguages === 'no' || $liedLanguages === false) {
                  $totalQuestions = $totalQuestions + 1;
                if ($language === $row['language']) {
                  $rightAnswers = $rightAnswers + 1;
                }
              }

              if ($liedBrowser === 'false' || $liedBrowser == "" || $liedBrowser == null || $liedBrowser === false || $liedBrowser === 'no') {
                $totalQuestions = $totalQuestions + 1;                 
                if ($browserType === $row['browserType']) {
                  $rightAnswers = $rightAnswers + 1;
                }

                $totalQuestions = $totalQuestions + 1;
                if ($browserVersion === $row['browserVersion']) {
                  $rightAnswers = $rightAnswers + 1;
                }
              }


                    $points = $rightAnswers/$totalQuestions * 100;


                      if ($row['ipaddress'] === $ipaddress) {
                        $count = 0;

                        if ($row['privateUserIp'] !== "no") {
                          if ($row['privateUserIp'] === $privateUserIp) {
                            $count = $count + 5;
                          }
                        }

                        if ($row['canvas1'] !== "no") {
                          if ($row['canvas1'] === $canvas1) {
                            $count = $count + 5;
                          }
                        }
                        if ($row['canvas2'] !== "no") {
                          if ($row['canvas2'] === $canvas2) {
                            $count = $count + 5;
                          }
                        }
                        if ($row['webgl'] !== 'no') {
                         if ($row['webgl'] === $webgl) {
                           $count = $count + 5;
                         }
                        }
                        if ($row['audio'] !== 'no') {
                          if ($row['audio'] === $audio) {
                            $count = $count + 5;
                          }
                         }
                         if ($row['userAgent'] !== 'no') {
                          if ($row['userAgent'] === $userAgent) {
                            $count = $count + 5;
                          }
                         }

                         if ($count >= 20 || $points >= 80) {
                          $final_returnId = $row['returnid'];
                          $final_lastVisitedDate = $row['lastVisitedDate'];
                          return true;
                        }
                      }

                         $count2 = 0;
                      if ($row['canvas1'] !== "no") {
                        if ($row['canvas1'] === $canvas1) {
                          $count2 = $count2 + 5;
                        }
                      }
                      if ($row['canvas2'] !== "no") {
                        if ($row['canvas2'] === $canvas2) {
                          $count2 = $count2 + 5;
                        }
                      }
                      if ($row['webgl'] !== 'no') {
                       if ($row['webgl'] === $webgl) {
                         $count2 = $count2 + 5;
                       }
                      }
                      if ($row['audio'] !== 'no') {
                        if ($row['audio'] === $audio) {
                          $count2 = $count2 + 5;
                        }
                       }
                       if ($row['userAgent'] !== 'no') {
                        if ($row['userAgent'] === $userAgent) {
                          $count2 = $count2 + 5;
                        }
                       }

                      if ($count2 >= 15 && $points >= 85) {
                        $final_returnId = $row['returnid'];
                        $final_lastVisitedDate = $row['lastVisitedDate'];
                        return true;
                      }
                      if ($count2 >= 20 && $points >= 80) {
                        $final_returnId = $row['returnid'];
                        $final_lastVisitedDate = $row['lastVisitedDate'];
                        return true;
                      }
                      if ($points >= 90) {
                        $userPoints[$userId] = $points;
                      }
                    }
                    $maxPoints = max($userPoints);
                    $maxIndex = array_search(max($userPoints), $userPoints);

                    if ($maxPoints > 90) {

                    $select2 = $conn->prepare("SELECT `lastVisitedDate` FROM `trackingusers` WHERE `returnid` = ?");
                    $select2->bind_param("s", $maxIndex);
                    $select2->execute();
                    $result2 = $select2->get_result();
                    if ($result2->num_rows > 0) {
                      $row2 = $result2->fetch_assoc();
                      $final_returnId = $maxIndex;
                      $final_lastVisitedDate = $row2['lastVisitedDate'];
                      return true;
                    }
                    else {
                      $final_returnId = '';
                      $final_lastVisitedDate = '';
                      return true;
                    }
                    }
                  } 
                }
            return true;
     }

 
   private function createSessions() {
     global $pageId;
     global $articleReturnId;
     $date = date("Y/m/d h:i:s");
     
     $cookies_arr =  array(
       'returnId'=> $articleReturnId,
       'lastVisitedDate'=>$date
     ); 
       $_SESSION[$pageId] = $cookies_arr; 
       return true;
   }
 
   private function createCookies() {
     global $pageId;
     global $articleReturnId;
     $date = date("Y/m/d h:i:s");

     $cookies_arr =  array(
     'returnId'=> $articleReturnId,
     'lastVisitedDate'=>$date
   ); 
     setcookie($pageId, json_encode($cookies_arr), time() + (86400 * 30), '/');
     return true;
   }
 
  private function createCache() {
   global $pageId;
   global $articleReturnId;
   $c = new Cache();
 $c->setCache('sabiduria');
 
 $date = date("Y/m/d h:i:s");
   $c->store($pageId, array(
     'returnId'=> $articleReturnId,
     'lastVisitedDate'=>$date
   ));
  return true;
  }

  private function finalData() {
    global $final_returnId;
    global $pageId, $conn;

    if ($final_returnId == '') {
      do { 
        $id = mt_rand(500000, 999999);
        $selectid = $conn->prepare("SELECT `returnid` from `trackingusers` WHERE `returnid` = ?");
        $selectid->bind_param("s", $id);
        $selectid->execute();
        $resultid = $selectid->get_result();
        if ($resultid->num_rows > 0) {
          continue;
        }
        else {
          $GLOBALS['final_returnId'] = $id;
          mysqli_free_result($resultid);
          $selectid->close();
          break;
        }
      } while(true);
    }
                     
    if (self::createSessions()) {
      if (self::createCookies()) {
        self::createCache();
        echo "
        <script type = \"text/javascript\"> 
        var articleReturnId = $final_returnId;
        var pageId = \"$pageId\";
        /*var ec = new evercookie({
          baseurl: '', 
          asseturi: '', 
          phpuri: '' 
        }); */
 
    executeJSFunctions();

    function executeJSFunctions() {
    console.log(articleReturnId);
    console.log(pageId);
    
      //createEverCookies();
      createSessionStorage();
      createLocalStorage();
      createSuperCookies();   
      createLocalforage()  
    }
    
      function createSessionStorage() {
      if (typeof(Storage) !== \"undefined\") {
      var dateAndTime = new Date();
      
      var storageItems = { 
        'returnId': articleReturnId,
        'lastVisitedDate': dateAndTime
      };
      sessionStorage.setItem(pageId, JSON.stringify(storageItems));
      } 
    }
    
    function createLocalStorage() {
      if (typeof(Storage) !== \"undefined\") {
    
      var dateAndTime = new Date();
      var storageItems = { 
        'returnId': articleReturnId,
        'lastVisitedDate': dateAndTime
      };
      localStorage.setItem(pageId, JSON.stringify(storageItems));
     }
    }
    
    function createLocalforage() {
      var dateAndTime = new Date();
      var storageItems = { 
        'returnId': articleReturnId,
        'lastVisitedDate': dateAndTime
      };
      localforage.setItem(pageId, JSON.stringify(storageItems));
    }
    
    function createSuperCookies() {
        var dateAndTime = new Date();
    
        $.super_cookie({
            expires: 1,
            path: '/',
        })
        .create(pageId, {
           'returnId': articleReturnId,
           'lastVisitedDate': dateAndTime,
         });
    }
    
    
    function createEverCookies() {
      var dateAndTime = new Date();
    console.log('executing ever cookies');
      var storageItems = { 
        'returnId': articleReturnId,
        'lastVisitedDate': dateAndTime
      };
      ec.set(pageId, JSON.stringify(storageItems));
    }
     </script>
     ";
      }
    }

    return true;
  }

  private function enterIntoDatabase() {
    global $conn;
    global $final_returnId, $final_lastVisitedDate, $ipaddress, $privateUserIp, $canvas1, $canvas2,
    $webgl, $usingProxy, $locationTraced, $continentName, $countryName, $countryCapital, $stateName, $cityName, 
    $zipcode, $latitude, $longitude, $callingCode, $countryFlag, $countryTld, $isp, $organization, $geonameId, $currencyCode, 
    $currencyName,  $webDriver, $language, $colorDepth, $deviceMemory, $hardwareConcurrency, 
    $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $timezoneOffset, $timezone, 
    $sessionStorageSupport, $localStorageSupport, $indexedDbSupport, $addBehaviorSupport, $openDatabaseSupport,
    $cpuClassValue, $plugins, $webglVendor, $adBlock, $liedLanguages, $liedResolution, $liedOs, $liedBrowser,
    $touchSupport, $fonts, $audio, $deviceType, $operatingSystem, $osVersion, $osBit, $browserType, $browserVersion, $isAol, $aolVersion,
    $userAgent, $sessionStorageSet, $localStorageSet, $localforageSet, $superCookiesSet, $everCookiesSet, 
    $sessionsSet, $cookiesSet, $cacheSet;
    $httpReferrer = '';
   
   if(isset($_SERVER['HTTP_REFERER'])) {
      $httpReferrer = $_SERVER['HTTP_REFERER'];
   } 

    $GLOBALS['insertedNow'] = 'no';


    $select3 = $conn->prepare("SELECT `returnid` FROM `trackingusers` WHERE `returnid` = ?");
    $select3->bind_param("s", $final_returnId);
    $select3->execute();
    $result3 = $select3->get_result();
    if ($result3->num_rows < 1) { 
     $GLOBALS['insertedNow'] = 'yes';
    $final_lastVisitedDate = date("Y/m/d h:i:s");;

      $insert = $conn->prepare("INSERT INTO `trackingusers` (`returnid`, `lastVisitedDate`,  `ipaddress`,
      `privateUserIp`, `canvas1`, `canvas2`, `webgl`, `usingProxy`, `locationTraced`, `continentName`, `countryName`, 
      `countryCapital`, `stateName`, `cityName`, `zipcode`, `latitude`, `longitude`, `callingCode`, `countryFlag`, 
      `countryTld`, `isp`, `organization`, `geonameId`, `currencyCode`, `currencyName`,
      `webDriver`, `language`, `colorDepth`, `deviceMemory`, `hardwareConcurrency`, `screenResolutionWidth`, 
      `screenResolutionHeight`, `viewPortWidth`, `viewPortHeight`, `timezoneOffset`, `timezone`, 
      `sessionStorageSupport`, `localStorageSupport`, `indexedDbSupport`, `addBehaviorSupport`, `openDatabaseSupport`,
      `cpuClassValue`, `plugins`, `webglVendor`, `adBlock`, `liedLanguages`, `liedResolution`, `liedOs`, `liedBrowser`,
      `touchSupport`, `fonts`, `audio`, `deviceType`, `operatingSystem`, `osVersion`, `osBit`, `browserType`, 
      `browserVersion`,`isAol`, `aolVersion`, `userAgent`, `sessionStorageSet`, `localStorageSet`, `localforageSet`,
       `superCookiesSet`, `everCookiesSet`, `sessionsSet`, `cookiesSet`, `cacheSet`, `httpReferrer`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
      ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
      ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $insert->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
       $final_returnId, $final_lastVisitedDate, $ipaddress, $privateUserIp, $canvas1, $canvas2,
    $webgl, $usingProxy, $locationTraced, $continentName, $countryName, $countryCapital, $stateName, $cityName, 
    $zipcode, $latitude, $longitude, $callingCode, $countryFlag, $countryTld, $isp, $organization, $geonameId, $currencyCode, 
    $currencyName,  $webDriver, $language, $colorDepth, $deviceMemory, $hardwareConcurrency, 
    $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $timezoneOffset, $timezone, 
    $sessionStorageSupport, $localStorageSupport, $indexedDbSupport, $addBehaviorSupport, $openDatabaseSupport,
    $cpuClassValue, $plugins, $webglVendor, $adBlock, $liedLanguages, $liedResolution, $liedOs, $liedBrowser,
    $touchSupport, $fonts, $audio, $deviceType, $operatingSystem, $osVersion, $osBit, $browserType, $browserVersion, $isAol, $aolVersion,
    $userAgent, $sessionStorageSet, $localStorageSet, $localforageSet, $superCookiesSet, $everCookiesSet, 
    $sessionsSet, $cookiesSet, $cacheSet, $httpReferrer);
      $insert->execute();
      $insert->close();
    }
 
    if ($GLOBALS['insertedNow'] === 'no') { 
      $select4 = $conn->prepare("SELECT `ipaddress`, `privateUserIp`, `usingProxy`, `liedBrowser`, `liedLanguages`, `liedResolution`, `liedOs` FROM `trackingusers` WHERE `returnid` = ?");
      $select4->bind_param("s", $final_returnId);
      $select4->execute();
      $result4 = $select4->get_result();
      if ($result4->num_rows > 0) {
        $row4 = $result4->fetch_assoc();
      if ($usingProxy === 'no' && $row4['usingProxy'] === 'yes' && $locationTraced === 'yes') {
        $update = $conn->prepare('UPDATE `trackingusers` SET `ipaddress` = ?, `privateUserIp` = ?, `usingProxy` = ?, `locationTraced` = ?, `continentName` = ?, `countryName` = ?, 
        `countryCapital` = ?, `stateName` = ?, `cityName` = ?, `zipcode` = ?, `latitude` = ?, `longitude` = ?,
         `callingCode` = ?, `countryFlag` = ?, `countryTld` = ?, `isp` = ?, `organization` = ?, `geonameId` = ?,
          `currencyCode` = ?, `currencyName` = ? WHERE `returnid` = ?');
        $update->bind_param("sssssssssssssssssssss", $ipaddress, $privateUserIp, $usingProxy, $locationTraced, $continentName, $countryName,
         $countryCapital, $stateName, $cityName, $zipcode, $latitude, $longitude, $callingCode, $countryFlag, 
         $countryTld, $isp, $organization, $geonameId, $currencyCode, $currencyName, $final_returnId);
         $update->execute();
         $update->close();
        }
 
      if (($liedBrowser === 'false' || $liedBrowser == "" || $liedBrowser == null || $liedBrowser === false || $liedBrowser === 'no') && $row4['liedBrowser'] === 'yes') {
        $update2 = $conn->prepare('UPDATE `trackingusers` SET `liedBrowser` = ?, `browserType` = ?, `browserVersion` = ? WHERE `returnid` = ?');
        $update2->bind_param("ssss", $liedBrowser, $browserType, $browserVersion, $final_returnId);
      $update2->execute();
      $update2->close();
    }

    if (($liedLanguages === 'false' || $liedLanguages == "" || $liedLanguages == null || $liedLanguages === 'no' || $liedLanguages === false) && $row4['liedLanguages'] === 'yes') {
      $update3 = $conn->prepare('UPDATE `trackingusers` SET `language` = ?, `liedLanguages` = ? WHERE `returnid` = ?');
      $update3->bind_param("sss", $language , $liedLanguages, $final_returnId);
    $update3->execute();
    $update3->close();
    }

    if (($liedResolution === 'false' || $liedResolution == "" || $liedResolution == null || $liedResolution === 'no' || $liedResolution === false) && ($row4['liedResolution'] === 'yes' || $row4['liedResolution'] !== 'no')) {
      $update4 = $conn->prepare('UPDATE `trackingusers` SET `liedResolution` = ?, `screenResolutionWidth` = ?, `screenResolutionHeight` = ?, 
      `viewPortWidth` = ?, `viewPortHeight` = ? WHERE `returnid` = ?');
      $update4->bind_param("ssssss", $liedResolution, $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $final_returnId);
    $update4->execute();
    $update4->close();
    }

    if (($liedOs === 'false' || $liedOs == "" || $liedOs == null || $liedOs === 'no' || $liedOs === false) && $row4 ['liedOs'] === 'yes') {
      $update5 = $conn->prepare('UPDATE `trackingusers` SET `liedOs` = ?, `operatingSystem` = ?, `osVersion` = ?, `deviceType` = ? WHERE `returnid` = ?');
      $update5->bind_param("sssss", $liedOs, $operatingSystem, $osVersion, $deviceType, $final_returnId);
    $update5->execute();
    $update5->close();
    }

    if ($row4['ipaddress'] === 'no') {
      $update6 = $conn->prepare('UPDATE `trackingusers` SET `ipaddress` = ? WHERE `returnid` = ?');
      $update6->bind_param("ss", $ipaddress, $final_returnId);
    $update6->execute();
    $update6->close();
    }

    if ($row4['privateUserIp'] === 'no') {
      $update6 = $conn->prepare('UPDATE `trackingusers` SET `privateUserIp` = ? WHERE `returnid` = ?');
      $update6->bind_param("ss", $privateUserIp, $final_returnId);
    $update6->execute();
    $update6->close();
    }
  }
  $select4->close();
  mysqli_free_result($result4);
}

  mysqli_free_result($result3);
  $select3->close();
  return true;
} 


private function printHTML() {
  global $conn;
  global $pageId, $final_returnId, $ipaddress, $privateUserIp, $canvas1, $canvas2,
  $webgl, $usingProxy, $locationTraced, $continentName, $countryName, $countryCapital, $stateName, $cityName, 
  $zipcode, $latitude, $longitude, $callingCode, $countryFlag, $countryTld, $isp, $organization, $geonameId, $currencyCode, 
  $currencyName,  $webDriver, $language, $colorDepth, $deviceMemory, $hardwareConcurrency, 
  $screenResolutionWidth, $screenResolutionHeight, $viewPortWidth, $viewPortHeight, $timezoneOffset, $timezone, 
  $sessionStorageSupport, $localStorageSupport, $indexedDbSupport, $addBehaviorSupport, $openDatabaseSupport,
  $cpuClassValue, $plugins, $webglVendor, $adBlock, $liedLanguages, $liedResolution, $liedOs, $liedBrowser,
  $touchSupport, $fonts, $audio, $deviceType, $operatingSystem, $osVersion, $osBit, $browserType, $browserVersion, $isAol, $aolVersion,
  $userAgent, $sessionStorageSet, $localStorageSet, $localforageSet, $superCookiesSet, $everCookiesSet, 
  $sessionsSet, $cookiesSet, $cacheSet;
 
echo '<div class = "sub_page">';

echo '<div class = "unique_div">';
echo '<p class = "heading">Why sabiduria tracker is unique?</p>';
echo '<p class = "sub_head">Detects proxy</p>';
echo '<p>sabiduria tracker detects, wheather the user is using proxy (VPN, TOR etc) or not.</p>';
echo '<p class = "sub_head">Track user behind proxy</p>';
echo '<p>sabiduria tracker uses some complex algorithms to detect the user behind proxy</p>';
echo '<p>Note: Only under some particluar conditions sabiduria tracker detects the user</p>';
echo '<p class = "sub_head">Get private IP</p>';
echo '<p>Sabiduria tracker not only gets the user public IP address but also get the user private IP address</p>';
echo '<p class = "sub_head">Location and device information at one place</p>';
echo '<p>Our websites shows the location and device information at one place.</p>';
echo '</div>';
if ($privateUserIp !== "no" && $privateUserIp !== "") {
  echo '<div class = "privateIP_outer">';
  echo '<div class = "privateIP">';
  echo $privateUserIp;
  echo '</div>';
  echo '<div class = "privateIP_label">';
  echo 'Your private IPs';
  echo '</div>';
  echo '</div>';
}
else {
    
  $select_privateIp = $conn->prepare("SELECT `privateUserIp` FROM `trackingusers` WHERE `returnid` = ?");
  $select_privateIp->bind_param("s", $final_returnId);
  $select_privateIp->execute();
  $result_privateIp = $select_privateIp->get_result();
  if ($result_privateIp->num_rows > 0) {
    $row_privateIp = $result_privateIp->fetch_assoc();
    if (($row_privateIp['privateUserIp'] !== "no" || $row_privateIp['privateUserIp'] !== "") && strlen($row_privateIp['privateUserIp'] > 7)) {
      echo '<div class = "privateIP_outer">';
      echo '<div class = "privateIP">';
      echo $row_privateIp['privateUserIp'];
      echo '</div>';
	  
	    echo '<div class = "privateIP_label">';
  echo 'Your private IP';
  echo '</div>';
  
      echo '</div>';
    }
  }
  mysqli_free_result($result_privateIp);
  $select_privateIp->close();
}

echo '<div class = "ip_doubt">';
echo '<p>Are you confused with <b>public IP address</b> and <b>private IP address</b>? Check out this link 
<a href = "https://www.iplocation.net/public-vs-private-ip-address">Difference between private IP address and public IP address</a></p>';
echo '</div>';

if ($usingProxy === 'yes') {
    echo '<div class = "usingProxy_ack">';
    echo '<p><b>You are using proxy(VPN, TOR etc.,)</b></p>';
    echo '</div>';
}
else {
    if ($GLOBALS['insertedNow'] === 'yes') {
        echo '<div class = "insertedNow_ack">';
        echo '<p>This is the first time you visited this site. Please connect to the proxy(VPN, TOR) to see the unique feature of sabiduria tracker</p>';
        echo '</div>';
    }
    else {
        echo '<div class = "insertedNow_ack">';
        echo '<p>You are not using proxy</p>';
        echo '</p>';
        echo '</div>';
    }
}

if ($locationTraced === "yes") {
  if ($usingProxy === 'yes') {
    echo '<div class = "red_for_location">';
	
	echo '<div class = "fake_location">';
	echo 'FAKE LOCATION';
	echo '</div>';
	
    echo '<div class = "location_inner">';    
    echo '<table class = "location_table">';

    echo '<tr>';
    echo '<th>';
    echo 'Pulbic IP :';
    echo '</th>';
    echo '<td>';
    echo $ipaddress;
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<th>';
    echo 'Continent :';
    echo '</th>';
    echo '<td>';
    echo $continentName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Country :';
    echo '</th>';
    echo '<td>';
    echo $countryName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Capital :';
    echo '</th>';
    echo '<td>';
    echo $countryCapital;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'State :';
    echo '</th>';
    echo '<td>';
    echo $stateName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'City :';
    echo '</th>';
    echo '<td>';
    echo $cityName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'latitude :';
    echo '</th>';
    echo '<td>';
    echo $latitude;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'longitude :';
    echo '</th>';
    echo '<td>';
    echo $longitude;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Calling Code :';
    echo '</th>';
    echo '<td>';
    echo $callingCode;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Flag :';
    echo '</th>';
    echo '<td>';
    $image_src = $countryFlag;
    echo '<img id = "country_img" src = '.$image_src.'>';
    echo '</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<th>';
    echo 'Currency Name :';
    echo '</th>';
    echo '<td>';
    echo $currencyName;
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<th>';
    echo 'Currency Code :';
    echo '</th>';
    echo '<td>';
    echo $currencyCode;
    echo '</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<th>';
    echo 'ISP :';
    echo '</th>';
    echo '<td>';
    echo $isp;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'organization :';
    echo '</th>';
    echo '<td>';
    echo $organization;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'countryTld:';
    echo '</th>';
    echo '<td>';
    echo $countryTld;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Geoname Id :';
    echo '</th>';
    echo '<td>';
    echo $geonameId;
    echo '</td>';
    echo '</tr>';

   echo '</table>';
    echo '</div>';
    echo '</div>';
  }
  else {
    echo '<div class = "location_inner">'; 
    echo '<table class = "location_table">';

    echo '<tr>';
    echo '<th>';
    echo 'Pulbic IP :';
    echo '</th>';
    echo '<td>';
    echo $ipaddress;
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<th>';
    echo 'Continent :';
    echo '</th>';
    echo '<td>';
    echo $continentName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Country :';
    echo '</th>';
    echo '<td>';
    echo $countryName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Capital :';
    echo '</th>';
    echo '<td>';
    echo $countryCapital;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'State :';
    echo '</th>';
    echo '<td>';
    echo $stateName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'City :';
    echo '</th>';
    echo '<td>';
    echo $cityName;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'latitude :';
    echo '</th>';
    echo '<td>';
    echo $latitude;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'longitude :';
    echo '</th>';
    echo '<td>';
    echo $longitude;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Calling Code :';
    echo '</th>';
    echo '<td>';
    echo $callingCode;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Flag :';
    echo '</th>';
    echo '<td>';
    $image_src = $countryFlag;
    echo '<img id = "country_img" src = '.$image_src.'>';
    echo '</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<th>';
    echo 'Currency Name :';
    echo '</th>';
    echo '<td>';
    echo $currencyName;
    echo '</td>';
    echo '</tr>';
    
    echo '<tr>';
    echo '<th>';
    echo 'Currency Code :';
    echo '</th>';
    echo '<td>';
    echo $currencyCode;
    echo '</td>';
    echo '</tr>';


    echo '<tr>';
    echo '<th>';
    echo 'ISP :';
    echo '</th>';
    echo '<td>';
    echo $isp;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'organization :';
    echo '</th>';
    echo '<td>';
    echo $organization;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'countryTld :';
    echo '</th>';
    echo '<td>';
    echo $countryTld;
    echo '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<th>';
    echo 'Geoname Id :';
    echo '</th>';
    echo '<td>';
    echo $geonameId;
    echo '</td>';
    echo '</tr>';

   echo '</table>';
   echo '</div>';
  }
}

if ($usingProxy === 'yes' || $locationTraced !== "yes") { 
  $select = $conn->prepare("SELECT * FROM `trackingusers` WHERE `returnid` = ?");
  $select->bind_param("s", $final_returnId);
  $select->execute();
  $result = $select->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['usingProxy'] === 'no') {
        echo '<div class = "green_for_location">';
	
	echo '<div class = "original_location">';
	echo 'ORIGINAL LOCATION';
	echo '</div>';
	
    echo '<div class = "location_inner location2">';
      echo '<table class = "location_table">';

    echo '<tr>';
    echo '<th>';
    echo 'Pulbic IP :';
    echo '</th>';
    echo '<td>';
    echo $row['ipaddress'];
    echo '</td>';
    echo '</tr>';
    
       echo '<tr>';
       echo '<th>';
       echo 'Continent :';
       echo '</th>';
       echo '<td>';
       echo $row['continentName'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'Country :';
       echo '</th>';
       echo '<td>';
       echo $row['countryName'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'Capital :';
       echo '</th>';
       echo '<td>';
       echo $row['countryCapital'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'State :';
       echo '</th>';
       echo '<td>';
       echo $row['stateName'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'City :';
       echo '</th>';
       echo '<td>';
       echo $row['cityName'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'latitude:';
       echo '</th>';
       echo '<td>';
       echo $row['latitude'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'longitude :';
       echo '</th>';
       echo '<td>';
       echo $row['longitude'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'Calling Code :';
       echo '</th>';
       echo '<td>';
       echo $row['callingCode'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'Flag :';
       echo '</th>';
       echo '<td>';
       $image_src = $row['countryFlag'];
       echo '<img id = "country_img" src = '.$image_src.'>';
       echo '</td>';
       echo '</tr>';


       echo '<tr>';
       echo '<th>';
       echo 'Currency Name :';
       echo '</th>';
       echo '<td>';
       echo $row['currencyName'];
       echo '</td>';
       echo '</tr>';
       
       echo '<tr>';
       echo '<th>';
       echo 'Currency Code :';
       echo '</th>';
       echo '<td>';
       echo $row['currencyCode'];
       echo '</td>';
       echo '</tr>';


       echo '<tr>';
       echo '<th>';
       echo 'ISP:';
       echo '</th>';
       echo '<td>';
       echo $row['isp'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'organization :';
       echo '</th>';
       echo '<td>';
       echo $row['organization'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'countryTld :';
       echo '</th>';
       echo '<td>';
       echo $row['countryTld'];
       echo '</td>';
       echo '</tr>';

       echo '<tr>';
       echo '<th>';
       echo 'Geoname Id :';
       echo '</th>';
       echo '<td>';
       echo $row['geonameId'];
       echo '</td>';
       echo '</tr>';

      echo '</table>';
    echo '</div>';
    echo '</div>';
  }
  }
  mysqli_free_result($result);
  $select->close();
}

echo '<div class = "about_device">';
echo '<table class = "about_device_table">';

echo '<tr>';
echo '<th>';
echo 'User Agent';
echo '</th>';
echo '<td>';
echo $userAgent;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Device';
echo '</th>';
echo '<td>';
echo $deviceType;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'OS';
echo '</th>';
echo '<td>';
echo $operatingSystem;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'OS Version';
echo '</th>';
echo '<td>';
echo $osVersion;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'OS Bit';
echo '</th>';
echo '<td>';
echo $osBit;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Browser';
echo '</th>';
echo '<td>';
echo $browserType;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Browser Version';
echo '</th>';
echo '<td>';
echo $browserVersion;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Resolution';
echo '</th>';
echo '<td>';
echo $screenResolutionWidth."*".$screenResolutionHeight;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'ViewPort';
echo '</th>';
echo '<td>';
echo $viewPortWidth."*".$viewPortHeight;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Timezone';
echo '</th>';
echo '<td>';
echo $timezone;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Timezone Offset';
echo '</th>';
echo '<td>';
echo $timezoneOffset;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Language';
echo '</th>';
echo '<td>';
echo $language;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'AdBlock';
echo '</th>';
echo '<td>';
echo $adBlock;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Fonts';
echo '</th>';
echo '<td>';
if (trim($fonts) == "") {
echo "none";
}
else {
    echo $fonts;
}
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Plugins';
echo '</th>';
echo '<td>';
if ($plugins == "") 
echo 'none';
else 
echo $plugins;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Color Depth';
echo '</th>';
echo '<td>';
echo $colorDepth;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'isAol';
echo '</th>';
echo '<td>';
echo $isAol;
echo '</td>';
echo '</tr>';

if ($isAol !== 'no') {
echo '<tr>';
echo '<th>';
echo 'AOL Version';
echo '</th>';
echo '<td>';
echo $aolVersion;
echo '</td>';
echo '</tr>';
}

echo '<tr>';
echo '<th>';
echo 'webGL';
echo '</th>';
echo '<td>';
echo $webgl;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Webgl Vendor';
echo '</th>';
echo '<td>';
echo $webglVendor;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Canvas';
echo '</th>';
echo '<td>';
if ($canvas1 !== "")
echo $canvas1;
else if ($canvas2 !== "")
echo $canvas2;
else 
echo 'none';
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Audio';
echo '</th>';
echo '<td>';
echo $audio;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Web Driver';
echo '</th>';
echo '<td>';
echo $webDriver;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Device Memory';
echo '</th>';
echo '<td>';
echo $deviceMemory;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Hardware Concurrency';
echo '</th>';
echo '<td>';
echo $hardwareConcurrency;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'cpuClass Value';
echo '</th>';
echo '<td>';
echo $cpuClassValue;
echo '</td>';
echo '</tr>';

echo '</table>';
echo '</div>';

echo '<div class = "info">';
echo '<p>Do you think you are browsing safely in the internet? Sabiduria says, the answer is <b>no</b>. Without your knowledge, your content is tracked by 
 inserting cookies, caches and other scripts. Even it may be the hacker that is accessing your contents.</p>';
 echo '<p>Sabiduria gives the information about the tracking script that your browser or device accepts when you are browsing the internet.</p>';
echo '</div>';

echo '<div class = "user_safety">';
echo '<table class = "user_safety_table">';
echo '<tr>';
echo '<th>';
echo 'Test';
echo '</th>';
echo '<th>';
echo 'Result';
echo '</th>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Is your browser protecting from trackers?';
echo '</td>';
echo '<td class = "right_td">';
$count = 0;
  if ($GLOBALS['total_array']['cookiesSet'] === 'set') {
    $count = $count + 1;
  }
  if ($GLOBALS['total_array']['localStorageSet'] === 'set') {
    $count = $count + 1;
  } 
  if ($GLOBALS['total_array']['cacheSet'] === 'set') {
    $count = $count + 1;
  }
  if ($GLOBALS['total_array']['localforageSet'] === 'set') {
    $count = $count + 1;
  }
  if ($GLOBALS['total_array']['superCookiesSet'] === 'set') {
    $count = $count + 1;
  }
  if ($GLOBALS['total_array']['everCookiesSet'] === 'set') {
    $count = $count + 1;
  }

if ($count >= 2 || $GLOBALS['insertedNow'] === 'yes') { 
  echo '<i class = "wrong"></i>';
}
else {
  echo '<i class = "right"></i>';  
}
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Is your browser blocking tracking ads?';
echo '</td>';
echo '<td class = "right_td">';
if ($count >= 2 || $GLOBALS['insertedNow'] === 'yes') {
  echo '<i class = "wrong"></i>';
}
else {
  echo '<i class = "right"></i>';  
}

echo '<tr>';
echo '<td>';
echo 'Is your browser free from cookies?';
echo '</td>';
echo '<td class = "right_td">';
if (isset($_COOKIE[$pageId])) {
  echo '<i class = "wrong"></i>';
}
else {
  echo '<i class = "right"></i>';  
}
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<td>';
echo 'Does your browser protect from fingerprinting?';
echo '</td>';
echo '<td class = "right_td">';
if (sizeof($_POST['fingerPrintData']) > 6) {
  echo '<i class = "wrong"></i>';
}
else {
  echo '<i class = "right"></i>';  
}
echo '</td>';
echo '</tr>';

echo '</td>';
echo '</tr>';

echo '</table>';
echo '</div>';


echo '<div class = "support_div">';
echo '<table class = "support_table">';
/*
echo '<tr>';
echo '<th>';
echo 'Touch Support';
echo '</th>';
echo '<td>';
echo $touchSupport;
echo '</td>';
echo '</tr>';*/

echo '<tr>';
echo '<th>';
echo 'Session Storage Support';
echo '</th>';
echo '<td>';
echo $sessionStorageSupport;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Local Storage Support';
echo '</th>';
echo '<td>';
echo $localStorageSupport;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'Open Database Support';
echo '</th>';
echo '<td>';
echo $openDatabaseSupport;
echo '</td>';
echo '</tr>';

echo '<tr>';
echo '<th>';
echo 'addBehaviour Support';
echo '</th>';
echo '<td>';
echo $addBehaviorSupport;
echo '</td>';
echo '</tr>';

echo '</table>';
echo '</div>';
echo '</div>';
}


function executeFunctions() {
 if (self::ipLocation()) {
  if (self::checkSessions()) {
    if (self::checkCookies()) {
      if (self::checkCache()) {
        if (self::detectProxy()) {
          if (self::browserInfo()) {
           if (self::detectOSBit()) {
              if (self::setFingerprint()) {
               if (self::checkUserVisit()) {
                  if (self::finalData()) {
                    if (self::enterIntoDatabase()) {
                      self::printHTML();
                    }
                  }
                } 
              }
           }
          }
        }
      }
    }
  }
 }
}
}

$retreiveInfo = new retreiveInfo();
//$retreiveInfo->checkUserVisit();
$retreiveInfo->executeFunctions();
//ob_clean();
?>
</body>
</html>

