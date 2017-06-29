<?php foreach($params['videos'] as $video): ?>
	<h2><?php echo $video['name']; ?></h2>
	<p><?php echo $video['url']; ?></p>
<?php endforeach; ?>
