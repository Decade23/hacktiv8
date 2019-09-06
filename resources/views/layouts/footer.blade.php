{{-- ganti warna footer disini --}}
<footer class="page-footer footer footer-static footer-dark purple gradient-shadow navbar-border navbar-shadow">
  <div class="footer-copyright">
    <div class="container"><span>&copy; 2019          <a href="#" target="_blank">Thiara</a> All rights reserved.</span><span class="right hide-on-small-only">Design and Developed by <a href="#">Thiara</a></span></div>
  </div>
</footer>

 <!-- Modal Trigger -->
  {{-- <a class="waves-effect waves-light btn modal-trigger" href="#hapus">Modal</a> --}}
  <!-- Modal Structure -->
  <div id="hapus" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<!-- Remove Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-sm" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title custom_align text-danger" id="titles"><i class="fa fa-warning"></i> Attention</h4>
            </div>
            <form action="" method="post" id="remove-form">
                {!! csrf_field() !!}

                <input name="_method" type="hidden" id="method" value="DELETE">

                <div class="remove-form-list"></div>

                <div class="modal-body">
                    <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                        <i class="fa fa-info pr10"></i>
                        <span id="message"></span>
                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn ladda-button btn-success btn-sm send-request" data-style="zoom-in">
                        <span class="ladda-label"><span class="fa fa-check"></span> @lang('global.yes')</span>
                        <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span></button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> @lang('global.no')</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




