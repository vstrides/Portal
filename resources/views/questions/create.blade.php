@extends('layouts.app')
@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" />
@endsection
@section('content')
	         
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
               		@include('partials.qform')
               </div>
            </div>
   
@endsection
@section('foot')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
  	$(document).ready(function () {
        let data = {
          photoPaths: []
        };

        var app = new Vue({
          el: '#root',
          data: data
        });

   			tinymce.init({
		        selector: 'textarea',
		        theme: 'modern',
          	plugins: [
            		'advlist link image lists spellchecker wordcount code media textcolor'
          		],
          	content_css: 'css/content.css',
          	toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor | code',
            menubar : ''
		    });
  		
        $('#sel2').select2({
    			placeholder: "Select Tags",
    			maximumSelectionLength: 5,
          width: '100%',
    		});
      
        Dropzone.options.photoUploadForm = {
          paramName: 'photo',
          maxFilesize: 3,
          acceptedFiles: '.jpg, .jpeg, .png, .bmp',
          dictDefaultMessage: 'Drop images to upload',
          init: function() {
            this.on("success", function(file, response) { 
                data.photoPaths.push(response);
            });
          }
        };

    		$('#sel1').select2({
    			placeholder: "Categorize Question",
    			allowClear: true,
          width: '100%',
    		});
});
 </script>
@endsection