<h2>Вие гледате лекция: <?php echo $params['video']['name']; ?></h2>
<div>Курс: <?php echo $params['video']['title']; ?></div>
<div>Лектор: <?php echo $params['video']['lecturer']; ?></div>
<div>Описание на лекцията: <?php echo $params['video']['description']; ?></div>
<video controls src="<?php echo $params['video']['url']; ?>" width="640" height="480"></video>
