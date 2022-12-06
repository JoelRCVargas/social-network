@extends('dashboard.app')
@section('content-dashboard')
<div class="container">
<form>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Postear algo</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Postear</button>
</form>
</div>
@endsection