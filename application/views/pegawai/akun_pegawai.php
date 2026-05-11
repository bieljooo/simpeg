<!-- Breadcrumb -->
<nav class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('dashboard_petugas') ?>">Home</a></li>
        <li class="breadcrumb-item">Master Data</li>
        <li class="breadcrumb-item active">Akun Pegawai</li>
    </ol>
</nav>

<div class="card card-flat-shell">
    <div class="card-header">
        <h3><iconify-icon icon="mdi:account-key-outline" class="mr-2"></iconify-icon>Akun Pegawai</h3>
    </div>
    <div class="card-body p-0">
        <div class="table-shell-full">
            <table id="dataTable" class="table table-bordered table-hover table-pegawai-full" style="width:100%" data-dt-search="true" data-dt-preserve-order="true">
                <thead>
                    <tr>
                        <th style="width:40px">No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th style="width:160px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($akun_pegawai as $akun): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><strong><?= htmlspecialchars($akun->nama, ENT_QUOTES, 'UTF-8') ?></strong></td>
                            <td><code><?= htmlspecialchars($akun->nip, ENT_QUOTES, 'UTF-8') ?></code></td>
                            <td class="text-center">
                                <a href="<?= site_url('pegawai/ubah_password_akun/' . $akun->nip) ?>" class="btn btn-action-edit btn-sm" title="Update Password">
                                    <iconify-icon icon="mdi:key-outline"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
