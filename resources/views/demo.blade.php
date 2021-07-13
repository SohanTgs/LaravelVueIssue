<form action="{{ route('sohan') }}" method="post">
	@csrf
	<input type="text" name="name">
	<input type="submit" name="submit" value="submit">
</form>