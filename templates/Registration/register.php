<!-- templates/Registrations/register.php -->
<h1>Register for the Event</h1>
<?= $this->Form->create(null, ['url' => ['action' => 'submit']]) ?>
<?= $this->Form->control('name', ['label' => 'Name', 'required' => true]) ?>
<?= $this->Form->control('email', ['label' => 'Email', 'required' => true]) ?>
<?= $this->Form->button(__('Register')) ?>
<?= $this->Form->end() ?>