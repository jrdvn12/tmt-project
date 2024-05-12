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
              <button type="submit" id="proceedBtn" class="btn btn-success btn-flat" name="submit" ><i class="fa fa-arrow-right"></i> Proceed</button>
            </div>
        </div>
    </div>
</div>

<script>
    
$(document).ready(function() {
    $('#check').on('shown.bs.modal', function () {
        $('#changeAmount').text('0.00');
        $('#total_amount_gross').val('0.00');
    });

    $('#proceedBtn').click(function(event) {

        //event.preventDefault(); // Prevent default form submission

        var changechecker = document.getElementById('changeAmount').innerText;
        if (changechecker > 0){
            $('#check').modal('hide');
        }
        else {
            $('#changeAmount').text('0.00');
            $('#check').modal('hide');
            $('#receiptTableBody').empty();
            $('#searchInput').val('');
            $('#searchInput').focus();
       
            calculateTotal();
            showConsoleLogMessage("Exceeding stock<br>Available Stock for this Items<br>");
        }
        
        
    });

});

function updateTotalAmount() {
    $('#total_amount_gross').focus();
    // Get the value entered by the user
    var amount = parseFloat(document.getElementById('total_amount_gross').value.replace('₱', '').trim());
    
    // Get the total amount
    var totalAmount = parseFloat(document.getElementById('checkoutTotal').innerText);
    if(totalAmount == 0){
        var change = isNaN(amount) ? 0.00 : totalAmount -  amount;
    
    // Update the total amount display
    document.getElementById('changeAmount').innerText = change.toFixed(2);

    }else{
    // Calculate the change
    var change = isNaN(amount) ? 0.00 : amount - totalAmount;
    
    // Update the total amount display
    document.getElementById('changeAmount').innerText = change.toFixed(2);
}
}


function isNumberKey(evt) {
    if (event.keyCode === 13) {
        // Trigger click event on the "Proceed" button
      
       document.getElementById("proceedBtn").click();
        $('#changeAmount').text('0.00');
        $('#check').modal('hide');
        $('#receiptTableBody').empty();
        $('#searchInput').val('');
        $('#searchInput').focus();
       
        calculateTotal();
        //window.location.reload();
        return false; // Prevent form submission 
  
            
            showConsoleLogMessage("Exceeding stock<br>Available Stock for this Items<br>");
        
    }
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
   

}
</script>
