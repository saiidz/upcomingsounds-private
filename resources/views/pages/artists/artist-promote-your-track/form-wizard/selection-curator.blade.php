<div id="selectionMainDiv">
    <div id="selectionInnerDiv">
{{--        <div class="infoPanel progressivePromosInfoPanel tw-top-0 tw-left-0 tw-z-10 md:tw-sticky">--}}
{{--            <div class="tw-w-full lg:tw-flex lg:tw-space-x-6">--}}
{{--                <div class="tw-text-center lg:tw-flex lg:tw-w-4/12 lg:tw-flex-col lg:tw-text-left"><span class="text tw-mb-2 tw-block">--}}
{{--          Benefit from our welcome offer, up to 20% discount--}}
{{--          </span> <span class="text tw-mb-5 tw-block lg:tw-mb-0">Available for a limited time,<br>valid on your first campaign only</span>--}}
{{--                </div>--}}
{{--                <div class="infoPanelCellsContainer tw--mx-6 tw-flex tw-items-center tw-space-x-4 tw-overflow-x-auto tw-text-center sm:tw--mx-8 md:tw--mx-10 md:tw-space-x-6 lg:tw-w-8/12">--}}
{{--                    <!---->--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x15&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -5%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x40&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -10%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x80&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -15%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <div class="infoPanelCell tw-rounded-sm tw-border tw-border-solid tw-border-white">--}}
{{--                        <div class="tw-flex tw-items-baseline tw-justify-center"><span class="text tw-mb-1 tw-inline-block">--}}
{{--                x150&nbsp;--}}
{{--                </span> <i class="fas fa-user-friends tw-text-white md:tw-text-base"></i> <span class="text tw-mb-1 tw-inline-block">--}}
{{--                &nbsp;= -20%--}}
{{--                </span>--}}
{{--                        </div>--}}
{{--                        <span class="text tw-block">--}}
{{--             on your selection--}}
{{--             </span>--}}
{{--                    </div>--}}
{{--                    <!---->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="title__container">
            <div class="separatortrack">
                <h4>{{ !empty($curators) ? $curators->count() : '' }} curators & pros recommended for you</h4>
{{--                <p class="text-muted">A tailor-made selection based on the information you shared with us</p>--}}
                {{-- <div class="separator"></div> --}}
            </div>
        </div>

        {{-- curator selected--}}
        <div class="page-content">
            <div class="row-col">
                <div class="col-lg-9 b-r no-border-md">
                    <div class="padding">
                        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                    autoTrigger: true,
                    loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                    padding: 50,
                    nextSelector: 'a.jscroll-next:last'
                }">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-3">
                                    <div class="item r" data-id="item-100" data-src="http://localhost:8001/uploads/audio/default_1683229746testmp3.mp3">
                                        <div class="item-media">
                                            <a href="javascript:void(0)" class="item-media-content" onclick="openNav(33)" style="background-image: url(http://localhost:8001/uploads/track_thumbnail/default_1683229746Payfast-logo.png);"></a>

                                            <div class="item-overlay center">
                                                <button class="btn-playpause">Play</button>
                                            </div>
                                        </div>
                                        <div class="item-info" style="position: relative !important;padding: 10px 0 20px 0 !important;border-radius: inherit !important;">
                                            <div class="item-overlay bottom text-right" style="bottom: 100% !important;">
                                                <a href="javascript:void(0)" class="btn-favorite" onclick="favoriteTrack(100,'SAVE')">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                                <a href="#" class="btn-more" data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu pull-right black lt"></div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)" onclick="openNav(33)">Keiko Schroeder (farhanartist)</a>
                                            </div>
                                            <div class="item-author text-ellipsis">
                                                <span class="text-muted">Release Date: 04 May 2023</span>
                                            </div>
                                            <div class="item-author text-ellipsis">
                                                <div class="clearfix m-b-sm">
                                                    <img class="flag_icon" src="http://localhost:8001/images/flags/AI.png" alt="AI">
                                                    <span class="text-muted" style="font-size:15px">Anguilla</span>
                                                </div>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis">
                                                <a href="javascript:void(0)" class="text-muted">Premium</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- curator selected--}}
    </div>

    <div class="buttons">
        <a class="m-b-md rounded addTrack nxt__btn" onclick="prevSelectedCuratorForm();"> Back</a>
        <a class="m-b-md rounded addTrack nxt__btn" onclick="nextForm('step_three');"> Next</a>
    </div>

</div>
