<!-- Delete Modal -->
<div id="delete_modal" class="modal">
    <form action="" id="deleteForm" method="post">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="modal-content">
            <h4>Are you sure?</h4>
            <p>Do you really want to delete?</p>
            <p>Do you want to proceed?</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat"
               data-dismiss="modal">Cancel</a>
            <a class="modal-action modal-close waves-effect waves-green btn-flat" onclick="formSubmit()">Delete</a>
        </div>
    </form>
</div>

{{-- Start View Vehicle--}}
<div id="viewVehicles" class="modal">
    <div class="modal-content">
        <!-- users view card data start -->
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m4">
                        <h6 class="mb-5 mt-2"><i class="material-icons">error_outline</i> Vehicle Info</h6>
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Brand Name:</td>
                                <td id="vehicle_brand"></td>
                            </tr>
                            <tr>
                                <td>Mileage:</td>
                                <td id="vehicle_mileage"></td>
                            </tr>
                            <tr>
                                <td>Condition(out of 10):</td>
                                <td id="vehicle_condition"></td>
                            </tr>
                            <tr>
                                <td>Category Name:</td>
                                <td id="vehicle_category_name"></td>
                            </tr>
                            <tr>
                                <td>Min Price:</td>
                                <td id="vehicle_min_price"></td>
                            </tr>
                            <tr>
                                <td>Is:</td>
                                <td>
                                    <span class="chip green lighten-5 green-text">Approved</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 m8">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Specifications:</td>
                                <td id="vehicle_specifications"></td>
                            </tr>
                            <tr>
                                <td>tags:</td>
                                <td>
                                    <div class="btn-toolbar" id="vehicle_tags" role="toolbar" aria-label="Programmatic control"></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row indigo lighten-5 border-radius-4 mb-2">
                    <div class="col s12 m4 users-view-timeline">
                        <h6 class="indigo-text m-0">Vehicles Images: </h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 mt-1" id="vehicle_image"></div>
                </div>
            </div>
        </div>
        <!-- users view card data ends -->
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>
{{-- End View Vehicle--}}

{{-- Start View Bidder--}}
<div id="viewBidder" class="modal">
    <div class="modal-content">
        <!-- users view card data start -->
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m6">
                        <h6 class="mb-5 mt-2"><i class="material-icons">error_outline</i> Bidder Info</h6>
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td id="bidder_name"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td id="bidder_email"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td id="bidder_address"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 m6">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Phone Number:</td>
                                <td id="bidder_phone_number"></td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td id="bidder_status"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- users view card data ends -->
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>
{{-- Start View Bidder--}}

{{-- Start View System User--}}
<div id="viewSystemUser" class="modal">
    <div class="modal-content">
        <!-- users view card data start -->
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m6">
                        <h6 class="mb-5 mt-2"><i class="material-icons">error_outline</i> System User Info</h6>
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Name:</td>
                                <td id="system_user_name"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td id="system_user_email"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td id="system_user_address"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 m6">
                        <table class="striped">
                            <tbody>
                            <tr>
                                <td>Phone Number:</td>
                                <td id="system_user_phone_number"></td>
                            </tr>
                            <tr>
                                <td>Type:</td>
                                <td id="system_user_type"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- users view card data ends -->
    </div>
    <div class="modal-footer">
        <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
</div>
{{-- Start View System User--}}
