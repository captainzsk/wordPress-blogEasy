<channel>
	<title><?php echo BLOG_TITLE; ?></title>
	<atom:link href="<?php echo URL_BLOG; ?>feed.rss2" rel="self" type="application/rss+xml" />
	<link><?php echo URL_BLOG; ?></link>
	<description><?php echo BLOG_SUB_TITLE; ?></description>
	<lastBuildDate><?php echo date(DATE_RFC2822); ?></lastBuildDate>
	<language>zh-CN</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator><?php echo URL_BLOG; ?></generator>
  
  <?php foreach($articles as $article): ?>
	<item>
		<title><?php echo $article['post_title']; ?></title>
		<link><?php echo URL_BLOG.'blogHtml/'.$article['id'].'.html'; ?></link>
		<comments></comments>
		<pubDate><?php echo date(DATE_RFC2822); ?></pubDate>
		<dc:creator><![CDATA[<?php echo BLOG_TITLE; ?>]]></dc:creator>
    
		<category><![CDATA[<?php echo $article['category']; ?>]]></category>
    <?php foreach($article['post_tag'] as $tag): ?>
		<category><![CDATA[<?php echo $tag; ?>]]></category>
    <?php endforeach; ?>
    
		<guid isPermaLink="false"><?php echo URL_BLOG.$article['id'].'.html'; ?></guid>
		<description><![CDATA[<?php echo $article['post_content']; ?>]]></description>
    <content:encoded><![CDATA[<?php echo $article['post_content']; ?>]]></content:encoded>
		<wfw:commentRss></wfw:commentRss>
		<slash:comments>0</slash:comments>
	</item>
<?php endforeach; ?>

</channel>
</rss>