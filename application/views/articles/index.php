<?php foreach ($articles as $article): ?>
<a href="article/show/<?php echo $article->id ?>"><h2><?php echo $article->current->title->title ?></h2></a>
<p><?php echo $article->current->content->content ?></p>
<?php endforeach ?>