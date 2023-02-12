<!-- Offer Decline Modal -->
<div id="declineOffer" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Decline Offer send To {{!empty($send_offer->userCurator) ? $send_offer->userCurator->name : ''}}</h5>
            </div>
            <form class="new_basicform_approved_with_reload" action="{{route('artist.offer.decline',)}}" method="post">
                @csrf
                <input type="hidden" name="send_offer_id" class="sendOfferID" value="{{!empty($send_offer) ? encrypt($send_offer->id) : ''}}">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">{{\App\Templates\IMessageTemplates::DECLINE_MESSAGE_ONE}}</h6>
                            </div>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_1}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_1}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_2}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_2}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_3}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_3}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_4}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_4}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value=""/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_5}}</span>
                                </label>
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">{{\App\Templates\IMessageTemplates::DECLINE_MESSAGE}}</h6>
                            </div>
                            <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm rounded add_track">Send</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Offer Decline Modal -->

<!-- Offer Free Alternative Modal -->
<div id="freeAlternativeOffer" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose Free Alternative</h5>
            </div>
            <form class="new_basicform_approved_with_reload" action="" method="post">
                @csrf
                <input type="hidden" name="send_offer_id" class="sendOfferID" value="{{!empty($send_offer) ? encrypt($send_offer->id) : ''}}">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">{{\App\Templates\IMessageTemplates::FREE_ALTERNATIVE_MESSAGE}}</h6>
                            </div>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_1}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_1}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_2}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_2}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_3}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_3}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value="{{\App\Templates\IMessageTemplates::DECLINE_4}}"/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_4}}</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input type="radio" class="releasedSoon" name="offer_check" value=""/>
                                    <span>{{\App\Templates\IMessageTemplates::DECLINE_5}}</span>
                                </label>
                            </p>
                        </div>
                        <div class="form-group">
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">{{\App\Templates\IMessageTemplates::DECLINE_MESSAGE}}</h6>
                            </div>
                            <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm rounded add_track">Send</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Offer Free Alternative Modal -->
