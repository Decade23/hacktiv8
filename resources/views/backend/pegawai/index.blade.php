@extends('layouts.index')

@section('content')
<div class="row">
<form class="col s12">
  <div class="row">
    
    <div class="input-field col s6">
      <input placeholder="type nip here ..." id="nip" type="text" class="validate">
      <label for="nip">NIP</label>
    </div>
  	
  	<div class="input-field col s6">
      <input id="name" name="name" type="text" class="validate">
      <label for="name">Nama</label>
    </div>

    <div class="input-field col s6">
      <input id="birth" name="birth" type="text" class="validate">
      <label for="birth">Tempat Lahir</label>
   </div>

  </div>
</form>
</div>
  
@endsection