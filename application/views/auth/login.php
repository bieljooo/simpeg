<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SIMPEG DPMPTSPD</title>

    <script>
        (function () {
            try {
                if (localStorage.getItem('simpeg-theme') === 'dark') {
                    document.documentElement.classList.add('theme-dark');
                }
            } catch (error) {}
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/simpeg-shell.css') ?>">
    <script src="https://code.iconify.design/iconify-icon/2.2.0/iconify-icon.min.js"></script>
</head>

<body class="auth-screen">

    <button type="button" class="theme-toggle auth-theme-toggle" data-theme-toggle aria-pressed="false">
        <span class="theme-toggle-label">
            <iconify-icon icon="mdi:weather-night" data-theme-toggle-icon></iconify-icon>
            <span data-theme-toggle-text>Dark Mode</span>
        </span>
        <span class="theme-toggle-switch">
            <span class="theme-toggle-thumb"></span>
        </span>
    </button>

    <div class="auth-shell">
        <section class="auth-showcase">
            <div>
                <span class="auth-kicker">Sistem Informasi Kepegawaian</span>
                <div class="auth-brand">
                    <div class="auth-brand-logo">
                        <img src="<?= base_url('assets/images/logo-tomohon.png') ?>" alt="Logo Kota Tomohon">
                    </div>
                    <div class="auth-brand-copy">
                        <h1>SIMPEG DPMPTSPD</h1>
                        <p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Daerah Kota Tomohon.</p>
                    </div>
                </div>

                <div class="auth-highlight-grid">
                    <div class="auth-highlight">
                        <iconify-icon icon="mdi:view-dashboard-outline"></iconify-icon>
                        <strong>Dashboard modern</strong>
                        <span>Sidebar, navbar, dan struktur visual kini satu bahasa desain yang lebih rapi dan profesional.</span>
                    </div>
                    <div class="auth-highlight">
                        <iconify-icon icon="mdi:theme-light-dark"></iconify-icon>
                        <strong>Light &amp; dark mode</strong>
                        <span>Tema bisa diganti kapan saja dan pilihan tampilannya akan tetap tersimpan di browser.</span>
                    </div>
                    <div class="auth-highlight">
                        <iconify-icon icon="mdi:shield-account-outline"></iconify-icon>
                        <strong>Akses per role</strong>
                        <span>Pegawai, petugas, dan kasubag tetap menggunakan struktur hak akses yang sudah berjalan.</span>
                    </div>
                    <div class="auth-highlight">
                        <iconify-icon icon="mdi:file-document-outline"></iconify-icon>
                        <strong>Pengelolaan surat</strong>
                        <span>Fitur surat sakit dan rekomendasi tetap berada dalam alur yang sama dengan tampilan yang lebih segar.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="auth-card">
            <div class="auth-card-header">
                <h2>Masuk ke sistem</h2>
                <p>Gunakan NIP atau username yang terdaftar untuk mengakses dashboard sesuai role Anda.</p>
            </div>

            <form action="<?= site_url('auth/login') ?>" method="POST" class="auth-form">
                <div class="form-group">
                    <label><iconify-icon icon="mdi:card-account-details-outline" class="mr-1"></iconify-icon> NIP / Username</label>
                    <input type="text" name="nip" class="form-control" placeholder="Masukkan NIP atau Username" required autofocus>
                </div>
                <div class="form-group">
                    <label><iconify-icon icon="mdi:lock-outline" class="mr-1"></iconify-icon> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                <button type="submit" class="btn btn-primary auth-submit">
                    <iconify-icon icon="mdi:login-variant"></iconify-icon>
                    <span>Masuk</span>
                </button>
            </form>

            <div class="auth-footer-note">Akses hanya untuk akun resmi internal DPMPTSPD Kota Tomohon.</div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets/js/simpeg-shell.js') ?>"></script>
    <script>
    <?php
    $login_flash_notifications = array(
        'success' => array('icon' => 'success', 'title' => 'Berhasil!'),
        'error' => array('icon' => 'error', 'title' => 'Login Gagal'),
        'warning' => array('icon' => 'warning', 'title' => 'Perhatian!'),
        'info' => array('icon' => 'info', 'title' => 'Informasi'),
    );
    foreach ($login_flash_notifications as $flash_key => $flash_config):
        if (!$this->session->flashdata($flash_key)) {
            continue;
        }
    ?>
        Swal.fire({
            icon: '<?= $flash_config['icon'] ?>',
            title: '<?= $flash_config['title'] ?>',
            text: '<?= $this->session->flashdata($flash_key) ?>',
            showConfirmButton: true
        });
    <?php endforeach; ?>
    </script>

</body>

</html>
