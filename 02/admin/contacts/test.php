<?php
include_once 'contacts.php';

// Test getContacts function
$allContacts = getContacts();
var_dump($allContacts);

// Test getContactById function
$contactById = getContactById('1'); // Use the appropriate ID
var_dump($contactById);

// Test addContact function
$newContact = [
    'name' => 'Alice Johnson',
    'email' => 'alice.johnson@example.com',
    'phone' => '+1122334455',
    'bio' => 'Alice Johnson is a real estate professional with a focus on urban properties.'
];
addContact($newContact);

// Test updateContact function
$updatedContact = [
    'bio' => 'Updated bio for Alice Johnson.'
];
updateContactByName('Alice Johnson', $updatedContact);

// Test deleteContact function
deleteContactByName('John Doe'); // Use the appropriate name

// Display updated contact list
$updatedContacts = getContacts();
var_dump($updatedContacts);
?>
