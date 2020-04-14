<title><?php echo $title ?></title>
<h2><?php echo $title ?></h2>
<?php echo $SelectedCarId;

foreach ($cars as $car) {
  echo $car['code_name'].'</br>';
}
?>
