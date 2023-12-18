
  <?php
  if (isset($_POST['classID'])) {
      $classID = $_POST['classID'];

      // Use $classID as needed

      echo "Selected classID: " . $classID;
  } else {
      echo "classID not set";
  }
?>
