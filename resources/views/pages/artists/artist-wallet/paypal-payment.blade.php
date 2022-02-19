
<div id="paypalHideShowForm" style="display:none">
    <form action="{{ url('process-transaction') }}" method="post" id="paypal-form">
        @csrf
        <input type="hidden" name="transaction_user_id" value="{{isset($artist_billing_info) ? $artist_billing_info->id : ''}}">
        <input type="hidden" id="total_amount_paypal" class="amount_paypal" name="total_amount_paypal" value="{{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}">
        <input type="hidden" id="currency_paypal" name="currency_paypal" value="{{!empty($purchase_data['currency']) ? $purchase_data['currency'] : ''}}">
        <input type="hidden" id="contacts" name="contacts" value="{{!empty($purchase_data['contacts']) ? $purchase_data['contacts'] : ''}}">
        <input type="hidden" id="package_name" name="package_name" value="{{!empty($purchase_data['package']) ? $purchase_data['package'] : ''}}">
        <div class="form-group modal-footer">
            <button class="btn btn-dark paypalPayment {{empty($artist_billing_info) ? 'disabled no-click' : ''}}" type="button" data-secret="" id="submit-paypal">Paypal {{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}</button>
        </div>
    </form>
</div>
