
<div id="paypalHideShowForm" style="display:none">
    <form action="#" method="post" id="paypal-form">
        @csrf
        <div class="form-group modal-footer">
            <button class="btn btn-dark stripePayment {{empty($artist_billing_info) ? 'disabled no-click' : ''}}" type="button" data-secret="" id="submit-stripe">Paypal {{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}</button>
        </div>
    </form>
</div>
