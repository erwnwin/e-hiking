<?php
$nama = $this->session->userdata('nama'); // Gantilah dengan nama yang sesuai dengan session Anda
$foto = $this->session->userdata('foto'); // Asumsikan 'foto' menyimpan URL foto pengguna

// Mendapatkan inisial dari nama
$nama_parts = explode(' ', $nama);

if (count($nama_parts) > 1) {
    // Jika nama terdiri dari lebih dari satu kata, ambil huruf pertama dari setiap kata
    $inisial = strtoupper(substr($nama_parts[0], 0, 1) . substr($nama_parts[1], 0, 1));
} else {
    // Jika nama hanya satu kata, ambil dua huruf pertama dari kata tersebut
    $inisial = strtoupper(substr($nama_parts[0], 0, 2));
}

// $data['greeting'] = $greeting;
$data['foto'] = $foto;
$data['inisial'] = $inisial;

if (
    $this->session->userdata('hak_akses') == '4' || $this->session->userdata('hak_akses') == '1' || $this->session->userdata('hak_akses') == '2' || $this->session->userdata('hak_akses') == '3'
) {
    if (!empty($foto)) { ?>
        <img alt="avatar" src="<?= base_url() ?>public/img/erwin.png" class="rounded-circle" />
    <?php } else { ?>
        <div class="rounded-circle avatar-initialku text-white">
            <?php echo $inisial; ?>
        </div>
    <?php } ?>
<?php } ?>