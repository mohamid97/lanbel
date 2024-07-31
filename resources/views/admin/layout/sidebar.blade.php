
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">



    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">CanGrow Dashboard</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                @if($settings->finish )
                    @if($settings->slider)
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>
                                    Sliders
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.sliders.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sliders</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.sliders.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.sliders.setting')}}" class="nav-link">
                                        <i class="fa fa-cog nav-icon"></i>
                                        <p>Setting</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif


                    @if($settings->messages)

                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-comments nav-icon"></i>
                                    <p>
                                        Messages
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.messages.index')}}" class="nav-link">
                                            <i class="fa fa-language nav-icon"></i>
                                            <p>  All </p>
                                        </a>
                                    </li>


                                </ul>
                            </li>

                        @endif



                        @if($settings->feedback)

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-comments nav-icon"></i>
                                <p>
                                    Feedbacks
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.feedback.index')}}" class="nav-link">
                                        <i class="fa fa-language nav-icon"></i>
                                        <p>  All </p>
                                    </a>
                                </li>


                                
                                <li class="nav-item">
                                    <a href="{{route('admin.feedback.index')}}" class="nav-link">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>  Add </p>
                                    </a>
                                </li>


                            </ul>
                        </li>

                    @endif






                    @if($settings->about_us)
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-address-card nav-icon"></i>
                                <p>
                                   About Us
                                   <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.about.index')}}" class="nav-link">
                                    <i class="far fa-address-card nav-icon"></i>
                                    <p>About Us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if($settings->contact_us)
                       <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-phone-volume"></i>
                            <p>
                            Contact Us
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.contact.index')}}" class="nav-link">
                            <i class="far fa-volume-control-phone nav-icon"></i>
                            <p>Contact Us</p>
                        </a>
                    </li>


                </ul>
            </li>
                    @endif

                    @if($settings->social_media )
                        <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="far fa-newspaper nav-icon"></i>
                    <p>
                        Social Media
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.social_media.index')}}" class="nav-link">
                            <i class="far fa-newspaper nav-icon"></i>
                            <p> Social Media </p>
                        </a>
                    </li>


                </ul>
            </li>
                    @endif



                    
                    @if($settings->faq )
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-comments"></i>
                            <p>
                             Faq
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.main_faq.index')}}" class="nav-link">
                                <i class="fas fa-comments"></i>
                                <p> Main Data </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.faq.index')}}" class="nav-link">
                                <i class="fas fa-comments"></i>
                                <p> Faq </p>
                            </a>
                        </li>

                    </ul>
                    </li>
                    @endif




                    @if($settings->clients )
                        <li class="nav-item has-treeview">
                                                    <a href="#" class="nav-link">
                                                        <i class="fa fa-users nav-icon"></i>
                                                        <p>
                                                            Our Clients
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="{{route('admin.our_clients.index')}}" class="nav-link">
                                                                <i class="fa fa-users nav-icon"></i>
                                                                <p>  Our Clients </p>
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a href="{{route('admin.our_clients.add')}}" class="nav-link">
                                                                <i class="fa fa-plus nav-icon"></i>
                                                                <p> Add </p>
                                                            </a>
                                                        </li>


                                                    </ul>
                                                </li>
                    @endif

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user-circle nav-icon"></i>
                                <p>
                                    Users
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.users.index')}}" class="nav-link">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>  My Users </p>
                                    </a>
                                </li>




                            </ul>
                        </li>

                    @if($settings->our_works )
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-briefcase nav-icon"></i>
                                    <p>
                                        Our Works
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.our_works.index')}}" class="nav-link">
                                            <i class="fa fa-briefcase nav-icon"></i>
                                            <p>  Our Works </p>
                                        </a>
                                    </li>



                                </ul>
                            </li>
                    @endif


                    

                    @if($settings->ourteam )
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-briefcase nav-icon"></i>
                                    <p>
                                        Our Team
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.ourteam.index')}}" class="nav-link">
                                            <i class="fa fa-briefcase nav-icon"></i>
                                            <p>  Our Team </p>
                                        </a>
                                    </li>

                                    
                                    <li class="nav-item">
                                        <a href="{{route('admin.ourteam.add')}}" class="nav-link">
                                            <i class="fa fa-plus  nav-icon"></i>
                                            <p>  Add </p>
                                        </a>
                                    </li>


   
                                </ul>
                            </li>
                    @endif



                    @if($settings->events )
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-briefcase nav-icon"></i>
                            <p>
                                Events
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('admin.events.index')}}" class="nav-link">
                                    <i class="fa fa-briefcase nav-icon"></i>
                                    <p>  Events</p>
                                </a>
                            </li>

                            
                            <li class="nav-item">
                                <a href="{{route('admin.events.add')}}" class="nav-link">
                                    <i class="fa fa-plus  nav-icon"></i>
                                    <p>  Add </p>
                                </a>
                            </li>



                        </ul>
                    </li>
            @endif
                    


                        <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-search nav-icon"></i>
                        <p>
                            Website Meta
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.meta.index')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  Meta </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.meta.services')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  Services </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.meta.categories')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  Categories </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.meta.blogs')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  Blogs </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.meta.products')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  products </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('admin.meta.projects')}}" class="nav-link">
                                <i class="fa fa-language nav-icon"></i>
                                <p>  projects </p>
                            </a>
                        </li>




                    </ul>
                </li>

                    @if($settings->categories )
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-bars nav-icon"></i>
                                    <p>
                                        Category
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.category.index')}}" class="nav-link">
                                            <i class="fa fa-bars nav-icon"></i>
                                            <p>  Category </p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{route('admin.category.add')}}" class="nav-link">
                                            <i class="fa fa-plus  nav-icon"></i>
                                            <p>  Add </p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                    @endif


                    @if($settings->products )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-search nav-icon"></i>
                                <p>
                                    Products
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.products.index')}}" class="nav-link">
                                        <i class="fa fa-language nav-icon"></i>
                                        <p>  Products </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.products.add')}}" class="nav-link">
                                        <i class="fa fa-plus nav-icon"></i>
                                        <p>  Add </p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    @endif

                    @if($settings->services )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-building nav-icon"></i>
                                <p>
                                    Services
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.services.index')}}" class="nav-link">
                                        <i class="fa fa-building nav-icon"></i>
                                        <p>  Services </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.services.add')}}" class="nav-link">
                                        <i class="fa fa-plus  nav-icon"></i>
                                        <p>  Add </p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                    @endif


                    @if($settings->cms )
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fa fa-newspaper nav-icon"></i>
                                <p>
                                    CMS
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.cms.index')}}" class="nav-link">
                                        <i class="fa fa-newspaper nav-icon"></i>
                                        <p>  cms </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.cms.add')}}" class="nav-link">
                                        <i class="fa fa-plus  nav-icon"></i>
                                        <p>  Add </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif

                    @if($settings->payments )
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-dollar-sign nav-icon"></i>
                            <p>
                                Payments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('admin.payments.index')}}" class="nav-link">
                                    <i class="fas fa-dollar-sign nav-icon"></i>
                                    <p>  Payments </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="{{route('admin.payments.status')}}" class="nav-link">
                                    <i class="fas fa-dollar-sign nav-icon"></i>
                                    <p>  Status </p>
                                </a>
                            </li>



                        </ul>
                    </li>
                   @endif





                    @if($settings->mission_vission)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-newspaper nav-icon"></i>
                            <p>
                                Mission And Vission
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('admin.mission_vission.index')}}" class="nav-link">
                                    <i class="fa fa-newspaper nav-icon"></i>
                                    <p>  Mission Vission </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                @endif






                    @if($settings->media )
                        <li class="nav-item has-treeview">




                            <a href="#" class="nav-link">
                                <i class="fa fa-microphone nav-icon"></i>
                                <p>
                                    Media
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="{{route('admin.group_media.index')}}" class="nav-link">
                                        <i class="fa fa-images nav-icon"></i>
                                        <p>   Media Group </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('admin.media.gallery')}}" class="nav-link">
                                        <i class="fa fa-images nav-icon"></i>
                                        <p>  Gallery </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.media.videos')}}" class="nav-link">
                                        <i class="fa fa-video  nav-icon"></i>
                                        <p>  Video </p>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <a href="{{route('admin.media.files')}}" class="nav-link">
                                        <i class="fa fa-file  nav-icon"></i>
                                        <p>  Files </p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif


                    @if($settings->des )
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-comment nav-icon"></i>
                                    <p>
                                        Descriptions
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.des.index')}}" class="nav-link">
                                            <i class="fa fa-comment nav-icon"></i>
                                            <p>  Description </p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{route('admin.des.add')}}" class="nav-link">
                                            <i class="fa fa-plus  nav-icon"></i>
                                            <p>  Add </p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        @endif


                    @if($settings->achievement )
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-comment nav-icon"></i>
                                    <p>
                                        Achievement
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('admin.ach.index')}}" class="nav-link">
                                            <i class="fa fa-google nav-icon"></i>
                                            <p>  Achievement </p>
                                        </a>
                                    </li>



                                </ul>
                            </li>
                        @endif






                @endif


                <!-- start language and setting -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa fa-cog nav-icon"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.settings.index')}}" class="nav-link">
                                <i class="fa fa-cog nav-icon"></i>
                                <p>  Setting </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.auth.showUpdate')}}" class="nav-link">
                                <i class="fa fa-image nav-icon"></i>
                                <p>  Info </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('admin.auth.logout')}}" class="nav-link">
                                <i class="fa fa-image nav-icon"></i>
                                <p>  Logout </p>
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-language nav-icon"></i>
                            <p>
                                Langs
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="{{route('admin.lang.index')}}" class="nav-link">
                                    <i class="fa fa-language nav-icon"></i>
                                    <p>  Languages </p>
                                </a>
                            </li>



                        </ul>
                    </li>





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
