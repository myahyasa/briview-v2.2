<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        {{-- INFO PROFIL --}}
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src={{ asset('assets/img/90x90.jpg') }} alt="avatar">
                {{-- <img src="../assets/img/90x90.jpg" alt="avatar"> --}}
                <h6 class="">{{ auth()->user()->name }}</h6>
                {{-- <p class="">Project Leader</p> --}}
            </div>
        </div>
        <div class="shadow-bottom"></div>
        {{-- END INFO PROFIL --}}

        <ul class="list-unstyled menu-categories" id="accordionExample">

            {{-- MENU DASHBOARD --}}
            <li class="menu">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="{{ request()->segment(1)=='dailyStatusKanwil'||request()->segment(1)=='home' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->segment(1)=='dailyStatusKanwil'||request()->segment(1)=='home' ? 'show' : '';  }}" id="dashboard" data-parent="#accordionExample">
                    <li class="{{ request()->segment(1) == 'dailyStatusKanwil' ? 'active' : '';  }}">
                        <a href="{{ route('dailyStatusKanwil.index') }}"> Daily Status Kanwil </a>
                    </li>
                    <li>
                        <a href="index2.html"> Performance FLM </a>
                    </li>
                    <li>
                        <a href="index2.html"> Performance SLM </a>
                    </li>
                </ul>
            </li>
            {{-- END DASHBOARD --}}

            {{-- BEGIN TULISAN MASTER DATA --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span class="text-primary">MASTER DATA</span></div>
            </li>
            {{-- END TULISAN MASTER DATA --}}

            {{-- BEGIN MASTER VENDOR --}}
            <li class="menu">
                @hasanyrole('admin|vendor1')
                <a href="{{ route('masterVendor.index') }}" aria-expanded="{{ request()->segment(1) == 'masterVendor' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Master Vendor</span>
                    </div>
                </a>
                @endhasanyrole
            </li>
            {{-- AND MASTER VENDOR --}}

            {{-- BEGIN MASTER LOKASI --}}
            <li class="menu">
                <a href="#master_lokasi" data-toggle="collapse"
                    aria-expanded="{{ request()->segment(1)=='masterKanwil'||request()->segment(1)=='masterKcSupervisi'||request()->segment(1)=='masterUker'||request()->segment(1)=='masterLokasiCrm'||request()->segment(1)=='masterKodePos' ? 'true' : '';  }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Master Lokasi</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->segment(1)=='masterKanwil'||request()->segment(1)=='masterKcSupervisi'||request()->segment(1)=='masterUker'||request()->segment(1)=='masterLokasiCrm'||request()->segment(1)=='masterKodePos' ? 'show' : '';  }}"
                    id="master_lokasi" data-parent="#accordionExample">
                    <li class="{{ request()->segment(1) == 'masterKanwil' ? 'active' : '';  }}">
                        <a href="{{ route('masterKanwil.index') }}"> Master Kanwil </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'masterKcSupervisi' ? 'active' : '';  }}">
                        <a href="{{ route('masterKcSupervisi.index') }}"> Master Kc Supervisi </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'masterUker' ? 'active' : '';  }}">
                        <a href="{{ route('masterUker.index') }}"> Master Uker </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'masterLokasiCrm' ? 'active' : '';  }}">
                        <a href="{{ route('masterLokasiCrm.index') }}"> Master Lokasi CRM </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'masterKodePos' ? 'active' : '';  }}">
                        <a href="{{ route('masterKodePos.index') }}"> Master Kode Pos </a>
                    </li>
                </ul>
            </li>
            {{-- END MASTER LOKASI --}}

            {{-- BEGIN MASTER CRM --}}
            <li class="menu">
                <a href="#master_crm" data-toggle="collapse"
                    aria-expanded="{{ request()->segment(1)=='machineInfo'||request()->segment(1)=='tidAllocation'||request()->segment(1)=='digitalSignage'||request()->segment(1)=='cctv'||request()->segment(1)=='ups'||request()->segment(1)=='nvr'||request()->segment(1)=='croAllocation'||request()->segment(1)=='detailParameterTid' ? 'true' : '';  }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Master CRM</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->segment(1)=='machineInfo'||request()->segment(1)=='tidAllocation'||request()->segment(1)=='digitalSignage'||request()->segment(1)=='cctv'||request()->segment(1)=='ups'||request()->segment(1)=='nvr'||request()->segment(1)=='croAllocation'||request()->segment(1)=='detailParameterTid' ? 'show' : 'hidden';  }}"
                    id="master_crm" data-parent="#accordionExample">
                    <li class="{{ request()->segment(1) == 'machineInfo' ? 'active' : '';  }}">
                        <a href="{{ route('machineInfo.index') }}"> Machine Info (SLM) </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'tidAllocation' ? 'active' : '';  }}">
                        <a href="{{ route('tidAllocation.index') }}"> TID Allocation </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'digitalSignage' ? 'active' : '';  }}">
                        <a href="{{ route('digitalSignage.index') }}"> Digital Signage </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'cctv' ? 'active' : '';  }}">
                        <a href="{{ route('cctv.index') }}"> CCTV </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'ups' ? 'active' : '';  }}">
                        <a href="{{ route('ups.index') }}"> UPS </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'nvr' ? 'active' : '';  }}">
                        <a href="{{ route('nvr.index') }}"> NVR </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'croAllocation' ? 'active' : '';  }}">
                        <a href="{{ route('croAllocation.index') }}"> CRO Allocation </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'detailParameterTid' ? 'active' : '';  }}">
                        <a href=""> Detail Parameter TID </a>
                    </li>
                </ul>
            </li>
            {{-- END MASTER CRM --}}

            {{-- BEGIN Master SLA --}}
            <li class="menu">
                <a href="#master_sla" data-toggle="collapse"
                    aria-expanded="{{ request()->segment(1)=='master_service_point'||request()->segment(1)=='master_jarak_tempuh'||request()->segment(1)=='master_sla_problem'||request()->segment(1)=='mapping_ticket_to_rtl'||request()->segment(1)=='sla_tid' ? 'true' : '';  }}"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Master SLA</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled {{ request()->segment(1)=='master_service_point'||request()->segment(1)=='master_jarak_tempuh'||request()->segment(1)=='master_sla_problem'||request()->segment(1)=='mapping_ticket_to_rtl'||request()->segment(1)=='sla_tid' ? 'show' : '';  }}"
                    id="master_sla" data-parent="#accordionExample">
                    <li class="{{ request()->segment(1) == 'master_service_point' ? 'active' : '';  }}">
                        <a href=""> Master Service Point </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'master_jarak_tempuh' ? 'active' : '';  }}">
                        <a href=""> Master Jarak Tempuh </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'master_sla_problem' ? 'active' : '';  }}">
                        <a href=""> Master SLA Problem </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'mapping_ticket_to_rtl' ? 'active' : '';  }}">
                        <a href=""> Mapping Ticket to RTL </a>
                    </li>
                    <li class="{{ request()->segment(1) == 'sla_tid' ? 'active' : '';  }}">
                        <a href=""> SLA TID </a>
                    </li>
                </ul>
            </li>
            {{-- END MASTER SLA --}}

            {{-- BEGIN TARGET PERFORMANCE --}}
            <li class="menu">
                <a href="" aria-expanded="{{ request()->segment(1) == 'target_performance' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Target Performance</span>
                    </div>
                </a>
            </li>
            {{-- END TARGET PERFORMANCE --}}


            {{-- BEGIN RELOKASI --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span class="text-primary"> RELOKASI </span></div>
            </li>

            <li class="menu">
                <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                        <span> Pengajuan Relokasi </span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#approval" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span> Approval </span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="approval" data-parent="#accordionExample">
                    <li>
                        <a href="element_alerts.html"> History Pengajuan </a>
                    </li>
                </ul>
            </li>
            {{-- END RELOKASI --}}


            {{-- BEGIN SANGGAHAN --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span class="text-primary"> SANGGAHAN </span></div>
            </li>

            <li class="menu">
                <a href="fonticons.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                        <span> Pengajuan Sanggahan </span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                        <span>Approval</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
                    <li>
                        <a href="pages_helpdesk.html"> History Pengajuan </a>
                    </li>
                </ul>
            </li>
            {{-- END SANGGAHAN --}}

            {{-- BEGIN MANAJEMEN TIKET --}}
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span class="text-primary">MANAJEMEN TIKET</span></div>
            </li>

            <li class="menu">
                <a href="dragndrop_dragula.html" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move">
                            <polyline points="5 9 2 12 5 15"></polyline>
                            <polyline points="9 5 12 2 15 5"></polyline>
                            <polyline points="15 19 12 22 9 19"></polyline>
                            <polyline points="19 9 22 12 19 15"></polyline>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <line x1="12" y1="2" x2="12" y2="22"></line>
                        </svg>
                        <span>Manajemen Ticket</span>
                    </div>
                </a>
            </li>
            {{-- END MANAJEMEN TIKET --}}

            {{-- BEGIN MENU ADMIN --}}
            @role('admin')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span class="text-primary">ADMIN</span></div>
            </li>

            <li class="menu">
                <a href="{{ route('admin.users.index') }}" aria-expanded="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'users' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Users</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('admin.roles.index') }}" aria-expanded="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'roles' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Roles</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('admin.permissions.index') }}" aria-expanded="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'permissions' ? 'true' : '';  }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                            <line x1="1" y1="1" x2="23" y2="23"></line>
                        </svg>
                        <span>Permission</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="{{ route('telescope.getData') }}" aria-expanded="{{ request()->segment(1) == 'admin' && request()->segment(2) == 'telescope' ? 'true' : '';  }}" class="dropdown-toggle" target="_blank" rel="noopener noreferrer">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-rotate-ccw">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                        </svg>
                        <span>Log Operasi</span>
                    </div>
                </a>
            </li>
            @endrole
            {{-- END MENU ADMIN --}}
        </ul>

    </nav>

</div>
