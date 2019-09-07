{{-- ganti warna footer disini --}}
<footer class="page-footer footer footer-static footer-dark purple gradient-shadow navbar-border navbar-shadow">
  <div class="footer-copyright">
    <div class="container"><span>&copy; 2019          <a href="#" target="_blank">Thiara</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="#">Thiara</a></span></div>
  </div>
</footer>

<!-- Modal Trigger -->
{{-- <a class="waves-effect waves-light btn modal-trigger" href="#hapus">Modal</a> --}}

<!-- Modal Hapus -->
<div id="hapus" class="modal">
<div class="modal-content">
  <h4>Perhatian</h4>
  <p>Anda yakin akan menghapus data ini ? <br /><small><code>tindakan ini tidak dapat di ulang kembali.</code></small></p>
</div>
<form action="" method="POST" id="delete-form">
	{!! csrf_field() !!}
	{{method_field('DELETE')}}

	<input type="hidden" name="id" id="id" value="">
	<div class="modal-footer">
		<a href="#" class="modal-action modal-close waves-effect waves-green btn-flat" style="color: red;">Tidak</a>
		{{-- <button class="modal-close waves-effect waves-green btn-flat" style="color: red;">Tidak</button> --}}
		<button type="submit" class="modal-close waves-effect waves-green btn-flat">Ya!</button>
	  {{-- <a href="#" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a> --}}
	</div>	
</form>
</div>

<!-- Modal View Image-->
<div id="view_image" class="modal">
	<div class="modal-content">
	  <h4 id="view_title"></h4>
	  <img src="" alt="" id="imgView" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100%; height:50%; cursor:pointer;">
	</div>
</div>



