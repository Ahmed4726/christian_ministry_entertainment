<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AViTj5A9wW_ISpJFQX9e-3fN45nBHc-nKWxwR4QJ-9_UMFUPNkLgjq9AxSlG5CUYqfhIXTzXbuI4QbPw"></script>
    <!-- Include the Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div class="container">
    <select class="custom-select rounded-0" name="role" id="userRole">
        <option value="member">Member</option>
        <option value="vendor">Vendor</option>
    </select>
</div>

<div class="modal fade" id="membershipModal" tabindex="-1" role="dialog" aria-labelledby="membershipModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="membershipModalLabel">Purchase Membership</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Membership Plan: $50</h4>
                <p>Unlock premium features with our membership plan. Choose your preferred payment method below:</p>

                <!-- PayPal payment button -->
                <div id="paypal-button-container">
                    <!-- This container will be filled with the PayPal button -->
                </div>

                <!-- Stripe payment button -->
                <form id="stripe-payment-form">
                    <!-- Add a div for displaying error messages -->
                    <div id="card-errors" role="alert"></div>
                    <br>
                    <div id="card-element" class="form-control"></div>
                    <button style="margin-top: 20px; width: 100%;padding: 7px;" class="btn btn-success mt-3" type="button" id='pay-btn' onclick="createMockPayment()">Pay Now $50</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Stripe (Note: Use your actual Stripe public key)
    var stripe = Stripe('pk_test_51NgPtkKdYlphuvuh9AC1gHS0ftwuJdVuye5yal96JOy6QCrB4FzbeW3fp0SIzWDKeIiitSZqwDQ2Ml19itQ4W8Xu00Dv1UD6pj');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    function createMockPayment() {
        document.getElementById("pay-btn").disabled = true;

        // Simulate a successful payment for demonstration purposes
        setTimeout(function() {
            Swal.fire({
                icon: 'success',
                title: 'Payment Successful',
                text: 'Thank you for your payment!',
            });
            $('#membershipModal').modal('hide');
            document.getElementById("pay-btn").disabled = false;
        }, 2000);
    }

    // Listen for changes in the role dropdown
    document.getElementById('userRole').addEventListener('change', function () {
        if (this.value === 'vendor') {
            // Show the membership modal
            $('#membershipModal').modal('show');
            // Disable the PayPal button
            document.getElementById("paypal-button-container").style.display = "none";
        } else {
            // Enable the PayPal button
            document.getElementById("paypal-button-container").style.display = "block";
        }
    });
</script>
</body>
</html>
