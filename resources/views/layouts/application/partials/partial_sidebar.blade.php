<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="{{ route('Dashboard.Index') }}">
            <img alt="Logo" src="{{ asset('assets/custom/media/logo_dark.svg') }}" class="h-45px app-sidebar-logo-default theme-dark-show"/>
            <img alt="Logo" src="{{ asset('assets/custom/media/logo.svg') }}" class="h-45px app-sidebar-logo-default theme-light-show"/>
            <img alt="Logo" src="{{ asset('assets/custom/media/default-small-dark.svg') }}" class="h-20px app-sidebar-logo-minimize"/>
        </a>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                    <div data-kt-menu-trigger="click"  class="menu-item here show menu-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ (request()->is('/' )) ? 'active' : '' }}" href="{{ route('Dashboard.Index') }}">
                            <span class="menu-icon">
                                    <i class="ki-solid ki-home fs-2"></i>
                            </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.01') }}</span>
                            </a>
                        </div>

                        @if(Auth()->user()->can('Kullanıcıları Görüntüleme') or Auth()->user()->can('Kullanıcı Rollerini Görüntüleme') or Auth()->user()->can('Kullanıcı İzinlerini Görüntüleme') or Auth()->user()->can('Kullanıcı Hareketlerini Görüntüleme'))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('users', 'users/create', 'users/*/edit', 'roles', 'roles/create', 'roles/*/edit', 'permissions', 'permissions/create', 'permissions/*/edit', 'activitylogs')) ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-solid ki-share fs-2"></i>
                                </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.02') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('Kullanıcıları Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('users', 'users/create', 'users/*/edit')) ? 'active' : '' }}" href="{{ route('Users.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.02.01') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Kullanıcı Rollerini Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('roles', 'roles/create', 'roles/*/edit')) ? 'active' : '' }}" href="{{ route('Roles.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.02.02') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Kullanıcı İzinlerini Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('permissions', 'permissions/create', 'permissions/*/edit')) ? 'active' : '' }}" href="{{ route('Permissions.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.02.03') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Kullanıcı Hareketlerini Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('activitylogs')) ? 'active' : '' }}" href="{{ route('ActivityLogs.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.02.04') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @endif

                        @if(Auth()->user()->can('Müşterileri Görüntüleme'))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('clients', 'clients/create', 'clients/*/edit')) ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-solid ki-security-user fs-2"></i>
                                </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.03') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('Müşterileri Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('clients', 'clients/create', 'clients/*/edit')) ? 'active' : '' }}" href="{{ route('Clients.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.03.01') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @endif

                        @if(Auth()->user()->can('Departmanları Görüntüleme') or Auth()->user()->can('Personelleri Görüntüleme'))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('departments', 'departments/create', 'departments/*/edit', 'employees', 'employees/create', 'employees/*/edit')) ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-solid ki-profile-user fs-2"></i>
                                </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.04') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('Departmanları Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('departments', 'departments/create', 'departments/*/edit')) ? 'active' : '' }}" href="{{ route('CompanyDepartments.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.04.02') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('Personelleri Görüntüleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('employees', 'employees/create', 'employees/*/edit')) ? 'active' : '' }}" href="{{ route('Employees.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.04.03') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        @endif

                        @if(Auth()->user()->can('Veri Kategorilerini Görüntüleme') or Auth()->user()->can('Veri Türlerini Görüntüleme') or Auth()->user()->can('İdari ve Teknik Tedbirleri Görüntüleme') or Auth()->user()->can('Veri Setlerini Görüntüleme') or Auth()->user()->can('Envanter Oluşturmayı Görüntüleme') or Auth()->user()->can('Veri İşleme Amaçlarını Görüntüleme'))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('inventorycategories', 'inventorycategories/create', 'inventorycategories/*/edit', 'inventorydatatypes', 'inventorydatatypes/create', 'inventorydatatypes/*/edit', 'kvkkprecautions', 'kvkkprecautions/create', 'kvkkprecautions/*/edit', 'inventorydatasets', 'inventorydatasets/create', 'inventorydatasets/*/edit', 'dataholdreasons', 'dataholdreasons/create', 'dataholdreasons/*/edit', 'inventorygenerates')) ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-solid ki-profile-user fs-2"></i>
                                </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @can('Veri Kategorilerini Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('inventorycategories', 'inventorycategories/create', 'inventorycategories/*/edit')) ? 'active' : '' }}" href="{{ route('InventoryCategories.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.01') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Veri Türlerini Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('inventorydatatypes', 'inventorydatatypes/create', 'inventorydatatypes/*/edit')) ? 'active' : '' }}" href="{{ route('InventoryDataTypes.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.02') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Veri İşleme Amaçlarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('dataholdreasons', 'dataholdreasons/create', 'dataholdreasons/*/edit')) ? 'active' : '' }}" href="{{ route('DataHoldReasons.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.06') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('İdari ve Teknik Tedbirleri Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('kvkkprecautions', 'kvkkprecautions/create', 'kvkkprecautions/*/edit')) ? 'active' : '' }}" href="{{ route('KVKKPrecautions.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.03') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Veri Setlerini Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('inventorydatasets', 'inventorydatasets/create', 'inventorydatasets/*/edit')) ? 'active' : '' }}" href="{{ route('InventoryDataSets.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.04') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Envanter Oluşturmayı Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('inventorygenerates')) ? 'active' : '' }}" href="{{ route('InventoryGenerates.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.10.05') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Doküman Yönetimi Görüntüleme') or Auth()->user()->can('KVKK Dokümanlarını Görüntüleme'))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('companydocuments', 'companydocuments/create', 'companydocuments/*/edit', 'kvkkdocuments')) ? 'here show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-emoji-happy fs-2" style="margin-top: -2px;"></i>
                                    </span>
                                    <span class="menu-title">{{ __('messages.partial.sidebar.menu.05') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @can('Doküman Yönetimi Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('companydocuments', 'companydocuments/create', 'companydocuments/*/edit')) ? 'active' : '' }}" href="{{ route('CompanyDocuments.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.05.01') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('KVKK Dokümanlarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('kvkkdocuments')) ? 'active' : '' }}" href="{{ route('CompanyDocuments.KVKKDocuments') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.05.02') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Denetim Yönetimi Görüntüleme') or Auth()->user()->can('Denetim Raporlarını Görüntüleme'))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('companycontrolreports', 'companycontrolreports/create', 'companycontrolreports/*/edit', 'controlreports')) ? 'here show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-questionnaire-tablet fs-2" style="margin-top: -1px;"></i>
                                    </span>
                                    <span class="menu-title">{{ __('messages.partial.sidebar.menu.06') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @can('Denetim Yönetimi Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('companycontrolreports', 'companycontrolreports/create', 'companycontrolreports/*/edit')) ? 'active' : '' }}" href="{{ route('CompanyControlReports.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.06.01') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Denetim Raporlarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('controlreports')) ? 'active' : '' }}" href="{{ route('CompanyControlReports.ControlReports') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.06.02') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Akademi Yönetimi Görüntüleme') or Auth()->user()->can('Eğitim Dokümanlarını Görüntüleme') or Auth()->user()->can('Eğitim Sunumlarını Görüntüleme') or Auth()->user()->can('Eğitim Videolarını Görüntüleme'))
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('academymanagement', 'academymanagement/create', 'academymanagement/*/edit', 'academycontent/documents', 'academycontent/presentations', 'academycontent/videos')) ? 'here show' : '' }}">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-brifecase-tick fs-2" style="margin-top: -1px;"></i>
                                    </span>
                                    <span class="menu-title">{{ __('messages.partial.sidebar.menu.07') }}</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @can('Akademi Yönetimi Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('academymanagement', 'academymanagement/create', 'academymanagement/*/edit')) ? 'active' : '' }}" href="{{ route('AcademyContents.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.07.01') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Eğitim Dokümanlarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('academycontent/documents')) ? 'active' : '' }}" href="{{ route('AcademyContents.Documents.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.07.02') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Eğitim Sunumlarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('academycontent/presentations')) ? 'active' : '' }}" href="{{ route('AcademyContents.Presentations.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.07.03') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                    @can('Eğitim Videolarını Görüntüleme')
                                        <div class="menu-item">
                                            <a class="menu-link {{ (request()->is('academycontent/videos')) ? 'active' : '' }}" href="{{ route('AcademyContents.Videos.Index') }}" style="padding: 0.25rem 1rem;">
                                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.07.04') }}</span>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Uyum Testi Yönetimi Görüntüleme'))
                            <div class="menu-item">
                                <a class="menu-link {{ (request()->is('gdpradaptation', 'gdpradaptation/create', 'gdpradaptation/*/edit')) ? 'active' : '' }}" href="{{ route('GDPRAdaptationQuestions.Index') }}">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-element-5 fs-2" style="margin-top: -2px;"></i>
                                    </span>
                                    <span class="menu-title">{{ __('messages.partial.sidebar.menu.08') }}</span>
                                </a>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Web Kod Altyapısı Görüntüleme'))
                            <div class="menu-item">
                                <a class="menu-link {{ (request()->is('webcodebase' )) ? 'active' : '' }}" href="{{ route('WebCodeBase.Index') }}">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-code fs-2" style="margin-top: -2px;"></i>
                                    </span>
                                    <span class="menu-title">{{ __('messages.partial.sidebar.menu.09') }}</span>
                                </a>
                            </div>
                        @endif

                        @if(Auth()->user()->can('Genel Ayarları Düzenleme') or Auth()->user()->can('Sistem Ayarlarını Düzenleme'))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ (request()->is('systemsettings', 'generalsettings')) ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-solid ki-gear fs-2"></i>
                                </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.96') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                @can('Genel Ayarları Düzenleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('generalsettings')) ? 'active' : '' }}" href="{{ route('GeneralSettings.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.97') }}</span>
                                        </a>
                                    </div>
                                @endcan
                                    @can('Sistem Ayarlarını Düzenleme')
                                    <div class="menu-item">
                                        <a class="menu-link {{ (request()->is('systemsettings')) ? 'active' : '' }}" href="{{ route('SystemSettings.Index') }}" style="padding: 0.25rem 1rem;">
                                            <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                            <span class="menu-title">{{ __('messages.partial.sidebar.menu.98') }}</span>
                                        </a>
                                    </div>
                                    @endcan
                            </div>
                        </div>
                        @endif

                        <div class="menu-item">
                            <a class="menu-link {{ (request()->is('/home' )) ? 'active' : '' }}" href="{{ route('Frontend.Home') }}" target="_blank">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-abstract-39 fs-2" style="margin-top: -2px;"></i>
                                    </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.95') }}</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="menu-icon">
                                <i class="bi bi-x-octagon-fill fs-3" style="padding-top: 1px;"></i>
                            </span>
                                <span class="menu-title">{{ __('messages.partial.sidebar.menu.99') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="#" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100">
            <span class="btn-label">{{ __('messages.partial.sidebar.01') }}</span>
            <i class="ki-solid ki-document btn-icon fs-2 m-0"></i>
        </a>
    </div>
</div>
