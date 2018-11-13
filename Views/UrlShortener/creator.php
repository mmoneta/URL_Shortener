<form id="add-form"  onsubmit="return send('add');">
  <div class="form-group text-center">
    <input type="text" class="form-control" pattern="https?://.+" name="link" placeholder="Enter link" required />
  </div>
  <div class="form-group text-center">
    <input type="submit" class="btn btn-primary mb-2" value="Shorten" />
  </div>
</form>