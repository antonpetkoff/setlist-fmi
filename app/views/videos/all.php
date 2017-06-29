<?php foreach($params['videos'] as $video): ?>
  <a href="index.php?q=videos/view/<?php echo $video['id']; ?>">
    <h2><?php echo $video['name']; ?></h2>
  </a>
	<p><?php echo $video['url']; ?></p>
<?php endforeach; ?>
