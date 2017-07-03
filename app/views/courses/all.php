<ul>
  <?php foreach($params['courses'] as $course): ?>
    <li>
      <a href="index.php?q=videos/add&courseId=<?php echo $course['id']; ?>">
        <h2>Курс: <?php echo $course['title']; ?></h2>
      </a>
      <p><?php echo $course['description']; ?></p>
    </li>
  <?php endforeach; ?>
</ul>
