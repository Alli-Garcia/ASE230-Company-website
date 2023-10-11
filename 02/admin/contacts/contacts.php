<?php
// Function to get a specific contact by name
function getContactByName($name) {
    $contacts = getContacts();

    foreach ($contacts as $contact) {
        if ($contact['name'] == $name) {
            return $contact;
        }
    }

    return null; // Contact not found
}

// Function to update an existing contact by name
function updateContactByName($name, $updatedContact) {
    $contacts = getContacts();

    // Find the index of the contact to be updated
    $index = findContactIndexByName($contacts, $name);

    if ($index !== null) {
        // Update the contact
        $contacts[$index] = array_merge($contacts[$index], $updatedContact);

        // Update the JSON file
        updateJsonFile($contacts);
        return true;
    }

    return false; // Contact not found
}

// Function to delete a contact by name
function deleteContactByName($name) {
    $contacts = getContacts();

    // Find the index of the contact to be deleted
    $index = findContactIndexByName($contacts, $name);

    if ($index !== null) {
        // Remove the contact from the array
        array_splice($contacts, $index, 1);

        // Update the JSON file
        updateJsonFile($contacts);
        return true;
    }

    return false; // Contact not found
}

// Function to find the index of a contact in the array by name
function findContactIndexByName($contacts, $name) {
    foreach ($contacts as $index => $contact) {
        if ($contact['name'] == $name) {
            return $index;
        }
    }

    return null; // Contact not found
}

?>
