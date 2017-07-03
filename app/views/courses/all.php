<?php foreach($params['courses'] as $course): ?>
     <h2><?php echo $course['title']; ?></h2>
     <p><?php echo $course['description']; ?></p>
<?php endforeach; ?>
