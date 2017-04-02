<form 
	class="form-horizontal dropzone" 
	id="photoUploadForm"
	action="{{ route('answers.photo') }}" 
	method="POST" 
	enctype="multipart/form-data" 
	>
                      {{ csrf_field() }}
</form>