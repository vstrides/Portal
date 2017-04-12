<!-- Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="radioFormLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title" id="radioFormLabel" style="font-size: 20px;">Choose Status</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-primary">
            <input type="radio" name="gender" id="option1" autocomplete="off" value="student">Student
          </label>
          <label class="btn btn-primary">
            <input type="radio" name="gender" id="option2" autocomplete="off" value="faculty">Faculty
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" @click="updateStatus({{ $profile->id }})" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div>