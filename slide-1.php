<?php

$rbio = [
  'Nama' => 'Iin, S.T., M.Kom',
  'TTL' => 'Sumedang, 1 Juni 1987',
  'Alamat' => 'Kecamatan Ciwaringin Kab Cirebon',
  'Pendidikan' => 'S2 Rekayasa Sistem Informasi',
  'Whatsapp' => '087123456789',
  'Email' => 'info@kangsolihin.web.id',
  'Jobs' => 'Web Developer, Dosen, IT Trainer',
];

$tr = '';
foreach ($rbio as $k => $v) {
  $tr .= "
    <tr>
      <td class=kanan><b>$k</b></td>
      <td>:</td>
      <td>$v</td>
    </tr>
  ";
}


$konten = "
<div>
  <h1>Biodata Pribadi</h1>
  <div class='flex gap4'>
    <div>
      <table class='table table-striped table-hover'>
        $tr
      </table>
    </div>
    <div class='pl4 ml4'>
      <img src=img/iin.jpg class=profil>
    </div>
  </div>
  <div class=tengah>👉 <a href='https://kangsolihin.web.id'>kangsolihin.web.id</a></div>
</div>

";
