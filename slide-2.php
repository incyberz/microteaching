<style>
  .tidak_hadir {
    color: black;
    opacity: 30%;
  }
</style>
<?php

$rpeserta = [
  'imam' => '',
  'whisnu' => '',
  'salim' => '',
  'fiqri' => '',
];

$div = '';
foreach ($rpeserta as $k => $v) {
  $div .= "
    <div >
      <div>
        <img src=img/$k.jpg class='profil tidak_hadir'>
      </div>
      <div class='tengah proper tidak_hadir'>$k</div>
    </div>
  ";
}


$konten = "
<div>
  <h1>Presensi</h1>
  <div class='flex gap4'>
    <div>
      <div class='flexy gap4'>
        $div
      </div>
    </div>
  </div>
</div>

";
