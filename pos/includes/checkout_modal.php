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
    // Function to initialize the modal
    $('#check').on('shown.bs.modal', function () {
        $('#changeAmount').text('0.00');
        $('#total_amount_gross').val('0.00');
        $('#proceedBtn').prop('disabled', true); // Disable the button initially
    });

    // Proceed button click event
    $('#proceedBtn').click(function(event) {
        var changeAmount = parseFloat($('#changeAmount').text());
        if (changeAmount >= 0) {
            $('#check').modal('hide');
        } else {
            alert("Change amount cannot be negative. Please enter a valid amount.");
        }
    });

    // Input event on the total amount input field
    $('#total_amount_gross').on('input', function() {
        var enteredAmount = parseFloat($(this).val().replace('₱', '').trim());
        var totalAmount = parseFloat($('#checkoutTotal').text());

        // Check if the input is a valid number
        if (isNaN(enteredAmount)) {
            $('#proceedBtn').prop('disabled', true); // Disable the button if the input is not a number
            return;
        }

        // Calculate and display the change amount
        var change = enteredAmount - totalAmount;
        $('#changeAmount').text(change.toFixed(2));

        // Enable or disable the "Proceed" button based on the entered amount
        if (enteredAmount < totalAmount) {
            $('#proceedBtn').prop('disabled', true); // Disable the button if the entered amount is lower than the total amount

            if (!$(this).data('lower-amount-alert-shown')) {
                alert("Entered amount is lower than the total amount. Please enter a valid amount.");
                $(this).val($(this).data('prev-amount')); // Revert back to the previous amount
                $(this).data('lower-amount-alert-shown', true); // Set the flag to indicate the alert has been shown
            }
        } else {
            $('#proceedBtn').prop('disabled', false); // Enable the button if the entered amount is higher or equal to the total amount
            $(this).data('prev-amount', enteredAmount); // Save the current amount as previous amount
            $(this).data('lower-amount-alert-shown', false); // Reset the flag for lower amount alert
        }
    });

    // Cancel button click event
    $('#cancelBtn').click(function() {
        // Clear the form and prevent the modal from closing
        $('#total_amount_gross').val('0.00');
        $('#changeAmount').text('0.00');
        $('#proceedBtn').prop('disabled', true); // Disable the button
        return false;
    });

});


function updateTotalAmount() {
    var amount = parseFloat($('#total_amount_gross').val().replace('₱', '').trim());
    var totalAmount = parseFloat($('#checkoutTotal').text());

    // Check if the input is a valid number
    if (isNaN(amount)) {
        $('#proceedBtn').prop('disabled', true); // Disable Proceed button if the input is not a number
        $('#changeAmount').text('0.00'); // Reset change amount to 0 if input is not a number
        return;
    }

    // Enable Proceed button for any valid number
    $('#proceedBtn').prop('disabled', false);

    // Calculate and display the change amount
    var change = amount - totalAmount;
    $('#changeAmount').text(change.toFixed(2));

    // Check if entered amount is lower than the total amount and show alert
    if (amount < totalAmount) {
        alert("Entered amount is lower than the total amount. Please enter a valid amount.");
    }
}

$('#proceedBtn').click(function(event) {
    var changeAmount = parseFloat($('#changeAmount').text());
    if (changeAmount >= 0) {
        $('#check').modal('hide');
    } else {
        // Show a message or handle the case when change is negative
        // For example:
        alert("Change amount cannot be negative. Please enter a valid amount.");
    }
});

$('#total_amount_gross').on('input', function() {
    updateTotalAmount();
});


function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    
    // Allow digits, backspace, and delete keys
    if (charCode == 8 || charCode == 46 || (charCode >= 48 && charCode <= 57)) {
        return true;
    } else {
        // Prevent input of non-numeric characters
        evt.preventDefault();
        return false;
    }
}


</script>
