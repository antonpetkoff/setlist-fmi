<h2>Име на курса: <?php echo $params['course']['title']; ?></h2>
<h3>Преподавател: <?php echo $params['course']['lecturer']; ?></h3>
<p>Описание: <?php echo $params['course']['description']; ?></p>

<a class="button" href="index.php?q=videos/add&courseId=<?php echo $params['course']['id']; ?>">
  Добави лекция
</a>

<a class="button" href="index.php?q=videos/all&courseId=<?php echo $params['course']['id']; ?>">
  Гледай лекции
</a>
