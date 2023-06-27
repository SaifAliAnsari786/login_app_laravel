
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block" id="flash-message">
	<button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#flash-message').fadeOut('slow');
        }, 2000); // 1 second (1000 milliseconds) delay before fading out
    });
</script>

