// src/Utility/GoogleSheets.php
namespace App\Utility;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheets
{
private $service;
private $spreadsheetId;

public function __construct($spreadsheetId)
{
$client = new Client();
$client->setApplicationName('Event Registration App');
$client->setScopes([Sheets::SPREADSHEETS]);
$client->setAuthConfig(CONFIG . 'credentials.json'); // Assuming your JSON is in config/
$client->setAccessType('offline');

$this->service = new Sheets($client);
$this->spreadsheetId = $spreadsheetId;
}

public function readSheet($range)
{
$response = $this->service->spreadsheets_values->get($this->spreadsheetId, $range);
return $response->getValues();
}

public function writeToSheet($range, $values)
{
$body = new Sheets\ValueRange(['values' => $values]);
$params = ['valueInputOption' => 'RAW'];
$this->service->spreadsheets_values->update($this->spreadsheetId, $range, $body, $params);
}
}