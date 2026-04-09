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
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                {{-- ═══════════════════════════════════════
                     NAVIGASIYA
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Navigation" icon="ri-compass-3-line" />
                <x-admin.sidebar-single-nav-item :title="'Menus'"    :routeName="'menus.index'"    :iconName="'ri-menu-4-line'" />
                <x-admin.sidebar-single-nav-item :title="'Pages'"    :routeName="'pages.index'"    :iconName="'ri-file-text-line'" />
                <x-admin.sidebar-single-nav-item :title="'Programs'" :routeName="'programs.index'" :iconName="'ri-book-2-line'" />

                {{-- ═══════════════════════════════════════
                     GƏLƏNQUTu
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Inbox" icon="ri-inbox-line" />
                <x-admin.sidebar-single-nav-item :title="'CV'"       :routeName="'cvs.index'"      :iconName="'ri-file-user-line'" />
                <x-admin.sidebar-single-nav-item :title="'Messages'" :routeName="'messages.index'" :iconName="'ri-chat-3-line'" />

                {{-- ═══════════════════════════════════════
                     SƏHİFƏ AYARLARI
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Page Settings" icon="ri-layout-2-line" />
                <x-admin.sidebar-single-nav-item :title="'Home page'"           :routeName="'homePage.index'"          :iconName="'ri-home-5-line'" />
                <x-admin.sidebar-single-nav-item :title="'Campus Gallery page'" :routeName="'campusGalleryPage.index'" :iconName="'ri-image-2-line'" />
                <x-admin.sidebar-single-nav-item :title="'Media guide page'"    :routeName="'mediaGuidePage.index'"    :iconName="'ri-newspaper-line'" />
                <x-admin.sidebar-single-nav-item :title="'History page'"          :routeName="'historyPage.index'"       :iconName="'ri-history-line'" />
                <x-admin.sidebar-single-nav-item :title="'Contact us'"          :routeName="'contactPage.index'"       :iconName="'ri-phone-line'" />

                {{-- ═══════════════════════════════════════
                     TƏLƏBƏ
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Student" icon="ri-user-2-line" />
                <x-admin.sidebar-single-nav-item :title="'Student clubs page'"    :routeName="'studentClubPage.index'"    :iconName="'ri-group-line'" />
                <x-admin.sidebar-single-nav-item :title="'Student clubs'"         :routeName="'student_clubs.index'"      :iconName="'ri-team-line'" />
                <x-admin.sidebar-single-nav-item :title="'Student projects page'" :routeName="'studentProjectPage.index'" :iconName="'ri-lightbulb-flash-line'" />
                <x-admin.sidebar-single-nav-item :title="'Student projects'"      :routeName="'student_projects.index'"   :iconName="'ri-code-s-slash-line'" />

                {{-- ═══════════════════════════════════════
                     KARYEra
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Career" icon="ri-briefcase-4-line" />
                <x-admin.sidebar-single-nav-item :title="'Career'"    :routeName="'careerPage.index'" :iconName="'ri-briefcase-4-line'" />
                <x-admin.sidebar-single-nav-item :title="'Vacancies'" :routeName="'vacancies.index'"  :iconName="'ri-file-list-3-line'" />
                <x-admin.sidebar-single-nav-item :title="'Career opportunities page'"       :routeName="'careerOpportunityPage.index'"        :iconName="'ri-compass-discover-line'" />
                <x-admin.sidebar-single-nav-item :title="'Career opportunity categories'"  :routeName="'career_opportunity_categories.index'" :iconName="'ri-price-tag-3-line'" />
                <x-admin.sidebar-single-nav-item :title="'Career opportunities'"           :routeName="'career_opportunities.index'"          :iconName="'ri-award-line'" />

                {{-- ═══════════════════════════════════════
                     AKADEMİK
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Academic" icon="ri-graduation-cap-line" />
                <x-admin.sidebar-single-nav-item :title="'Academic calendar'" :routeName="'academic_calendars.index'" :iconName="'ri-calendar-line'" />
                <x-admin.sidebar-single-nav-item :title="'Configuration'"     :routeName="'academic_lookups.index'"   :iconName="'ri-settings-3-line'" />

                {{-- ═══════════════════════════════════════
                     TƏDBİRLƏR & LAYİHƏLƏR
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Events & Projects" icon="ri-calendar-event-line" />
                <x-admin.sidebar-single-nav-item :title="'Events page'"       :routeName="'eventPage.index'"        :iconName="'ri-calendar-event-line'" />
                <x-admin.sidebar-single-nav-item :title="'Event categories'"  :routeName="'event_categories.index'" :iconName="'ri-folder-chart-line'" />
                <x-admin.sidebar-single-nav-item :title="'Events'"            :routeName="'events.index'"           :iconName="'ri-calendar-check-line'" />
                <x-admin.sidebar-single-nav-item :title="'Projects page'"     :routeName="'projectPage.index'"        :iconName="'ri-folder-5-line'" />
                <x-admin.sidebar-single-nav-item :title="'Project categories'":routeName="'project_categories.index'" :iconName="'ri-stack-line'" />
                <x-admin.sidebar-single-nav-item :title="'Projects'"          :routeName="'projects.index'"           :iconName="'ri-git-repository-line'" />

                {{-- ═══════════════════════════════════════
                     TƏDQİQAT & TƏCRÜBƏ
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="Research & Internship" icon="ri-flask-line" />
                <x-admin.sidebar-single-nav-item :title="'Laboratories page'" :routeName="'laboratoryPage.index'"       :iconName="'ri-flask-line'" />
                <x-admin.sidebar-single-nav-item :title="'Laboratories'"      :routeName="'laboratories.index'"          :iconName="'ri-test-tube-line'" />
                <x-admin.sidebar-single-nav-item :title="'Internship programs page'" :routeName="'internshipProgramPage.index'" :iconName="'ri-graduation-cap-line'" />
                <x-admin.sidebar-single-nav-item :title="'Internship Programs'"      :routeName="'internship_programs.index'"   :iconName="'ri-medal-line'" />
                <x-admin.sidebar-single-nav-item :title="'Partner companies'"        :routeName="'partners.index'"             :iconName="'ri-building-2-line'" />

                {{-- ═══════════════════════════════════════
                     XƏBƏRLƏR & MEZUNlar
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="News & Graduates" icon="ri-newspaper-line" />
                <x-admin.sidebar-single-nav-item :title="'Graduates page'" :routeName="'graduatePage.index'" :iconName="'ri-user-star-line'" />
                <x-admin.sidebar-single-nav-item :title="'Graduates'"      :routeName="'graduates.index'"    :iconName="'ri-contacts-book-2-line'" />
                <x-admin.sidebar-single-nav-item :title="'News'"           :routeName="'news.index'"         :iconName="'ri-newspaper-line'" />
                <x-admin.sidebar-single-nav-item :title="'Announcements'"  :routeName="'announcements.index'" :iconName="'ri-megaphone-line'" />

                {{-- ═══════════════════════════════════════
                     SİSTEM
                ═══════════════════════════════════════ --}}
                <x-admin.sidebar-section-header title="System" icon="ri-shield-user-line" />
                <x-admin.sidebar-single-nav-item    :title="'Footer'"      :routeName="'footers.index'"          :iconName="'ri-layout-bottom-line'" />
                <x-admin.sidebar-nav-item           :title="'Users'"       :routeName="'users'"                  :iconName="'ri-user-settings-line'" />
                <x-admin.sidebar-nav-item           :title="'Roles'"       :routeName="'roles'"                  :iconName="'ri-shield-keyhole-line'" />
                <x-admin.sidebar-nav-item           :title="'Languages'"   :routeName="'languages'"              :iconName="'ri-global-line'" />
                <x-admin.sidebar-single-nav-item    :title="'Translation'" :routeName="'interpreter.index'"      :iconName="'ri-translate-2'" />
                <x-admin.sidebar-single-nav-item    :title="'Settings'"    :routeName="'settings.index'"         :iconName="'ri-settings-4-line'" />
                <x-admin.sidebar-single-nav-item    :title="'Clear cache'" :routeName="'settings.optimize-clear'" :iconName="'ri-delete-bin-6-line'" :color="'#f06548'" />

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
