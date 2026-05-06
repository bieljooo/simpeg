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
        @page {
            margin: 21pt 35pt 10pt 72pt;
        }

        body {
            font-family: Helvetica, DejaVu Sans, sans-serif;
            font-size: 11pt;
            color: #000;
            line-height: 1.15;
            margin: 0;
        }

        .page {
            margin: 0;
        }

        .kop {
            margin-bottom: 2px;
        }

        .kop-table {
            width: 100%;
            border-collapse: collapse;
        }

        .kop-table td {
            vertical-align: top;
        }

        .kop-logo {
            width: 94px;
            padding-top: 2px;
        }

        .kop-logo img {
            width: 88px;
            height: auto;
            margin-left: -10px;
        }

        .kop-text {
            text-align: center;
            padding-right: 4px;
        }

        .kop-line {
            border-bottom: 2.25pt solid #000;
            margin-top: 5px;
            margin-bottom: 12px;
        }

        .kop h1,
        .kop h2,
        .kop h3,
        .kop p {
            margin: 0;
        }

        .kop h1 {
            font-size: 13pt;
            font-weight: 400;
            letter-spacing: 0.1px;
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
            font-size: 9pt;
        }

        .title {
            text-align: center;
            margin-bottom: 10px;
        }

        .title h4 {
            margin: 0;
            font-size: 11pt;
            text-decoration: underline;
            font-family: Helvetica, DejaVu Sans, sans-serif;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .title p {
            margin: 1px 0 0;
            font-weight: 700;
        }

        .lead {
            margin: 0 0 3px;
        }

        .detail-table {
            border-collapse: collapse;
            margin-bottom: 4px;
            margin-left: 56px;
        }

        .detail-table td {
            padding: 0;
            vertical-align: top;
        }

        .detail-table .label {
            width: 132px;
        }

        .detail-table .colon {
            width: 14px;
        }

        .paragraph {
            text-align: justify;
            margin: 8px 0;
        }

        .body-text {
            margin-left: 56px;
            margin-right: 6px;
        }

        .body-spacing {
            height: 5px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .signature-table td {
            vertical-align: top;
        }

        .signature-left {
            width: 49%;
        }

        .signature-right {
            width: 51%;
            text-align: center;
        }

        .signature-space {
            height: 76px;
        }

        .signature-name {
            text-decoration: underline;
            font-weight: 400;
        }

        .signature-line {
            margin: 0;
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
            <p>Nomor : <?= htmlspecialchars($nomor_surat, ENT_QUOTES, 'UTF-8') ?></p>
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

        <div class="body-spacing"></div>
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

        <div class="body-spacing"></div>
        <div class="body-text">
            <p class="paragraph"><?= htmlspecialchars($kalimat_surat, ENT_QUOTES, 'UTF-8') ?></p>
            <p class="paragraph">Demikian surat keterangan ini dibuat untuk digunakan seperlunya.</p>
        </div>

        <table class="signature-table">
            <tr>
                <td class="signature-left"></td>
                <td class="signature-right">
                    <p class="signature-line">Tomohon, <?= htmlspecialchars($tanggal_surat_indonesia, ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="signature-line">Kasubag Umum Perencanaan,</p>
                    <p class="signature-line">Kepegawaian &amp; Hukum</p>
                    <div class="signature-space"></div>
                    <p class="signature-line signature-name"><?= htmlspecialchars($penandatangan->nama, ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="signature-line"><?= htmlspecialchars($penandatangan->pangkat_terakhir ?: '-', ENT_QUOTES, 'UTF-8') ?></p>
                    <p class="signature-line">NIP. <?= htmlspecialchars($format_nip($penandatangan->nip), ENT_QUOTES, 'UTF-8') ?></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
