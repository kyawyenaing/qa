<!-- Modal -->
<div id="" class="fade modal">
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
        <input type="hidden" name="question_id" value="<?=$id?>">
        <input type="hidden" name="answer_id" value="<?= $ans?>">
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

<div class="modal" id="exampleModal" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
       <h4 class="modal-title">အသိပေးချက်</h4>
     </div>
     <div class="modal-body">
       <b class="text-danger">ယခုအိမ်ခန်းကို ဖျက်ပစ်မည် သေချာပါသလား? </b>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">မဖျက်ပါ</button>
       <button type="button" class="btn btn-danger" id="confirm">ဖျက်ပစ်မည် သေချာပါသည်</button>
     </div>
   </div>
 </div>
</div>


<script type="text/javascript">
     $(document).ready(function(){
       $('#exampleModal').on('show.bs.modal', function (e) {
             $message = $(e.relatedTarget).attr('data-message');
             $(this).find('.modal-body p').text($message);
             $title = $(e.relatedTarget).attr('data-title');
             $(this).find('.modal-title').text($title);

             var form = $(e.relatedTarget).closest('form');
             $(this).find('.modal-footer #confirm').data('form', form);
         });  

         $('#exampleModal').find('.modal-footer #confirm').on('click', function(){
             $(this).data('form').submit();
         });

         // 
         function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;
           var originalContents = document.body.innerHTML;

           document.body.innerHTML = printContents;

           window.print();

           document.body.innerHTML = originalContents;
         }
     });
</script>