<title><?= $title; ?></title>

        <?php foreach($settings as $setting) : ?>
<?php echo $setting['name']." Value".$setting['value']; ?>
        <?php endforeach; ?>
