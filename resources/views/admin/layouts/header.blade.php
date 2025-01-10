  <nav class="app-header navbar navbar-expand bg-body">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Start Navbar Links-->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                data-lte-toggle="sidebar"
                                href="#"
                                role="button"
                            >
                                <i class="bi bi-list"></i>
                            </a>
                        </li>
                      
                    </ul>
                    <!--end::Start Navbar Links-->
                    <!--begin::End Navbar Links-->
                    <ul class="navbar-nav ms-auto">
                        <!--begin::Navbar Search-->
                      
                        <!--end::Navbar Search-->
                        <!--begin::Messages Dropdown Menu-->
                       
                        <!--end::Messages Dropdown Menu-->
                        <!--begin::Notifications Dropdown Menu-->
                      
                        <!--end::Notifications Dropdown Menu-->
                        <!--begin::Fullscreen Toggle-->
                        <li class="nav-item d-flex">
                             <a
                                class="nav-link  pt-4"
                                href="#"
                                data-lte-toggle="fullscreen"
                            >
                                <i
                                    data-lte-icon="maximize"
                                    class="bi bi-arrows-fullscreen "
                                ></i>
                                <i
                                    data-lte-icon="minimize"
                                    class="bi bi-fullscreen-exit"
                                    style="display: none"
                                ></i>
                            </a>
                             <div class="imagess-profile" >
                            {{ substr(Auth::user()->name, 0, 1) }}
                         </div>
                           
                        </li>
                        <!--end::Fullscreen Toggle-->
                        <!--begin::User Menu Dropdown-->
                        <li class="nav-item dropdown user-menu">
                            <a
                                href="#"
                                class="nav-link dropdown-toggle pt-3"
                                data-bs-toggle="dropdown"
                            >
                       
                                {{-- <img
                                    src="{{ asset('/adminlte/assets/img/AdminLTEFullLogo.png') }}"
                                    class="user-image rounded-circle shadow"
                                    alt="User Image"
                                /> --}}
                                {{-- {{ substr(Auth::user()->name, 0, 1) }} --}}
                                <span class="d-none d-md-inline "
                                    >{{ Auth::user()->name }}</span
                                >
                            </a>
                            <ul
                                class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
                            >
                                <!--begin::User Image-->
                                <li class="user-header text-bg-primary">
                                    <img
                                        src="{{ asset('/adminlte/assets/img/user2-160x160.jpg') }}"
                                        class="rounded-circle shadow"
                                        alt="User Image"
                                    />
                                    <p>
                                       {{ Auth::user()->name }}
                                    </p>
                                        {{-- <small>Member since Nov. 2023</small> --}}
                                    </p>
                                </li>
                                <!--end::User Image-->
                                
                                <!--begin::Menu Footer-->
                                <li class="user-footer d-flex">
                                    <a href="#" class="btn btn-default btn-flat"
                                        >Profile</a
                                    >
                                    <form action="{{ route('logout') }}" method="Post" >
										@csrf
										<button type="submit" class="border-0 bg-white btn btn-default btn-flat text-end pt-2">Logout</button>
									</form>
                                   
                                </li>
                                <!--end::Menu Footer-->
                            </ul>
                        </li>
                        <!--end::User Menu Dropdown-->
                    </ul>
                    <!--end::End Navbar Links-->
                </div>
                <!--end::Container-->
            </nav>