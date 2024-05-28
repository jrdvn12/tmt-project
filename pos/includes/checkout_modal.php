<!-- Check Out -->
<div class="modal fade" id="check" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Check Out</b></h4>
            </div>
            <div class="modal-body">
                <!-- <form class="form-horizontal" method="POST" action="reciept_generate.php"> -->
                <form class="form-horizontal" method="POST">
                    <input type="hidden" class="id" name="id">
                    
                    <div class="text-center">
                        <h1><b>Total Amount: ₱ <span name="changeAmount" id="checkoutTotal">0.00</span></b></h1>
                        <h1><b>Change: ₱ <span name="changeAmount" id="changeAmount">0.00</span></b></h1> <!-- Added this line -->
                        <h2 class="bold fullname"></h2>
                        <h1><b>Enter Amount</b></h1>
                        <input type="text" class="form-control" id="total_amount_gross" name="total_amount_gross" required style="text-align: center; height: 100px;font-size: 80px;" oninput="updateTotalAmount()" onkeypress="return isNumberKey(event)" placeholder="₱ 0.00">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="button" id="proceedBtn" class="btn btn-success btn-flat" name="submit" ><i class="fa fa-arrow-right"></i> Proceed</button>
            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#check').on('shown.bs.modal', function () {
        $('#changeAmount').text('0.00');
        $('#total_amount_gross').val('0.00');
        $('#proceedBtn').prop('disabled', true); // Disable the button initially
    });

    $('#proceedBtn').click(function(event) {
        var changeAmount = parseFloat($('#changeAmount').text());
        if (changeAmount >= 0) {
            var enteredAmount = parseFloat($('#total_amount_gross').val().replace('₱', '').trim());
            var totalAmount = parseFloat($('#checkoutTotal').text());
            if (enteredAmount >= totalAmount) {
                $('#check').modal('hide');
            } else {
                // Show an alert if the entered amount is lower than the total amount
                alert("Entered amount is lower than the total amount. Please enter a valid amount.");
            }
        } else {
            // Show a message or handle the case when change is negative
            // For example:
            alert("Change amount cannot be negative. Please enter a valid amount.");
        }
    });

    $('#total_amount_gross').on('input', function() {
        var enteredAmount = parseFloat($(this).val().replace('₱', '').trim());
        var totalAmount = parseFloat($('#checkoutTotal').text());
        if (enteredAmount < totalAmount) {
            $('#proceedBtn').prop('disabled', true); // Disable the button
        } else {
            $('#proceedBtn').prop('disabled', false); // Enable the button
        }
        updateTotalAmount(); // Update the change amount
    });

    $('#cancelBtn').click(function() {
        // Clear the form and prevent the modal from closing
        $('#total_amount_gross').val('0.00');
        $('#changeAmount').text('0.00');
        $('#proceedBtn').prop('disabled', true); // Disable the button
        return false;
    });

});

function updateTotalAmount() {
    $('#total_amount_gross').focus();
    var amount = parseFloat($('#total_amount_gross').val().replace('₱', '').trim());
    var totalAmount = parseFloat($('#checkoutTotal').text());
    var change = isNaN(amount) ? 0.00 : amount - totalAmount;
    $('#changeAmount').text(change.toFixed(2));

    // Check if the entered amount is lower than the total amount and disable the button accordingly
    if (amount < totalAmount) {
        $('#proceedBtn').prop('disabled', true); // Disable the button
    } else {
        $('#proceedBtn').prop('disabled', false); // Enable the button
    }
}

function isNumberKey(evt) {
    if (event.keyCode === 13) {
        document.getElementById("proceedBtn").click();
        return false; // Prevent form submission 
    }
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>
