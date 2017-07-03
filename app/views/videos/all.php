<?php
if (!$params['videos']) {
  echo '<div class="no-videos">Няма качени видеа</div>';
}
?>

<ul>
  <?php foreach($params['videos'] as $video): ?>
    <li>
      <a href="index.php?q=videos/view/<?php echo $video['videoId']; ?>">
        <h2>Лекция: <?php echo $video['name']; ?></h2>
      </a>
    </li>
  <?php endforeach; ?>
</ul>