@extends('web.layouts.app' , ['title' => 'Frequently Asked Questions'  , 'activePage' => 'faq' , 'meta_keywords' => 'Frequently Asked Questions' , 'meta_description' => 'Frequently Asked Questions'])
@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr3.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Faq</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="javascript:void(0);">Home</a></li>
                        <li>Faq</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Your Faq -->
        <div class="section-full overlay-white-middle content-inner" style="background-image:url(images/pattern/pic1.jpg);">
            <div class="container">
                <div class="section-head text-black text-center">
                    <h3 class="title">Do you have Questions?</h3>
                    <p>
                        We prepared a list of the most frequently asked questions below. Feel free to ask yours if you dont find it in the list.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 m-b30">
                        <div class="faq-form-box sticky-top">
                            <div class="form-header">
                                <h2 class="title">Any question?</h2>
                            </div>
                            <form>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="dzName" type="text" required="" class="form-control" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="dzName" type="text" required="" class="form-control" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="dzName" type="text" required="" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Write Message"></textarea>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button class="site-button button-md bg-secondry btn-block">SEND MESSAGE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 m-b30">
                        <div class="dlab-accordion faq-1 box-sort-in m-b30 space active-bg accdown1" id="accordion001">
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"> WHICH COURSE IS BETTER?</a> </h6>
                                </div>
                                <div id="collapse1" class="acod-body collapse show" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            They’re both pretty good. For the average person who wants to learn the market at their own pace and speed,
                                             the free online course is the one for you. You can watch videos and interact with the community via the social
                                              timeline whenever you choose.
                                             For those who want to learn the market at a faster level, our MINI/ADVANCED course is for you.
                                        </p>
                                        <p>
                                            However, with our Mini course you can be guranteed of making good profits from the cryptocurrency market.
                                             And in a case whereby you want to futher your knowledge to a more professional level,
                                             our Advanced Crypto-currency trading course provides you with all you need to attain such height.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse" data-target="#collapse2" class="collapsed" aria-expanded="false">WHAT'S THE DIFFERENCE BETWEEN THE FREE ONLINE COURSE AND THE ADVANCED COURSE?</a> </h6>
                                </div>
                                <div id="collapse2" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            The free online course is more of a “self-taught” formula, where we give you
                                            access to the entire library which includes videos and written content, access to the
                                             social timeline, and more. Moreover, the ADVANCED gives you access to more advanced
                                              strategies on how to trade. We provide you with set of videos that are NOT seen in the
                                               free online course, access to webinars,
                                            weekly/monthly prizes for outstanding students, and so much more.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse3" class="collapsed" aria-expanded="false">DO YOU OFFER INSTALMENT PAYMENT FOR COURSES?</a> </h6>
                                </div>
                                <div id="collapse3" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            Unfortunately, there’s no way to give you access to the course without full payment.
                                             However, If you ever wish to enjoy discount prices for any of our courses;
                                             do well to constantly check the site as we'll be offering discount rates for courses time to time.
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse" data-target="#collapse4" class="collapsed" aria-expanded="false">HOW LONG IS THE COURSE?</a> </h6>
                                </div>
                                <div id="collapse4" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            It’ll probably take you about 3-4 weeks to fully watch every single thing.
                                            You of course can choose to watch it all in a matter of days, but you won’t retain much
                                             because of how much information you’re going through in 2 days.
                                             We recommend taking your time, watch a few videos a day, and study over t
                                             ime so everything clicks.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse5" class="collapsed" aria-expanded="false">IS THERE A 1 ON 1 MENTORSHIP SCHEME?</a> </h6>
                                </div>
                                <div id="collapse5" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            Yes, there is. Everything ranging from course tutorials, videos, resources and assignments will all take place online on our website.
                                             Then on completion of your course , you'll be added to a whatsapp group with a tutor to guide you through.
                                             The aim of this is to help newbies learn from other students' questions and get to engage well with their tutor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse6" class="collapsed" aria-expanded="false">WHAT'S THE REFUND POLICY?</a> </h6>
                                </div>
                                <div id="collapse6" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            There are no refunds. Please make sure you read all the features, read what the course entails,
                                             and make sure it’s something you want! There’s so much great content in there
                                              we're confident you won’t regret your decision enroling for any of our courses.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse7" class="collapsed" aria-expanded="false">ONCE I JOIN, WHERE DO I START?</a> </h6>
                                </div>
                                <div id="collapse7" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                       <p>
                                        From the beginning! This may seem like an obvious question but I get this question a lot.
                                         The course currently has SEVERAL LEVELS with  videos per level. And to get video(s) for the next section,
                                          a compulsory assignment will be given by your course tutor before you progress. DON'T GET OFFENDED.
                                         Your progress is our utmost joy and we're able to track that with the given assignments for each section.
                                       </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse8" class="collapsed" aria-expanded="false">HOW CAN I CONTACT LEARNBTC ACADEMY?</a> </h6>
                                </div>
                                <div id="collapse8" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                        <p>
                                            For enquiries, you can always our customer care support on the website or message: on whatsapp.
                                        </p>
                                </div>
                            </div>
                            </div>
                            <div class="panel">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a  href="javascript:void(0);" data-toggle="collapse"  data-target="#collapse9" class="collapsed" aria-expanded="false">DO WE GET TRADING SIGNALS WHILE WE LEARN?</a> </h6>
                                </div>
                                <div id="collapse9" class="acod-body collapse" data-parent="#accordion001">
                                    <div class="acod-content">
                                       <p>
                                        Yes. For our students, we provide free 1 month access to our VIP signal group. And for interested persons that are not enroled for any of our courses, please do well to check our plans on the 'pricing and plans' page.
                                       </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Your Faq End -->
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->
@endsection
