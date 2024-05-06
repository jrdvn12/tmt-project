
<!-- Check Out -->
<div class="modal fade" id="check">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Check Out</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="#">
                    <input type="hidden" class="id" name="id">
                    
                    <div class="text-center">
                        <h1><b>Total Amount: ₱ <span id="checkoutTotal">0.00</span></b></h1>
                        <h2 class="bold fullname"></h2>
                        <h1><b>Enter Amount</b></h1>
                        <input type="text" class="form-control" id="amount" name="amount" required style="text-align: center; height: 100px;font-size: 80px;">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="delete"><i class="fa fa-arrow-right"></i> Proceed</button>
              </form>
            </div>
        </div>
    </div>
</div>

<script>
function calculateTotal() {
    var receiptItems = document.querySelectorAll("#receiptContent .total-price");
    var total = 0;
    for (var i = 0; i < receiptItems.length; i++) {
        var price = parseFloat(receiptItems[i].textContent.split("₱")[1]); // Extract price from each item
        total += price;
    }
    // Display the total amount in the totalDisplay div
    var totalDisplay = document.getElementById("totalDisplay");
    totalDisplay.textContent = "Total: ₱" + total.toFixed(2);
    
    var checkoutTotal = document.getElementById("checkoutTotal");
    checkoutTotal.textContent =  total.toFixed(2);
    
}

</script>
