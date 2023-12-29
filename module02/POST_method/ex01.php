<form method="post" action="">
  <input type="text" name="name" placeholder="Enter your name">
  <br />
  <input type="text" name="age" placeholder="Enter your age">
  <br />
  <button type="submit" value="Submit">Gửi</button>
</form>

<?php
if (isset($_POST)) {
  echo "Hello, " . $_POST['name'] . " - " . $_POST['age'];
} else {
  echo "Hello, World";
}
?>