<!-- Full screen modal -->
<div class="modal fade detail-modal" id="detail-modal" tabindex="-1" aria-labelledby="DetailModal" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
    <form action="buy.php" method="POST" >      
    <div class="modal-header">
        <h5 class="modal-title" id="itemtitle">Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input type="text" class="form-control" name="productid" id="productid" readonly>
        <img src="" alt="" width="100%" id="productimage">
        <h3 class="productname mt-2 fw-bold" name="productname" id="productname"></h3>
        <h5 id="productprice" name="productprice"></h5>
        <p class="productdetails" id="productdetails"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        <button type="submit" class="btn btn-primary ">Rent Now</button>
        </form>
      </div>
    </div>
</div> 

</div>