<?php
$articles = $dbh->query('SELECT * FROM Articles')->fetchAll();
?>
<div class="container">
<div class="row">
<div class="col-md-8">
<h1 class="my-4">Liste des articles</h1>
<?php foreach ($articles as $article) {?>
<div class="card mb-4">
<div class="card-body">
<h2 class="card-title"><?php echo $article['title']; ?></h2>
<p class="card-text"><?php echo $article['preview']; ?></p>
<a href="<?php echo $article['link']; ?>" class="btn btn-primary">Voir plus</a>
</div>
<div class="card-footer text-muted">
Date : <?php echo $article['date']; ?>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
