<?php foreach ($articles as $article): ?>
<a href="article/show/<?php echo $article->id ?>"><h2><?php echo $article->current->title->title ?></h2></a>
<?php echo HTMLComponents::anchorDependingOnRole('articles', 'edit', array($article->id), $userRoles, 'Edit'); ?>
<?php echo HTMLComponents::anchorDependingOnRole('articles', 'remove', array($article->id), $userRoles, 'Remove'); ?>
<p><?php echo $article->current->content->content ?></p>
<?php endforeach ?>