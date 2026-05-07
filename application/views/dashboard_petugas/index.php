<!-- Breadcrumb -->
<nav class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</nav>

<div class="row state-overview-row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="small-box small-box-primary">
            <div class="inner">
                <h3><?= (int) $total_pegawai ?></h3>
                <p>Total Pegawai</p>
            </div>
            <div class="icon">
                <iconify-icon icon="mdi:badge-account-horizontal-outline"></iconify-icon>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="small-box small-box-info">
            <div class="inner">
                <h3><?= (int) $total_laki ?></h3>
                <p>Laki-laki</p>
            </div>
            <div class="icon">
                <iconify-icon icon="mdi:gender-male"></iconify-icon>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="small-box small-box-pink">
            <div class="inner">
                <h3><?= (int) $total_perempuan ?></h3>
                <p>Perempuan</p>
            </div>
            <div class="icon">
                <iconify-icon icon="mdi:gender-female"></iconify-icon>
            </div>
        </div>
    </div>
</div>
