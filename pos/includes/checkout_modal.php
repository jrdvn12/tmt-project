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
                <form class="form-horizontal" method="POST">
                    <input type="hidden" class="id" name="id">
                    <div class="text-center">
                        <h1><b>Total Amount: ₱ <span id="checkoutTotal">0.00</span></b></h1>
                        <h1><b>Change: ₱ <span id="changeAmount">0.00</span></b></h1>
                        <h2 class="bold fullname"></h2>
                        <h1><b>Enter Amount</b></h1>
                        <input type="text" class="form-control" id="total_amount_gross" name="total_amount_gross" required style="text-align: center; height: 100px; font-size: 80px;" oninput="updateTotalAmount()" onkeypress="return isNumberKey(event)" placeholder="₱ 0.00">
                        <h1><b>Enter Discount</b></h1>
                        <input type="text" class="form-control" id="total_amount_gross" name="total_amount_gross" required style="text-align: center; height: 100px; font-size: 80px;" oninput="updateTotalAmount()" onkeypress="return isNumberKey(event)" placeholder="Discount">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="button" id="proceedBtn" class="btn btn-success btn-flat" name="submit"><i class="fa fa-arrow-right"></i> Proceed</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#check').on('shown.bs.modal', function () {
        $('#changeAmount').text('0.00');
        $('#total_amount_gross').val('0.00');
        $('#proceedBtn').prop('disabled', true);
    });

    $('#proceedBtn').click(function(event) {
        var changeAmount = parseFloat($('#changeAmount').text());
        if (changeAmount >= 0) {
            $('#check').modal('hide');
        } else {
            alert("Change amount cannot be negative. Please enter a valid amount.");
        }
    });

    $('#total_amount_gross').on('input', function() {
        updateTotalAmount();
    });
});

function updateTotalAmount() {
    var enteredAmount = parseFloat($('#total_amount_gross').val().replace('₱', '').trim());
    var totalAmount = parseFloat($('#checkoutTotal').text());

    if (isNaN(enteredAmount)) {
        $('#proceedBtn').prop('disabled', true);
        $('#changeAmount').text('0.00');
        return;
    }

    var change = enteredAmount - totalAmount;
    if (enteredAmount < totalAmount) {
        $('#changeAmount').text('0.00'); // Set change to 0 if entered amount is less than total
        $('#proceedBtn').prop('disabled', true); // Disable Proceed button
    } else {
        $('#changeAmount').text(change.toFixed(2));
        $('#proceedBtn').prop('disabled', false); // Enable Proceed button
    }
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode == 8 || charCode == 46 || (charCode >= 48 && charCode <= 57)) {
        return true;
    } else {
        evt.preventDefault();
        return false;
    }
}
</script>
