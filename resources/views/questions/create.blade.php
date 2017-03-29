@extends('layouts.app')
@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
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
<script type="text/javascript">
  		$(document).ready(function () {
   			tinymce.init({
		selector: 'textarea',
		theme: 'modern',
    	width: 650,
    	height: 200,
    	plugins: [
      		'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      		'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media ','save table contextmenu directionality emoticons template paste textcolor'
    		],
    	content_css: 'css/content.css',
    	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
		});
  		$('#sel2').select2({
  			placeholder: "Select Tags",
  			maximumSelectionLength: 5
  		});
  		$('#sel1').select2({
  			placeholder: "Categorize Question",
  			allowClear: true,
  		});
});
 </script>
@endsection