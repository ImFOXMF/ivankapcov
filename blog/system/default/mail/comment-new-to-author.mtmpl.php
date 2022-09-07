<?= $content['comment-text'] ?> 
	<?= $content['commenter'] ?><?php if (array_key_exists ('commenter-email', $content) and !empty ($content['commenter-email'])) { ?> <<?= $content['commenter-email'] ?>><?php } ?> 
	<?= _S ('em--reply') ?>: <?= $content['reply-href'] ?> 

<?= $content['comment-href'] ?> 


<?= _S ('em--created-automatically') ?>