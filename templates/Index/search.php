
<?php if(!empty($searchDatetime)):?>
<p>
    検索日時 : <?=$searchDatetime?>
</p>
<?php endif;?>
<?php foreach($books as $book):?>
<div class="row p-2 mb-5 border-bottom">
    <div class="col-12 col-sm-3 col-md-2"><img src="<?=$book->volumeInfo->imageLinks->thumbnail?>"></div>
    <div class="col">
        <h2><a href="<?=$book->volumeInfo->infoLink?>" target="blank"><?=$book->volumeInfo->title?></a></h2>
        <div>
        <?php foreach($book->volumeInfo->authors as $author):?>
            <span class="m-2"><?=$author?></span>
        <?php endforeach;?>
        </div>
        <?php if(!empty($book->volumeInfo->description)):?>
        <div class="mt-2">
            <?=$book->volumeInfo->description?>
        </div>
        <?php endif;?>
    </div>
</div>
<?php endforeach;?>

