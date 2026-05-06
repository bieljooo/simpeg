<!-- Breadcrumb -->
<nav class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Home</a></li>
        <li class="breadcrumb-item active">Pengajuan Surat</li>
        <li class="breadcrumb-item active">Download Surat</li>
    </ol>
</nav>

<?php $total_surat = count($surat_pegawai); ?>

<div class="row mb-4">
    <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
        <div class="card">
            <div class="card-body d-flex align-items-center">
                <div style="width:45px;height:45px;border-radius:10px;background:#ebf4ff;display:flex;align-items:center;justify-content:center;margin-right:14px">
                    <i class="fas fa-file-pdf" style="font-size:20px;color:#3182ce"></i>
                </div>
                <div>
                    <div style="font-size:22px;font-weight:700;color:#2d3748"><?= $total_surat ?></div>
                    <div style="font-size:12px;color:#a0aec0;font-weight:500">Total Surat Saya</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-download mr-2"></i>Download Surat</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th style="width:40px">No</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Izin</th>
                        <th>Penandatangan</th>
                        <th>Dibuat</th>
                        <th style="width:120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($surat_pegawai)): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">Belum ada surat yang bisa diunduh.</td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($surat_pegawai as $item): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <strong>Surat Keterangan Sakit</strong>
                                    <br><small class="text-muted text-capitalize"><?= htmlspecialchars($item->jenis, ENT_QUOTES, 'UTF-8') ?></small>
                                </td>
                                <td><?= $item->tanggal_surat ? date('d/m/Y', strtotime($item->tanggal_surat)) : '-' ?></td>
                                <td><?= $item->tanggal_izin ? date('d/m/Y', strtotime($item->tanggal_izin)) : '-' ?></td>
                                <td><?= htmlspecialchars($item->penandatangan_nama ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= $item->created_at ? date('d/m/Y H:i', strtotime($item->created_at)) : '-' ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('pengajuan_surat/unduh_surat_keterangan_sakit/' . $item->id) ?>" class="btn btn-primary btn-sm" title="Unduh PDF">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
