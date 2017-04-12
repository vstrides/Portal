<!-- Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
        <form 
          class="form-horizontal dropzone" 
          id="photoUploadForm"
          action="{{ route('profile.photo', $profile->id) }}" 
          method="POST"
          enctype="multipart/form-data" 
          >
              {{ csrf_field() }}
        </form>
      
    </div>
  </div>
</div>