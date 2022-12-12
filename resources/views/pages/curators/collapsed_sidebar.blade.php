@if(!empty($campaign))
    <div id="mySidebarCollapsed" class="sidebarCollapsed">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav({{$campaign->id}})">×</a>
       <div class="collapsed_list">
           <div class="row">
               <div class="col-xs-12">
                  <div class="startCollapse">
                      <div class="d-flex justify-content-between align-items-center">
                          <h3>{{ !empty($campaign->artistTrack) ? $campaign->artistTrack->name : '----'}}</h3>
                          <a href="javascript:void(0)" class="btn-favorite">
                              {{--                           <i class="far fa-heart text-danger icon-size" aria-hidden="true"></i>--}}
                              <i class="fa fa-heart-o"></i>
                          </a>
                      </div>
                      <div class="item-except text-md text-white">
                          <p>
                              {{ !empty($campaign->artistTrack) ? $campaign->artistTrack->description : '-----'}}
                          </p>
                      </div>
                      <div class="row" id="camArtTraLink">
                          @if(count($campaign->artistTrack->artistTrackLinks) > 0)
                              @foreach($campaign->artistTrack->artistTrackLinks as $link)
                                  @if(!empty($link->link))
                                      <div class="col-sm-12" id="camArtLinks">
                                          @php
                                              echo $link->link;
                                          @endphp
                                      </div>
                                  @endif
                              @endforeach
                          @endif
                      </div>
                      <div class="item-info-tag m-t-2">
                          @if(!empty($campaign->artistTrack->artistTrackTags))
                              <div class="item-action">
                                  <div>
                                      @foreach($campaign->artistTrack->artistTrackTags as $tag)
                                          <span class="btn btn-xs white campaignTag">{{$tag->curatorFeatureTag->name}}</span>
                                      @endforeach
                                  </div>
                              </div>
                          @endif
                      </div>
                      <div class="campaignBtn">
                          <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn">
                              <i class="fa fa-wrench"></i></a>
                          <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn">
                              Decline</a>
                          <a href="javascript:void(0)" class="btn btn-sm rounded campaign_btn basicbtn">
                              Save</a>
                      </div>
                  </div>
               </div>
           </div>
       </div>
    </div>
@endif
