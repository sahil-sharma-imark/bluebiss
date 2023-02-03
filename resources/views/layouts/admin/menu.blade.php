<style>
  .dissable-dot .menu-link:before {
    width: 0rem!important;
    height: 0rem!important;
    
}
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <?php
              $get_logo = DB::table('bluebis_admin_setting')->where('id',1)->first();
         
              ?>
              <span class="app-brand-logo demo">
               <a href="{{url('dashboard')}}"><img src="{{asset('uploads/admin/setting/'.$get_logo->logo_img)}}" alt="Logo"></a>
              </span>
              
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{url('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>

            <!--- Pages --->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Pages</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                      <div data-i18n="Account Settings">Setting</div>
                  </a>
                  <ul class="menu-sub" >
                    <li class="menu-item dissable-dot">
                      <a href="{{url('dashboard-setting')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Home</div>
                  </a>
                  <ul class="menu-sub" >
                    <li class="menu-item dissable-dot">
                      <a href="{{url('homepage-edit')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">About Us</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('aboutus-edit')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Contact Us</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('contactus-edit')}}" class="menu-link">
                        <div data-i18n="Account">Details</div>
                      </a>
                    </li>
                    <li class="menu-item dissable-dot">
                      <a href="{{url('subject-all')}}" class="menu-link">
                        <div data-i18n="Account">Subject</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">FAQ</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('faq-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">How It Work</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('how-it-work-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Testimonials</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('testimonials-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Right Price</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('right-price-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Our Team</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('our-team-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Home Top</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('home-top-all')}}" class="menu-link">
                        <div data-i18n="Account">All</div>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Create Project</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('create-project-update')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Privacy Policy</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('privacy-policy-update')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Review Policy</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('review-policy-update')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Terms of Use</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('terms-conditions-update')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

                <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <!-- <i class="menu-icon tf-icons bx bx-dock-top"></i> -->
                    <div data-i18n="Account Settings">Cancellation Policy</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item dissable-dot">
                      <a href="{{url('cancellation-policy-update')}}" class="menu-link">
                        <div data-i18n="Account">Update</div>
                      </a>
                    </li>
                  </ul>
                </li>

              </ul>
            </li>
            <!--- Pages end --->

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Commission</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('admin-persentage')}}" class="menu-link">
                    <div data-i18n="Account">Commission</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Providers</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="#" class="menu-link">
                    <div data-i18n="Account">Create</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('providers')}}" class="menu-link">
                    <div data-i18n="Notifications">All</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Users</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Create</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('users')}}" class="menu-link">
                    <div data-i18n="Notifications">All</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Task</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="{{url('post-task')}}" class="menu-link">
                    <div data-i18n="Account">Request Task</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('post-task')}}" class="menu-link">
                    <div data-i18n="Notifications">Post Task</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Categories</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="{{url('add')}}" class="menu-link">
                    <div data-i18n="Account">Add Category</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('categories')}}" class="menu-link">
                    <div data-i18n="Notifications">All Category</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Sub Categories</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="{{url('add-subcategory')}}" class="menu-link">
                    <div data-i18n="Account">Add Sub-category</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('sub-category')}}" class="menu-link">
                    <div data-i18n="Notifications">All Sub-category</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Start Blogs Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Blogs</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="{{url('add-blag')}}" class="menu-link">
                    <div data-i18n="Account">Add Blog</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('all-blog')}}" class="menu-link">
                    <div data-i18n="Notifications">All Blogs</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Blog Section -->

            <!-- Start Footer Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Custom Footer</div>
              </a>
              <ul class="menu-sub">
                <!-- <li class="menu-item">
                  <a href="{{url('add-blag')}}" class="menu-link">
                    <div data-i18n="Account">Add Blog</div>
                  </a>
                </li> -->
                <li class="menu-item">
                  <a href="{{url('custom-footer')}}" class="menu-link">
                    <div data-i18n="Notifications">Footer</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Footer Section -->

            <!-- Start author for admin -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Author</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('all-author')}}" class="menu-link">
                    <div data-i18n="Account">all</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End  author for admin -->

            <!-- Start Dispute Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Dispute</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('all-disputes')}}" class="menu-link">
                    <div data-i18n="Notifications">All Disputes</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Dispute Section -->

            <!-- Start Dynamic Pages Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Questions</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('add-pages')}}" class="menu-link">
                    <div data-i18n="Account">Add Questions</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{url('all-questions')}}" class="menu-link">
                    <div data-i18n="Notifications">All Questions</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Dynamic Pages Section -->

            <!-- Start Dynamic Pages Section -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Email Template</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('email-template')}}" class="menu-link">
                    <div data-i18n="Account">Email</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End Dynamic Pages Section -->

            <!-- Start chat for admin -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Chat</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('admin-chat')}}" class="menu-link">
                    <div data-i18n="Account">Select Chat</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End  chat for admin -->

            <!-- Start image link for admin -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Image Link</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{url('all-image-link')}}" class="menu-link">
                    <div data-i18n="Account">all</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- End  image link for admin -->

            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>
            
            
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link"
              >
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </aside>