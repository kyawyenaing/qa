<!-- Modal -->
<div id="exampleModal" class="fade modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Header -->
      <div class="modal-header">
        <h3 class="modal-title">Write a reply !</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Body -->
      <div class="modal-body">
        <form class="form-horizontal" action="comment.php" method="post">
        <input type="hidden" name="question_id" value="">
        <input type="hidden" name="answer_id" value="">
        <input type="hidden" name="user_id" value="1">
          <textarea rows="10" cols="50" class="form-control" name="body"></textarea>
          <!-- Footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="get">Save changes</button>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->