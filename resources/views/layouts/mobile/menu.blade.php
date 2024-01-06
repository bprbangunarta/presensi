<!-- App Bottom Menu -->
@include('layouts.bottomNav')
<!-- * App Bottom Menu -->

<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <!-- profile box -->
                <div class="profileBox pt-2 pb-2">
                    <div class="image-wrapper">
                        <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged  w36">
                    </div>
                    <div class="in">
                        <strong>{{ Auth::guard('karyawan')->user()->nama_lengkap }}</strong>
                        <div class="text-muted">{{ Auth::guard('karyawan')->user()->nik }}</div>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->

                <!-- menu -->
                <div class="listview-title">Menu</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="map-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Lokasi
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="alert-circle-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Manual
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Karyawan
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="alarm-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Jam Kerja
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * menu -->

            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->
