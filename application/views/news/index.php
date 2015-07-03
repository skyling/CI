<a href="/index.php/news/create">添加新闻</a>
<?php foreach($news as $news_item): ?>
    <h2><?php echo $news_item['title'] ?></h2>
    <div class="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p> <a href="http://<?php echo $_SERVER['HTTP_HOST']?>/index.php/news/<?php echo $news_item['slug']?>">View Detail</a> </p>
<?php endforeach ?>