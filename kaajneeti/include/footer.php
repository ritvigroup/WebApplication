
<!--BEGIN FOOTER-->
<div class="footer">
	<div class="row">
		<div class="col-md-2 chat">

				  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#chats" aria-controls="home" role="tab" data-toggle="tab" onClick="showMyTabs();">Chats</a></li>
		    <li role="presentation"><a href="#channels" aria-controls="profile" role="tab" data-toggle="tab" onClick="showMyTabs();">Channels</a></li>
		    <li role="presentation"><a href="#contacts" aria-controls="messages" role="tab" data-toggle="tab" onClick="showMyTabs();">Contacts</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content footer-tab-content hide">
		  	<span style="position: absolute;top: 0; right: 10px;" onClick="return hideMyTabs();">X</span>

		    <div role="tabpanel" class="raj tab-pane active" id="chats">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</div>
		    <div role="tabpanel" class="raj tab-pane" id="channels"> Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</div>
		    <div role="tabpanel" class="raj tab-pane" id="contacts">Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip</div>
		    
		  </div>

		</div>
		<div class="col-md-1 pull-right">
        <ul class="nav navbar-nav help">
	        <li class="dropup dropdown-menu-left">
	          <a href="#" class="dropdown-toggle text-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>&#63;</span> Needs Help</a>
	          <ul class="dropdown-menu">
	            <li><a href="#"> <span>Action</span> <i class="fa fa-map-marker"></i></a></li>
	            <li><a href="#"><span>Action</span> <i class="fa fa-map-marker"></i></a></li>
	            <li><a href="#"><span>Action</span> <i class="fa fa-map-marker"></i></a></li>
	            <li><a href="#"><span>Action</span> <i class="fa fa-map-marker"></i></a></li>
	          </ul>
	        </li>
      	</ul>
    </div>
	</div>
	<!-- <div class="col-md-6">
		&nbsp;
	</div> -->
    
    
</div>
<!--END FOOTER-->

<script>
	function hideMyTabs() {
		$('.footer-tab-content').removeClass('').addClass(' hide');
	}

	function showMyTabs() {
		$('.footer-tab-content').removeClass('hide').addClass('');
	}
</script>