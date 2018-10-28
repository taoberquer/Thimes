<?php

$RssSources = $dbh->query('SELECT * FROM RSSSources')->fetchAll(PDO::FETCH_ASSOC);

foreach ($RssSources as $RssSource) {
    $rss = Feed::loadRss($RssSource['website']);

    foreach ($rss->item as $item) {
        $checkExistArticle = $dbh->prepare('SELECT * FROM Articles WHERE link = :link LIMIT 1');
        $checkExistArticle->bindValue(':link', $item->link, PDO::PARAM_STR);
        $checkExistArticle->execute();

        if (!$checkExistArticle->fetch()) {
            $addArticle = $dbh->prepare('
                INSERT INTO `Articles` (`title`, `preview`, `date`, `link`, `rssSourceId`) 
                VALUES (:title, :preview, :date, :link, :rssSourceId)
            ');

            $addArticle->bindValue(':title', $item->title, PDO::PARAM_STR);
            $addArticle->bindValue(':preview', $item->description, PDO::PARAM_STR);
            $addArticle->bindValue(':date', date('Y-m-d H:i:s', (int)$item->timestamp), PDO::PARAM_STR);
            $addArticle->bindValue(':link', $item->link, PDO::PARAM_STR);
            $addArticle->bindValue(':rssSourceId', $RssSource['id'], PDO::PARAM_INT);

            $addArticle->execute();
        }
    }
}