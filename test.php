<?php
  echo password_hash('oui', PASSWORD_ARGON2I);
  if (isset($_POST['ok'])) var_dump($_POST);
  echo date("Y-m-d H:i:s");
?>

<form method="post" action="">
  <input type="text" name="i[tu_coco]">
  <button name="ok">ok</button>
</form>