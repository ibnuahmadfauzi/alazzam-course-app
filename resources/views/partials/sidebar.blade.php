{{-- SideBar --}}
<div class="card">
    <div class="card-body">
        <div class="text-center text-primary fs-1">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
        </div>
        <h4 class="fw-bold text-primary text-center">
            {{ $_SESSION['account_id'] }}
        </h4>
        <h5 class="text-center">
            <span class="bg-primary text-light fw-bold px-3 rounded-2">
                {{ $_SESSION['account_role'] }}
            </span>
        </h5>
        <hr>
        <div>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="/dashboard" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-tachometer" aria-hidden="true"></i></span> Dashboard</a>
                </li>
                <li class="list-group-item">
                    <a href="/kuis" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-list-alt" aria-hidden="true"></i></span> Kuis</a>
                </li>
                <li class="list-group-item">
                    <a href="" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-sticky-note" aria-hidden="true"></i></span> Materi</a>
                </li>
                <li class="list-group-item">
                    <a href="/nilai" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-star" aria-hidden="true"></i></span> Nilai</a>
                </li>
                <li class="list-group-item">
                    <a href="/pengajar" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-users" aria-hidden="true"></i></span> Pengajar</a>
                </li>
                <li class="list-group-item">
                    <a href="/siswa" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span> Siswa</a>
                </li>
                <li class="list-group-item">
                    <a href="" class="text-decoration-none text-secondary"><span style="width: 20px; display: inline-block;"><i class="fa fa-heart" aria-hidden="true"></i></span> Orang Tua</a>
                </li>
            </ul>
        </div>
        <hr>
        <div>
            <div class="row d-flex justify-content-center">
                <a href="/logout" class="btn btn-outline-danger col-lg-8"><i class="fa fa-power-off" aria-hidden="true"></i> KELUAR</a>
            </div>
        </div>
    </div>
</div>
{{-- end SideBar --}}
