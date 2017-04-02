<div class="modal fade" id="{{ $answer->id }}commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
	<div class="widget-area no-padding blank">
		<div class="status-upload">
			<form class="form-horizontal" role="form" action="{{ route('answers.comment', $answer->id)}}" method="POST">  <!-- /answers/{{$answer->id}}/comment -->
				{{ csrf_field() }}
				<textarea class="form-control" name="body"></textarea>
				<ul>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="fa fa-music"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class="fa fa-video-camera"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Sound Record"><i class="fa fa-microphone"></i></a></li>
					<li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="fa fa-picture-o"></i></a></li>
				</ul>
				<button type="submit" class="btn btn-success green"><i class="fa fa-comment"></i> Post a Comment</button>
			</form>
		</div>
	</div>
  </div>
</div>