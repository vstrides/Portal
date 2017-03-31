<form 
	class="form-horizontal dropzone" 
	id="photoUploadForm"
	action="/questions/photos" 
	method="POST" 
	enctype="multipart/form-data" 
	>
                      {{ csrf_field() }}
</form>