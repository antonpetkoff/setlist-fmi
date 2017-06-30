<ul>
  <?php foreach($params['videos'] as $video): ?>
    <li>
      <a href="index.php?q=videos/view/<?php echo $video['id']; ?>">
        <h2>Лекция: <?php echo $video['name']; ?></h2>
      </a>
    </li>
  <?php endforeach; ?>
</ul>