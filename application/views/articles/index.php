<?php foreach ($articles as $article): ?>
<div class="well">
<h2>
    <a href="articles/show/<?php echo $article->id ?>"><?php echo $article->current->title->title ?></a>
</h2>
    <div>
        <?php echo HTMLComponents::anchorDependingOnRole('articles', 'edit', array($article->id), $userRoles, '<i class="icon icon-pencil"></i>'); ?>
        <?php echo HTMLComponents::anchorDependingOnRole('articles', 'remove', array($article->id), $userRoles, '<i class="icon icon-trash"></i>'); ?>
    </div>
<p><?php echo $article->current->content->content ?></p>
</div>
<?php endforeach ?>