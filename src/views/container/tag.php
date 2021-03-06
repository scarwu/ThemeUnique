<?php
use Oni\Web\Helper;

$baseUrl = $systemConfig['blog']['baseUrl'];

// Paging
$paging = $container['paging'];
$prevButton = isset($paging['prevUrl'])
    ? Helper::linkTo("{$baseUrl}{$paging['prevUrl']}", "<< {$paging['prevTitle']}") : '';
$nextButton = isset($paging['nextUrl'])
    ? Helper::linkTo("{$baseUrl}{$paging['nextUrl']}", "{$paging['nextTitle']} >>") : '';
$indicator = "{$paging['currentIndex']} / {$paging['totalIndex']}";
?>
<div id="container_tag">
    <article class="post_block">
        <h1 class="title"><?=$container['title']?></h1>
        <div class="list">
            <?php foreach ($container['list'] as $article): ?>
            <section>
                <h1><?=Helper::linkTo("{$baseUrl}article/{$article['url']}", $article['title'])?></h1>
                <span>
                    <i class="fa fa-calendar"></i>
                    <?=Helper::linkTo("{$baseUrl}archive/{$article['year']}/", $article['date'])?>
                </span>
                <span>
                    <i class="fa fa-folder"></i>
                    <?=Helper::linkTo("{$baseUrl}category/{$article['category']}/", $article['category'])?>
                </span>
                <span>
                    <i class="fa fa-tag"></i>
                    <?=join(', ', array_map(function ($tag) use ($baseUrl) {
                        return Helper::linkTo("{$baseUrl}tag/{$tag}/", $tag);
                    }, $article['tags']))?>
                </span>
            </section>
            <?php endforeach; ?>
        </div>
    </article>

    <div id="paging">
        <span class="new"><?=$prevButton?></span>
        <span class="old"><?=$nextButton?></span>
        <span class="count"><?=$indicator?></span>
    </div>
</div>