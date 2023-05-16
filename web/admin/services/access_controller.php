<?php 
    require_once "../connection/connection.php";
  // Start the session
  if(isset($_SESSION['type'])) {
    $user_type = $_SESSION['type'];
  }
  // Check if the user is logged in
  if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    // If the user is not logged in, redirect them to the login page
    header('Location: ../login-user.php');
    exit();
  }

  define('BASE_PATH', 'http://localhost/NewShit/admin/services/');
?>

<?php if (isset($_SESSION['type'])): ?>
    <?php if ($_SESSION['type'] == 1): ?>
        
    <?php elseif ($_SESSION['type'] == 2): ?>
        
    <?php elseif ($_SESSION['type'] == 3): ?>
        
    <?php endif; ?>
<?php endif; ?>