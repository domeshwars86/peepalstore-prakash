      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" data-scroll-to-active="true">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a class="logo-text float-left" href="index.html">
              <div class="logo-img"><img src="{{asset('app-assets/img/logo.png')}}" alt="Apex Logo"/></div><span class="text">APEX</span></a><a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a><a class="nav-close d-block d-lg-block d-xl-none" id="sidebarClose" href="javascript:;"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content main-menu-content">
          <div class="nav-container">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class=" nav-item"><a href="app-email.html"><i class="ft-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
              </li>
              {{-- <li class=" nav-item"><a href="#"><i class="ft-mail"></i><span class="menu-title" data-i18n="Email">Email</span></a>
              </li>
              <li class=" nav-item"><a href="app-chat.html"><i class="ft-message-square"></i><span class="menu-title" data-i18n="Chat">Chat</span></a>
              </li>
              <li class=" nav-item"><a href="app-taskboard.html"><i class="ft-file-text"></i><span class="menu-title" data-i18n="Task Board">Task Board</span></a>
              </li>
              <li class=" nav-item"><a href="app-calendar.html"><i class="ft-calendar"></i><span class="menu-title" data-i18n="Calendar">Calendar</span></a>
              </li> --}}
              <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-settings"></i><span class="menu-title" data-i18n="UI Kit">Management</span>
                {{-- <span class="tag badge badge-pill badge-success float-right mr-1 mt-1">6</span> --}}
              </a>
                <ul class="menu-content">
                  <li><a href="{{ route('get_category') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Grid">Master Category</span></a>
                  </li>
                  <li><a href="{{ route('get_brand') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Typography">Master Brand</span></a>
                  </li>
                  <li><a href="{{ route('get_product') }}"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Syntax Highlighter">Product</span></a>
                  </li>
                  {{-- <li><a href="helper-classes.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Helper Classes">Helper Classes</span></a>
                  </li>
                  <li><a href="text-utilities.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Text Utilities">Text Utilities</span></a>
                  </li>
                  <li><a href="color-palette.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Color Palette">Color Palette</span></a>
                  </li> --}}
                  {{-- <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Icons">Icons</span></a>
                    <ul class="menu-content">
                      <li><a href="icons-feather.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Feather Icon">Feather Icon</span></a>
                      </li>
                      <li><a href="icons-font-awesome.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Font Awesome Icon">Font Awesome Icon</span></a>
                      </li>
                      <li><a href="icons-simple-line.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Simple Line Icon">Simple Line Icon</span></a>
                      </li>
                    </ul>
                  </li> --}}
                </ul>
              </li>
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-box"></i><span class="menu-title" data-i18n="Components">Components</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Bootstrap">Bootstrap</span></a>
                    <ul class="menu-content">
                      <li><a href="components-buttons.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Buttons">Buttons</span></a>
                      </li>
                      <li><a href="components-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Alerts">Alerts</span></a>
                      </li>
                      <li><a href="components-badges.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Badges">Badges</span></a>
                      </li>
                      <li><a href="components-dropdowns.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Dropdowns">Dropdowns</span></a>
                      </li>
                      <li><a href="components-media-objects.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Objects">Media Objects</span></a>
                      </li>
                      <li><a href="components-pagination.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Pagination">Pagination</span></a>
                      </li>
                      <li><a href="components-progress.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Progress Bars">Progress Bars</span></a>
                      </li>
                      <li><a href="components-modals.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Modals">Modals</span></a>
                      </li>
                      <li><a href="components-collapse.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Collapse">Collapse</span></a>
                      </li>
                      <li><a href="components-lists.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                      </li>
                      <li><a href="components-carousel.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Carousel">Carousel</span></a>
                      </li>
                      <li><a href="components-popover.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Popover">Popover</span></a>
                      </li>
                      <li><a href="components-tabs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tabs">Tabs</span></a>
                      </li>
                      <li><a href="components-tooltip.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tooltip">Tooltip</span></a>
                      </li>
                      <li><a href="components-spinner.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Spinner">Spinner</span></a>
                      </li>
                      <li><a href="components-toast.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toast">Toast</span></a>
                      </li>
                    </ul>
                  </li>
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extra">Extra</span></a>
                    <ul class="menu-content">
                      <li><a href="ex-component-sweet-alerts.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Sweet Alert">Sweet Alert</span></a>
                      </li>
                      <li><a href="ex-component-toastr.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Toastr">Toastr</span></a>
                      </li>
                      <li><a href="ex-component-nouislider.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="NoUI Slider">NoUI Slider</span></a>
                      </li>
                      <li><a href="ex-component-upload.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Upload">Upload</span></a>
                      </li>
                      <li><a href="ex-component-dragndrop.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Drag and Drop">Drag and Drop</span></a>
                      </li>
                      <li><a href="ex-component-tour.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Tour">Tour</span></a>
                      </li>
                      <li><a href="ex-component-media-player.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Media Player">Media Player</span></a>
                      </li>
                      <li><a href="ex-component-treeview.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Treeview">Treeview</span></a>
                      </li>
                      <li><a href="ex-component-swiper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Swiper">Swiper</span></a>
                      </li>
                      <li><a href="ex-component-miscellaneous.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Miscellaneous">Miscellaneous</span></a>
                      </li>
                      <li><a href="ex-component-avatar.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Avatar">Avatar</span></a>
                      </li>
                      <li><a href="ex-component-image-cropper.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Image Cropper">Image Cropper</span></a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-edit"></i><span class="menu-title" data-i18n="Forms">Forms</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Elements">Elements</span></a>
                    <ul class="menu-content">
                      <li><a href="form-inputs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Inputs">Inputs</span></a>
                      </li>
                      <li><a href="form-input-groups.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Groups">Input Groups</span></a>
                      </li>
                      <li><a href="form-radio.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Radio">Radio</span></a>
                      </li>
                      <li><a href="form-checkbox.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Checkbox">Checkbox</span></a>
                      </li>
                      <li><a href="form-switch.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Switch">Switch</span></a>
                      </li>
                      <li><a href="form-select.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Select">Select</span></a>
                      </li>
                      <li><a href="form-editor.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="home">Editor</span></a>
                      </li>
                      <li><a href="form-input-tags.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Input Tag">Input Tag</span></a>
                      </li>
                      <li><a href="form-datetimepicker.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Datepicker">Datepicker</span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="form-layout.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Layouts">Layouts</span></a>
                  </li>
                  <li><a href="form-validation.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Validation">Validation</span></a>
                  </li>
                  <li><a href="form-wizard.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Wizard">Wizard</span></a>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-grid"></i><span class="menu-title" data-i18n="Tables">Tables</span></a>
                <ul class="menu-content">
                  <li><a href="table-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                  </li>
                  <li><a href="table-extended.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Extended">Extended</span></a>
                  </li>
                </ul>
              </li> --}}
              <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layout"></i><span class="menu-title" data-i18n="Data Tables">Data Tables</span></a>
                <ul class="menu-content">
                  <li><a href="dt-basic-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic">Basic</span></a>
                  </li>
                  <li><a href="dt-advanced-initialization.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced">Advanced</span></a>
                  </li>
                  <li><a href="dt-data-sources.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Data Sources">Data Sources</span></a>
                  </li>
                  <li><a href="dt-api.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="API">API</span></a>
                  </li>
                </ul>
              </li>
             {{--  <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-layers"></i><span class="menu-title" data-i18n="Cards">Cards</span></a>
                <ul class="menu-content">
                  <li><a href="cards-basic.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Basic Cards">Basic Cards</span></a>
                  </li>
                  <li><a href="cards-advanced.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Advanced Cards">Advanced Cards</span></a>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-map"></i><span class="menu-title" data-i18n="Maps">Maps</span></a>
                <ul class="menu-content">
                  <li><a href="map-leaflet.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Leaflet Maps">Leaflet Maps</span></a>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="Charts">Charts</span></a>
                <ul class="menu-content">
                  <li><a href="charts-apex.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Apex Charts">Apex Charts</span></a>
                  </li>
                  <li><a href="charts-chartjs.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="ChartJs">ChartJs</span></a>
                  </li>
                  <li><a href="charts-chartist.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Chartist">Chartist</span></a>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class="has-sub nav-item"><a href="javascript:;"><i class="ft-copy"></i><span class="menu-title" data-i18n="Pages">Pages</span></a>
                <ul class="menu-content">
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Authentication">Authentication</span></a>
                    <ul class="menu-content">
                      <li><a href="auth-forgot-password.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Forgot Password">Forgot Password</span></a>
                      </li>
                      <li><a href="auth-login.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Login">Login</span></a>
                      </li>
                      <li><a href="auth-register.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Register">Register</span></a>
                      </li>
                      <li><a href="auth-lock-screen.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Lock Screen">Lock Screen</span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="timeline-horizontal.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Horizontal Timeline">Horizontal Timeline</span></a>
                  </li>
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Vertical Timeline">Vertical Timeline</span></a>
                    <ul class="menu-content">
                      <li><a href="timeline-vertical-center.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Center">Center</span></a>
                      </li>
                      <li><a href="timeline-vertical-left.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Left">Left</span></a>
                      </li>
                      <li><a href="timeline-vertical-right.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Right">Right</span></a>
                      </li>
                    </ul>
                  </li>
                  <li class="has-sub"><a href="javascript:;"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Users">Users</span></a>
                    <ul class="menu-content">
                      <li><a href="page-users-list.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="List">List</span></a>
                      </li>
                      <li><a href="page-users-view.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="View">View</span></a>
                      </li>
                      <li><a href="page-users-edit.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Edit">Edit</span></a>
                      </li>
                    </ul>
                  </li>
                  <li><a href="page-account-settings.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Account Settings">Account Settings</span></a>
                  </li>
                  <li><a href="page-user-profile.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="User Profile">User Profile</span></a>
                  </li>
                  <li><a href="page-invoice.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Invoice">Invoice</span></a>
                  </li>
                  <li><a href="page-error.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Error">Error</span></a>
                  </li>
                  <li><a href="page-coming-soon.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Coming Soon">Coming Soon</span></a>
                  </li>
                  <li><a href="page-maintenance.html" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Maintenance">Maintenance</span></a>
                  </li>
                  <li><a href="page-gallery.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Gallery">Gallery</span></a>
                  </li>
                  <li><a href="page-search.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Search">Search</span></a>
                  </li>
                  <li><a href="page-faq.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="FAQ">FAQ</span></a>
                  </li>
                  <li><a href="page-knowledge-base.html"><i class="ft-arrow-right submenu-icon"></i><span class="menu-item" data-i18n="Knowledge Base">Knowledge Base</span></a>
                  </li>
                </ul>
              </li> --}}
              {{-- <li class=" nav-item"><a href="https://pixinvent.com/apex-angular-4-bootstrap-admin-template/html-documentation" target="_blank"><i class="ft-book"></i><span class="menu-title" data-i18n="Documentation">Documentation</span></a>
              </li> --}}
             {{--  <li class=" nav-item"><a href="https://pixinvent.ticksy.com/" target="_blank"><i class="ft-life-buoy"></i><span class="menu-title" data-i18n="Support">Support</span></a>
              </li> --}}
            </ul>
          </div>
        </div>
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
        <!-- / main menu-->
      </div>