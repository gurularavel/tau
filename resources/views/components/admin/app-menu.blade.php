<div class="app-menu navbar-menu">
    <!-- LOGO -->
       <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('/assets/admin/images/kvadrat-logo-sm.png')}}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/assets/admin/images/kvadrat-logo-dark.png')}}" alt="" height="50">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('/assets/admin/images/kvadrat-logo-sm.png')}}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{asset('/assets/admin/images/kvadrat-logo-dark.png')}}" alt="" height="50">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>


    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <x-admin.sidebar-single-nav-item :title="'Menus'"                   :routeName="'menus.index'"              :iconName="'ri-home-4-line'" />
                <x-admin.sidebar-single-nav-item :title="'Pages'"                   :routeName="'pages.index'"              :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Programs'"                :routeName="'programs.index'"           :iconName="'ri-pages-line'" />

                <x-admin.sidebar-single-nav-item :title="'CV'"                      :routeName="'cvs.index'"                :iconName="'ri-notification-2-line'" />
                <x-admin.sidebar-single-nav-item :title="'Messages'"                :routeName="'messages.index'"           :iconName="'ri-message-2-line'" />
                {{-- <x-admin.sidebar-single-nav-item :title="'Subscribers'"             :routeName="'subscribes.index'"         :iconName="'ri-user-2-line'" /> --}}
                <br>
                <x-admin.sidebar-single-nav-item :title="'Home page'"               :routeName="'homePage.index'"           :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Campus Gallery page'"     :routeName="'campusGalleryPage.index'"  :iconName="'ri-pages-line'" />

                <br>
                <x-admin.sidebar-single-nav-item :title="'Student clubs page'"      :routeName="'studentClubPage.index'"  :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Student clubs'"           :routeName="'student_clubs.index'"  :iconName="'ri-pages-line'" />

                <br>
                <x-admin.sidebar-single-nav-item :title="'Student projects page'"   :routeName="'studentProjectPage.index'"  :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Student projects'"        :routeName="'student_projects.index'"  :iconName="'ri-pages-line'" />

                <br>


                <x-admin.sidebar-single-nav-item :title="'Media guide page'"        :routeName="'mediaGuidePage.index'"  :iconName="'ri-pages-line'" />

                <br>
                <x-admin.sidebar-single-nav-item :title="'Career'"                  :routeName="'careerPage.index'"         :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Vacancies'"               :routeName="'vacancies.index'"          :iconName="'ri-pages-line'" />
                <br>

                <x-admin.sidebar-single-nav-item :title="'Contact us'"              :routeName="'contactPage.index'"        :iconName="'ri-pages-line'" />


                <br>
                <x-admin.sidebar-single-nav-item :title="'Academic calendar'"                :routeName="'academic_calendars.index'"           :iconName="'ri-message-2-line'" />
                <x-admin.sidebar-single-nav-item :title="'Configuration'"                    :routeName="'academic_lookups.index'"           :iconName="'ri-message-2-line'" />
                <br>

                <br>
                <x-admin.sidebar-single-nav-item :title="'Events page'"             :routeName="'eventPage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Event categories'"        :routeName="'event_categories.index'" :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Events'"                  :routeName="'events.index'"           :iconName="'ri-pages-line'" />
                <br>

                <br>
                <x-admin.sidebar-single-nav-item :title="'Projects page'"           :routeName="'projectPage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Project categories'"      :routeName="'project_categories.index'" :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Projects'"                :routeName="'projects.index'"           :iconName="'ri-pages-line'" />
                <br>

                <br>
                <x-admin.sidebar-single-nav-item :title="'Laboratories page'"           :routeName="'laboratoryPage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Laboratories'"                :routeName="'laboratories.index'"           :iconName="'ri-pages-line'" />
                <br>


                <br>
                <x-admin.sidebar-single-nav-item :title="'Internship programs page'"           :routeName="'internshipProgramPage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Internship Programs'"     :routeName="'internship_programs.index'"           :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Partner companies'"                :routeName="'partners.index'"           :iconName="'ri-pages-line'" />
                <br>

                <br>
                <x-admin.sidebar-single-nav-item :title="'Career opportunities page'"             :routeName="'careerOpportunityPage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Career opportunity categories'"        :routeName="'career_opportunity_categories.index'" :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Career opportunities'"                  :routeName="'career_opportunities.index'"           :iconName="'ri-pages-line'" />
                <br>

                <br>
                <x-admin.sidebar-single-nav-item :title="'Graduates page'"             :routeName="'graduatePage.index'"        :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Graduates'"                  :routeName="'graduates.index'"           :iconName="'ri-pages-line'" />
                <br>

                <x-admin.sidebar-single-nav-item :title="'News'"                    :routeName="'news.index'"               :iconName="'ri-pages-line'" />
                <x-admin.sidebar-single-nav-item :title="'Announcements'"           :routeName="'announcements.index'"      :iconName="'ri-pages-line'" />

                <br>



                <br>
                <td>
                    <li class="nav-item">
                        <a class="nav-link menu-link">
                            {{ __('translate.Other pages') }}
                        </a>
                    </li>
                </td>


                <x-admin.sidebar-single-nav-item    :title="'Footer' "               :routeName="'footers.index'"           :iconName="'ri-pages-line'" />
                <x-admin.sidebar-nav-item           :title="'Users'"                 :routeName="'users'" :iconName="'ri-apps-2-line'" />
                <x-admin.sidebar-nav-item           :title="'Roles'"                 :routeName="'roles'" :iconName="'ri-order-play-line'" />
                <x-admin.sidebar-nav-item           :title="'Languages'"             :routeName="'languages'" :iconName="'ri-exchange-line'" />
                <x-admin.sidebar-single-nav-item    :title="'Translation'"           :routeName="'interpreter.index'"                  :iconName="'ri-translate-2'" />
                <x-admin.sidebar-single-nav-item    :title="'Settings'"              :routeName="'settings.index'" :iconName="'ri-file-settings-line'" />
                <x-admin.sidebar-single-nav-item    :title="'Clear cache'"           :routeName="'settings.optimize-clear'" :iconName="'ri-delete-bin-6-line'" :color="'red'" />



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
