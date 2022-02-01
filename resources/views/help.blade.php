{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Help')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/faqs.css')}}">
    <style>

    </style>
@endsection
 
{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <div class="row-col amber h-v">
            <div class="row-cell v-m">
                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
                    <h1 class="display-3 m-y-lg">Help</h1>
                </div>
            </div>
        </div>
        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
            <ul class="cd-faq__categories">
                <li><a class="cd-faq__category cd-faq__category-selected truncate" href="#basics">Account</a></li>
                <li><a class="cd-faq__category truncate" href="#mobile"> USC "credits"</a></li>
                <li><a class="cd-faq__category truncate" href="#account"> Curators / Pro's</a></li>
                <li><a class="cd-faq__category truncate" href="#payments">Payments</a></li>
                <li><a class="cd-faq__category truncate" href="#privacy">Privacy</a></li>
                <li><a class="cd-faq__category truncate" href="#delivery">Delivery</a></li>
            </ul>
            <div class="cd-faq__items">
                <ul id="basics" class="cd-faq__group">
                    <li class="cd-faq__title"><h2>Manage My  Account</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I change my password?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">You might have signed up through Google, Twitter, or Facebook?. If that doesn't work, Try using the password reset option in the log-in via this link :  <a  " href="https://upcomingsounds.com/forgot-password ">https://upcomingsounds.com/forgot-password. </p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span> Can I edit or replace my profile photo after signing up? </span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">After you finish signing up you will have full access to Dashboard to change any info on your profile. You can edit and replace your profile photo, country, bio, and even genres.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>I do not receive a verification code when signing up as a Curator / Tastemaker. What should I do?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Some countries aren't available due to some legal requirements.  If you are not sure about your country! you can contact our support for more info.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I deactivate my account?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">You will be able to deactivate your account settings from your Dashboard. You can find it on the bottom of the left panel. </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul id="mobile" class="cd-faq__group">
                    <li class="cd-faq__title"><h2> UpcomingSounds Coin "USC" </h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>What is USC,  how does it works?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">What is USC,  how does it works? 

USC is the official coin for UpcomingSounds. It's for all the submissions, campaigns, and in-house transactions. 
You can even send it to other accounts via an email address registered on our database.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>What is the actual value for USC?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Each UCS is equal to £1. You need at least 2 UCS for the standard fee for "Non-verified" Tastemakers / Curators / Professionals.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I link to a file or folder?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul id="account" class="cd-faq__group">
                    <li class="cd-faq__title"><h2>Joining UpcomingSoundns for Curators, Influencers, tastemakers, and Labels</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I sign up as a curator, influencer, or label?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Follow this link for more to apply : <a  " href="https://upcomingsounds.com/forgot-password ">Upcomingsounds/apply.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Can I ask for money or charge for coverage on my platform?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">We have a strict policy toward blogs, channels, and labels asking for payment from artists in return for guaranteed coverage. Payola
is illegal. We ask that you follow our rules and guidelines. (note that calling it a "donation" will still fall afoul of our policy) Otherwise, actions will be taken to terminate any accounts will violation reports. </p>
                            </div>
                        </div>
                    </li>
                    </div>
                 
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Why use UpcomingSounds?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted"> One tool for all, We've combined all of your submissions into one easy-to-use Dashboard, UpcomingSounds is your one source for New Music.

Our platform enables tastemakers, curators, and professionals from around the world to discover new music, connect, share their favorite tunes and find out about cool events. Follow this link for more:  <a  " href="https://upcomingsounds.com/for-curators ">https://upcomingsounds.com/for-curators. </p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>What kind of curator or influencer can apply on UpcomingSounds?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">What kind of curator or influencer can apply on UpcomingSounds?
We accept all the following categories: Influencers (Instagram- TikTok- Soundcloud), PlaylistCurators (Apple-Deezer- Spotify), Channels (youtube), Radio or TV channel, Records Labels, Managers, Music supervisors, Blogs, Mentors, Publishers, Sync Administrative, Journalist, Media, Booking Agents, Sounds Experts (engineers), Producers (music, video).</p>
                            </div>
                        </div>
                    </li>
                </ul>
 
                </ul>
                <ul id="payments" class="cd-faq__group">
                    <li class="cd-faq__title"><h2>Payments</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Is UpcomingSounds a safe and secure website for payment?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Yes, UpcomingSounds is a safe and secure website, We have partnered with stripe for sucre payments and privacy protection.
for more detailed info you can visit: https://stripe.com/gb/privacy-center/legal .</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Can I use  PayPal for payment?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Unfortunately, we can't accept PayPal payments Yet! due to the small country coverage but you can your PayPal card to pay on Upcomingsounds.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How can I pay?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">You can use APPLE PAY  or GOOGLE PAY. We also accept Visa, Mastercard, American Express, and China UnionPay payments from customers worldwide.</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul id="privacy" class="cd-faq__group">
                    <li class="cd-faq__title"><h2>Privacy</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Can I specify my own private key?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum
                                    eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto
                                    impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error
                                    aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et
                                    cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente
                                    aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia
                                    necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>My files are missing! How do I get them back?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How can I access my account data?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus magni vero deserunt enim
                                    et quia in aliquam, rem tempore voluptas illo nisi veritatis quas quod placeat ipsa! Error
                                    qui harum accusamus incidunt at libero ipsum, suscipit dolorum esse explicabo in eius
                                    voluptates quidem voluptatem inventore amet eaque deserunt veniam dignissimos excepturi?
                                    Dolore, quo amet nostrum autem nemo. Sit nam assumenda, corporis ea sunt distinctio nostrum
                                    doloribus alias, beatae nesciunt dolore saepe consequuntur minima eveniet porro dolor
                                    officiis maiores ab obcaecati officia enim aliquam. Itaque fuga molestiae hic accusantium
                                    atque corporis quia id sequi enim vero? Hic aperiam sint facilis aliquam quia, accusamus
                                    tenetur earum totam enim est, error. Iusto, reiciendis necessitatibus molestias.
                                    Voluptatibus eos explicabo repellat nesciunt nam vero minima.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How can I control if other search engines can link to my profile?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul id="delivery" class="cd-faq__group">
                    <li class="cd-faq__title"><h2>Delivery</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger"
                           href="#0"><span>What should I do if my order hasn't been delivered yet?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum
                                    eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto
                                    impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error
                                    aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et
                                    cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente
                                    aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia
                                    necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger"
                           href="#0"><span>How can I find your international delivery information?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>Who takes care of shipping?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do returns or refunds work?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum
                                    eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto
                                    impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error
                                    aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et
                                    cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente
                                    aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia
                                    necessitatibus nostrum voluptatem numquam modi ab, sint rem.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I use shipping profiles?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How does your UK Next Day Delivery service work?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How does your Next Day Delivery service work?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>When will my order arrive?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>When will my order ship?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="#0" class="cd-faq__close-panel text-replace">Close</a>
            <div class="cd-faq__overlay" aria-hidden="true"></div>
        </section>
    <!-- ############ PAGE END-->
        <div class="text-center">
            <a href="{{url('help/ticket')}}"  class="btn btn-sm rounded primary _600 ticket_help">I still need help
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" class="mrg-left-0" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"></path></svg>
            </a>
        </div>
    </div>
    @include('welcome-panels.welcome-footer')
@endsection
 
@section('page-script')
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <script src="{{asset('js/faq/util.js')}}"></script>
    <script src="{{asset('js/faq/main.js')}}"></script>
@endsection
