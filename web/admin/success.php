<?php
// Process the form data here

// Get the URL of the previous page and redirect back to that page
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: index.php?page=home"); // Set a default page to redirect to if the HTTP_REFERER is not present
}
exit;
?>
