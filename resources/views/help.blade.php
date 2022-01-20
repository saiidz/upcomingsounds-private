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
                <li><a class="cd-faq__category truncate" href="#mobile">Curators / Pro's</a></li>
                <li><a class="cd-faq__category truncate" href="#account"> My Account</a></li>
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
                    <li class="cd-faq__title"><h2>Mobile</h2></li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How does syncing work?</span></a>
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
                        <a class="cd-faq__trigger" href="#0"><span>How do I upload files from my phone or tablet?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam
                                    rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos.
                                    Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur!
                                    Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique
                                    voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis
                                    veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias,
                                    aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor
                                    dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia
                                    assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam
                                    natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia!
                                    Beatae, molestias!</p>
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
                        <a class="cd-faq__trigger" href="#0"><span>How do I change my password?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur
                                    labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio
                                    perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam
                                    magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab
                                    aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat
                                    laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi
                                    sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores
                                    aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt
                                    reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste
                                    officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam
                                    qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id
                                    quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I delete my account?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo tempore soluta, minus magnam
                                    non blanditiis dolore, in nam voluptas nobis minima deserunt deleniti id animi amet,
                                    suscipit consequuntur corporis nihil laborum facere temporibus. Qui inventore, doloribus
                                    facilis, provident soluta voluptas excepturi perspiciatis fugiat odit vero! Optio assumenda
                                    animi at! Assumenda doloremque nemo est sequi eaque, ipsum id, labore rem nisi, amet
                                    similique vel autem dolore totam facilis deserunt. Mollitia non ut libero unde accusamus
                                    praesentium sint maiores, illo, nemo aliquid?</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>How do I change my account settings?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis,
                                    reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit,
                                    magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
                            </div>
                        </div>
                    </li>
                    <li class="cd-faq__item">
                        <a class="cd-faq__trigger" href="#0"><span>I forgot my password. How do I reset it?</span></a>
                        <div class="cd-faq__content">
                            <div class="text-component">
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum at aspernatur iure facere ab
                                    a corporis mollitia molestiae quod omnis minima, est labore quidem nobis accusantium ad
                                    totam sunt doloremque laudantium impedit similique iste quasi cum! Libero fugit at
                                    praesentium vero. Maiores non consequuntur rerum, nemo a qui repellat quibusdam architecto
                                    voluptatem? Sequi, possimus, cupiditate autem soluta ipsa rerum officiis cum libero delectus
                                    explicabo facilis, odit ullam aperiam reprehenderit! Vero ad non harum veritatis tempore
                                    beatae possimus, ex odio quo.</p>
                            </div>
                        </div>
                    </li>
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

    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <script src="{{asset('js/faq/util.js')}}"></script>
    <script src="{{asset('js/faq/main.js')}}"></script>
@endsection
