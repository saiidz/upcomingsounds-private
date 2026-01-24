<div class="modal fade" id="rateModal{{$offer->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background: #121212; color: #ffffff; border: 1px solid #282828; border-radius: 16px;">
            
            <div class="modal-header border-0 p-4 pb-0">
                <h5 class="modal-title font-weight-bold">Rate Feedback Experience</h5>
                <button type="button" class="close text-white" data-dismiss="modal" style="opacity: 0.7;">
                    <span>&times;</span>
                </button>
            </div>

            <form action="{{ route('artist.submit-rating') }}" method="POST">
                @csrf
                <input type="hidden" name="offer_id" value="{{ $offer->id }}">

                <div class="modal-body p-4">
                    <p class="text-muted small mb-4">How helpful was the curator's feedback for your track?</p>

                    <div class="form-group mb-4">
                        <label class="small font-weight-bold" style="color: #02b875;">STAR RATING</label>
                        <select name="rating_stars" class="form-control" required style="background: #1a1a1a; border: 1px solid #333; color: white;">
                            <option value="5">⭐⭐⭐⭐⭐ - Exceptional</option>
                            <option value="4">⭐⭐⭐⭐ - Good</option>
                            <option value="3">⭐⭐⭐ - Average</option>
                            <option value="2">⭐⭐ - Poor</option>
                            <option value="1">⭐ - Unhelpful</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold" style="color: #02b875;">PUBLIC REVIEW</label>
                        <textarea name="artist_feedback" class="form-control" rows="4" 
                            placeholder="Briefly describe your experience..." 
                            style="background: #1a1a1a; border: 1px solid #333; color: white; resize: none;"></textarea>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="submit" class="btn btn-success btn-block font-weight-bold" 
                        style="background: #02b875; border: none; height: 45px;">
                        Submit Rating
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
