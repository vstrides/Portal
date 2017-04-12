<div class="profile clearfix">
   <div class="profile_pic">
    	<img src="{{ Auth::user()->profile->photo->path }}" alt="..." class="img-circle profile_img">
   </div>
	<div class="profile_info">
 	   <span>Welcome,</span>
       <h2>{{ Auth::user()->username }}</h2>
  	</div>
</div>