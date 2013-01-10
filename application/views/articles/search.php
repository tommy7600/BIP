<form method="get">
    <input type="text" name="q"<?php if (isset($query)) echo ' value="' . $query . '"' ?>>
    <button type="submit">Search</button>
</form>
<?php if (isset($articles)): ?>
<hr>
    <?php if (count($articles) > 0): ?>
        <?php foreach ($articles as $article): ?>
            <a href="article/show/<?php echo $article->id ?>"><h2><?php echo $article->current->title->title ?></h2></a>
            <p><?php echo $article->current->content->content ?></p>
        <?php endforeach ?>
    <?php else: ?>
        There are no articles matching the query.
    <?php endif ?>
<?php endif ?>