<?php
  echo password_hash('oui', PASSWORD_ARGON2I);
  if (isset($_POST['ok'])) var_dump($_POST);
  $timezone_identifiers = DateTimeZone::listIdentifiers();

foreach($timezone_identifiers as $key => $list){

echo $list . "<br/>";

}
?>

<form method="post" action="">
  <input type="text" name="i[tu_coco]">
  <button name="ok">ok</button>
</form>