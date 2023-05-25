/*
 * Plugin Name:       Chatbot Plugin
 * Plugin URI:        
 * Description:       Chats about  neuroscience using an AI
 * Version:           1.0
 * Requires at least: 
 * Requires PHP:      7.2
 * Authors:           Clemence Millord, Charles Bretton, Liam Flandrinck
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       chatbot-plugin
 * Domain Path:       /languages
 */

 $subscriptionKey = 'ENTER KEY HERE';

$host = "https://api.bing.microsoft.com";
$path = "/v7.0/search";

$mkt = "en-US";
$query = "italian restaurants near me";

function search ($host, $path, $key, $mkt, $query) {

	$params = '?mkt=' . $mkt . '&q=' . urlencode ($query);

	$headers = "Ocp-Apim-Subscription-Key: $key\r\n";

	// NOTE: Use the key 'http' even if you are making an HTTPS request. See:
	// https://php.net/manual/en/function.stream-context-create.php
	$options = array (
		'http' => array (
			'header' => $headers,
			'method' => 'GET'
		)
	);
	$context  = stream_context_create ($options);
	$result = file_get_contents ($host . $path . $params, false, $context);
	return $result;
}

$result = search ($host, $path, $subscriptionKey, $mkt, $query);

echo json_encode (json_decode ($result), JSON_PRETTY_PRINT);
?>