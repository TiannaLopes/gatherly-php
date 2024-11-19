// src/Controller/RegistrationsController.php
namespace App\Controller;

use App\Utility\GoogleSheets;
use Cake\Http\Exception\BadRequestException;

class RegistrationsController extends AppController
{
public function register()
{
// Display registration form
}

public function submit()
{
if ($this->request->is('post')) {
$name = $this->request->getData('name');
$email = $this->request->getData('email');
$eventId = 'Event123'; // Static for now

$spreadsheetId = $this->getConfig('GoogleSheets.spreadsheetId');
$googleSheets = new GoogleSheets($spreadsheetId);
$range = 'Sheet1!A2:C2';

$values = [[$name, $email, $eventId]];
$googleSheets->writeToSheet($range, $values);

$this->Flash->success(__('Thank you for registering!'));
return $this->redirect(['action' => 'register']);
} else {
throw new BadRequestException(__('Invalid request'));
}
}
}