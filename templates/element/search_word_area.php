<?php if(!empty($searchHistories)):?>
<div class="mb-3">
    <?php foreach($searchHistories as $his):?>
        <a href="" class="btn btn-secondary btn-word m-1" data-word="<?=h($his->search_word)?>"><?=h($his->search_word)?></a>
    <?php endforeach;?>
</div>
<?php endif;?>