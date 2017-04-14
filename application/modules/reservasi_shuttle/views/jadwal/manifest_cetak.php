<style>

.modal {
    display: none;
    overflow: hidden;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    -webkit-overflow-scrolling: touch;
    outline: 0;
    background: rgba(0, 0, 0, 0.15) !important;
}
.modal-body {
    position: absolute;

}

.modal-manifest{
  width: 500px;
  height: 600px;
  top: 50px;
  left:10px;
  bottom:0;
}
.close {
    margin-top: -8px;
    text-shadow: 0 1px 0 #ffffff;
    color:purple;
}
</style>
<!-- //////////////////////////////////////////////////// Varying Modal -->

<div class="modal fade in" id="slide-bottom-popup" data-keyboard="false" data-backdrop="static">
  <div >
    <div class="modal-content">
      <div class="modal-body modal-manifest"  style="background-color:#FFF;">
      <div style="margin-bottom:20px;" >
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-close"></i></span><span class="sr-only">Close</span></button>
        <h4>MANIFEST TRIP</h4>
        <hr>
        <div id="trip-data">

        </div>
      </div>
      </div><!-- /.modal-body -->
    </div>
  </div>
</div><!-- /.modal -->
