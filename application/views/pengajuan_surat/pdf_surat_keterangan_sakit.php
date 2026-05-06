<?php
$format_nip = function ($nip) {
    $angka = preg_replace('/\D+/', '', (string) $nip);

    if (strlen($angka) !== 18) {
        return $nip;
    }

    return substr($angka, 0, 8) . ' ' . substr($angka, 8, 6) . ' ' . substr($angka, 14, 1) . ' ' . substr($angka, 15, 3);
};
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Sakit</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
            line-height: 1.45;
            margin: 0;
        }

        .page {
            padding: 28px 34px 24px;
        }

        .kop {
            margin-bottom: 10px;
        }

        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-table td {
            vertical-align: top;
        }

        .kop-logo {
            width: 70px;
            padding-top: 2px;
        }

        .kop-logo img {
            width: 56px;
            height: auto;
        }

        .kop-text {
            text-align: center;
            padding-right: 38px;
        }

        .kop-line {
            border-bottom: 3px solid #000;
            margin-top: 8px;
            margin-bottom: 18px;
        }

        .kop h1,
        .kop h2,
        .kop h3,
        .kop p {
            margin: 0;
        }

        .kop h1 {
            font-size: 14px;
            font-weight: 700;
        }

        .kop h2 {
            font-size: 18px;
            font-weight: 700;
        }

        .kop h3 {
            font-size: 18px;
            font-weight: 700;
        }

        .kop p {
            font-size: 10px;
        }

        .title {
            text-align: center;
            margin-bottom: 18px;
        }

        .title h4 {
            margin: 0;
            font-size: 15px;
            text-decoration: underline;
            font-family: DejaVu Serif, serif;
        }

        .title p {
            margin: 2px 0 0;
        }

        .lead {
            margin: 0 0 10px;
        }

        .detail-table {
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        .detail-table td {
            padding: 1px 0;
            vertical-align: top;
        }

        .detail-table .label {
            width: 145px;
        }

        .detail-table .colon {
            width: 14px;
        }

        .paragraph {
            text-align: justify;
            margin: 10px 0;
            text-indent: 32px;
        }

        .signature {
            width: 265px;
            margin-left: auto;
            margin-top: 20px;
        }

        .signature-space {
            height: 62px;
        }

        .signature strong {
            display: block;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="kop">
            <table class="kop-table">
                <tr>
                    <td class="kop-logo">
                        <?php if (!empty($logo_data_uri)): ?>
                            <img src="<?= $logo_data_uri ?>" alt="Logo">
                        <?php endif; ?>
                    </td>
                    <td class="kop-text">
                        <h1><?= htmlspecialchars($header_lines[0], ENT_QUOTES, 'UTF-8') ?></h1>
                        <h2><?= htmlspecialchars($header_lines[1], ENT_QUOTES, 'UTF-8') ?></h2>
                        <h3><?= htmlspecialchars($header_lines[2], ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($header_lines[3], ENT_QUOTES, 'UTF-8') ?></p>
                        <p><?= htmlspecialchars($header_lines[4], ENT_QUOTES, 'UTF-8') ?></p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="kop-line"></div>

        <div class="title">
            <h4>SURAT KETERANGAN</h4>
            <p>Nomor : </p>
        </div>

        <p class="lead">Yang bertanda tangan dibawah ini :</p>

        <table class="detail-table">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($penandatangan->nama, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td class="label">NIP.</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($format_nip($penandatangan->nip), ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td class="label">Pangkat/Golongan</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($penandatangan->pangkat_terakhir ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td class="label">Jabatan</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($penandatangan->jabatan ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        </table>

        <p class="lead">Menerangkan</p>

        <table class="detail-table">
            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($pegawai->nama, ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td class="label">NIP.</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($format_nip($pegawai->nip), ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
            <tr>
                <td class="label">Jabatan</td>
                <td class="colon">:</td>
                <td><?= htmlspecialchars($pegawai->jabatan ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        </table>

        <p class="paragraph"><?= htmlspecialchars($kalimat_surat, ENT_QUOTES, 'UTF-8') ?></p>
        <p class="paragraph">Demikian surat keterangan ini dibuat untuk digunakan seperlunya.</p>

        <div class="signature">
            <div>Tomohon, <?= htmlspecialchars($tanggal_surat_indonesia, ENT_QUOTES, 'UTF-8') ?></div>
            <div><?= htmlspecialchars($penandatangan->jabatan ?: '-', ENT_QUOTES, 'UTF-8') ?></div>
            <div class="signature-space"></div>
            <strong><?= htmlspecialchars($penandatangan->nama, ENT_QUOTES, 'UTF-8') ?></strong>
            <div><?= htmlspecialchars($penandatangan->pangkat_terakhir ?: '-', ENT_QUOTES, 'UTF-8') ?></div>
            <div>NIP. <?= htmlspecialchars($format_nip($penandatangan->nip), ENT_QUOTES, 'UTF-8') ?></div>
        </div>
    </div>
</body>
</html>
