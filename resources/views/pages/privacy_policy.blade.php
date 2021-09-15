@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','User Dashboard')

@section('content')
{{-- @dd('ajaaa') --}}

<div class="row">
    <div class="col-8">
         

            <header>
                <div class="main-header header-tablet">
                    <div class="header-box">
                        <img
                            src="{{asset('images/menu-icon.svg')}}"
                            alt="icon"
                            class="mobile-toggle"
                        />
                        <a class="display-none" href="javascript:void(0)" onclick="previousBack()"
                        ><img
                            class="back-arrow dsnone"
                            src="{{asset('images/back-arrow.svg')}}"
                            alt="arrow"
                    /></a>
                    <h1>Privacy Policy</h1>
                    <a href="#"
                        ><img
                            class="plus-icon dsnone"
                            src="{{asset('images/plus-icon.svg')}}"
                            alt="add-icon"
                    /></a>
                </div>
            </div>
        </header>



       
				<section class="privacy-policy vehicles-section add-vahicle mt32 ">
					<div class="container py ">
						
					<div class="privacy-box">
						<h3>Privacy Policy</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
											<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

</p>
						
												
						
						</div>
						
					</div>
				</section>
     


        </div>


        
        @endsection
        @section('right_sidebar_content')
            <div class="rightbox">
                <img src="{{asset('images/rightsidebarimg.png')}}" alt="car"/>
                <h3>Honda Civic</h3>
                <div class="inofsection">
                    <div class="car-detail">
                        <div class="pb1">
                            <img src="{{asset('images/sedan.svg')}}" alt="sedan"/><span
                            >Sedan</span
                            >
                        </div>
                        <div class="pb1">
                            <img
                                src="{{asset('images/cvt-automatic2.svg')}}"
                                alt="sedan"
                            /><span>CVT-Automatic2</span>
                        </div>
                        <div class="pb1">
                            <img src="{{asset('images/runing_icon.svg')}}" alt="sedan"/><span
                            >16000km</span
                            >
                        </div>
                    </div>
                    <div class="price"><p>$2000</p></div>
                </div>

                <div class="statussection">
                    <div>
                        <img src="{{asset('images/time.svg')}}" alt="sedan"/><span
                        >5h15m</span
                        >
                    </div>

                    <p>Active</p>
                </div>
            </div>

        @endsection


        