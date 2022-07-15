<div class="infoPanel progressivePromosInfoPanel tw-top-0 tw-left-0 tw-z-10 md:tw-sticky">
    <div class="tw-w-full lg:tw-flex lg:tw-space-x-6">
       <div class="tw-text-center lg:tw-flex lg:tw-w-4/12 lg:tw-flex-col lg:tw-text-left"><span class="text tw-mb-2 tw-block">
          Benefit from our welcome offer, up to 20% discount
          </span> <span class="text tw-mb-5 tw-block lg:tw-mb-0">Available for a limited time,<br>valid on your first campaign only</span>
       </div>
       <div class="infoPanelCellsContainer tw--mx-6 tw-flex tw-items-center tw-space-x-4 tw-overflow-x-auto tw-text-center sm:tw--mx-8 md:tw--mx-10 md:tw-space-x-6 lg:tw-w-8/12">
          <!---->
          <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">
             <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">
                x15&nbsp;
                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">
                &nbsp;= -5%
                </span>
             </div>
             <span class="text tw-block">
             on your selection
             </span>
          </div>
          <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">
             <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">
                x40&nbsp;
                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">
                &nbsp;= -10%
                </span>
             </div>
             <span class="text tw-block">
             on your selection
             </span>
          </div>
          <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">
             <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">
                x80&nbsp;
                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">
                &nbsp;= -15%
                </span>
             </div>
             <span class="text tw-block">
             on your selection
             </span>
          </div>
          <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">
             <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">
                x150&nbsp;
                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">
                &nbsp;= -20%
                </span>
             </div>
             <span class="text tw-block">
             on your selection
             </span>
          </div>
          <!---->
       </div>
    </div>
 </div>
 <div class="title__container">
    <div class="separatortrack">
        <h4>{{ !empty($curators) ? $curators->count() : '' }} curators & pros recommended for you</h4>
        <p class="text-muted">A tailor-made selection based on the information you shared with us</p>
        {{-- <div class="separator"></div> --}}
    </div>
</div>

<div class="buttons">
    <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm('step_three');"> Next</a>
</div>
