<h2>Create a news item</h2>
<?php echo validation_errors();?>
<?php echo form_open('news/create')?>
<label for="title">Title：<input type="text" name="title"/></label>
<br/><br>
<label for="text">Text：<textarea name="text"></textarea></label>
<br/>
<input type="submit" name="submit" value="Create news item"/>
</form>