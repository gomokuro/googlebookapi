<form class="row g-3 mb-3">
  <div class="col-auto">
    <label for="inputPassword2" class="visually-hidden">Password</label>
    <input type="text" name="word" id="search-word" class="form-control">
  </div>
  <div class="col-auto">
    <input type="submit" value="Search" id="book-search-btn" class="btn btn-primary mb-3">
  </div>
</form>
<div id="search-word-area">
<?= $this->element('search_word_area',['searchHistories'=>$searchHistories]);?>
</div>
<div id="result-area">

</div>