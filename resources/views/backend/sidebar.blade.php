<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="/" class="waves-effect">
                                    <i class="mdi mdi-home-variant"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Components</li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-briefcase-check"></i> <span> Transaksi <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="{{route('transaksi.create')}}">Tambah Transaksi</a></li>
                                    <li><a href="{{route('transaksi.index')}}">Riwayat Transaksi</a></li>
                                    <!-- <li><a href="{{route('transaksi.rekap')}}">Rekap Transaksi</a></li> -->
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-buffer"></i> <span> Kelas <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="/kelas">List Kelas</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-human-child"></i> <span> Siswa <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="/siswa">List Siswa</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Tabungan <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="/tabungan">List Tabungan</a></li>
                                </ul>
                            </li>


                            <li class="menu-title">Extras</li>

                            <li>
                                <a href="/user" class="waves-effect">
                                    <i class="mdi mdi-account"></i> <span> Users </span>
                                </a>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->