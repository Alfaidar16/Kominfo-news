   <div class="sidebar-wrapper">
                    <nav class="mt-2">
                        <!--begin::Sidebar Menu-->
                        <ul
                            class="nav sidebar-menu flex-column"
                            data-lte-toggle="treeview"
                            role="menu"
                            data-accordion="false"
                        >
                        <li class="nav-item">
                                        <a
                                            href="{{ route('dashboard') }}"
                                            class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-speedometer"></i>
                                            <p>Dashboard</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('banner.index') }}"
                                            class="nav-link {{ Request::is('banner.index*') ? 'active' : '' }}"
                                        >
                                            <i class="bi bi-aspect-ratio"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a
                                            href="{{ route('category.index') }}"
                                            class="nav-link {{ Request::is('category.index*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-file-post-fill"></i>
                                            <p>Kategori Berita</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('post.index') }}"
                                            class="nav-link {{ Request::is('post.index*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-postcard"></i>
                                            <p>Posts</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('halaman.index') }}"
                                            class="nav-link {{ Request::is('halaman.index*') ? 'active' : '' }}"
                                        >
                                          <i class="bi bi-mailbox2"></i>
                                            <p>Pages</p>
                                        </a>
                                    </li>

                                      <li class="nav-item">
                                        <a
                                            href="{{ route('kegiatan.index') }}"
                                            class="nav-link {{ Request::is('kegiatan.index*') ? 'active' : '' }}"
                                        >
                                            <i class="bi bi-sticky"></i>
                                            <p>Gallery Kegiatan</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('video_kegiatan.index') }}"
                                            class="nav-link {{ Request::is('video_kegiatan.index*') ? 'active' : '' }}"
                                        >
                                          <i class="bi bi-file-play"></i>
                                            <p>Video Kegiatan</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('regulasi.index') }}"
                                            class="nav-link {{ Request::is('regulasi.index*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-stickies"></i>
                                            <p>Dokumen Regulasi</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('informasi_publik.index') }}"
                                            class="nav-link {{ Request::is('informasi_publik.index*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-info-circle"></i>
                                            <p>Informasi Publik</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('daftar_permohonan.informasi') }}"
                                            class="nav-link {{ Request::is('daftar_permohonan.informasi*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-send-arrow-down-fill"></i>
                                            <p>Permohonan Informasi</p>
                                        </a>
                                    </li>
                                      
                                     <li class="nav-item">
                                        <a
                                            href="{{ route('daftar_permohonan.pengajuanKeberatan') }}"
                                            class="nav-link {{ Request::is('daftar_permohonan.pengajuanKeberatan*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-book"></i>
                                            <p> Pengajuan Keberatan</p>
                                        </a>
                                    </li>

                                       <li class="nav-item">
                                        <a
                                            href="{{ route('profil.sambutan') }}"
                                            class="nav-link {{ Request::is('profil.sambutan*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-book"></i>
                                            <p>Sambutan Kepala</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a
                                            href="{{ route('profil.website') }}"
                                            class="nav-link {{ Request::is('profil.website*') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-book"></i>
                                            <p>Profil Website</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('menuList.index') }}"
                                            class="nav-link {{ Request::is('menuList.index*') ? 'active' : '' }}"
                                        >
                                          <i class="bi bi-blockquote-left"></i>
                                            <p>Menu</p>
                                        </a>
                                    </li>

                                     <li class="nav-item">
                                        <a
                                            href="{{ route('user.index') }}"
                                            class="nav-link {{ Request::is('user.index') ? 'active' : '' }}"
                                        >
                                           <i class="bi bi-person-lines-fill"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                        </ul>
                        <!--end::Sidebar Menu-->
                    </nav>
                </div>