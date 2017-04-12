<!-- Modal -->
<div class="modal fade" id="bioModal" tabindex="-1" role="dialog" aria-labelledby="bioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" id="bioLabel" style="font-size: 20px;">
        Please write something about yourself
        </span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <textarea class="form-control" rows="5" id="bio" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" @click="updateBio({{ $profile->id }})" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>