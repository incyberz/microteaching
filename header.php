<style>
  header {
    position: sticky;
    top: 0;
    height: 12vh;
    left: 0;
    right: 0;
    background: #FBD4B4;
    text-align: center;
    font-weight: bold;
  }

  header nav {
    font-size: 18px;
    position: sticky;
    top: 0;
    /* background: red; */
    transform: translateY(-25px);
  }

  header nav ul {
    display: flex;
    gap: 5px;
    justify-content: center;
    padding: 10px;
  }

  header nav ul li {
    list-style: none;
    padding: 20px 15px 5px 15px;
    background: linear-gradient(white, #aaa);
    border-radius: 5px;
    cursor: pointer;
    transition: .5s;
    box-shadow: 0 0 3px gray;
    color: #555
  }

  header nav ul .li-materi {
    background: linear-gradient(white, #cff);
  }

  header nav ul li:hover {
    list-style: none;
    background: linear-gradient(#f5f, #a4a);
    color: white;
  }

  .nav-active {
    background: linear-gradient(#88f, blue) !important;
    color: white;
  }

  #judul {
    transform: translateY(-45px);
    font-size: 35px;
    /* background: red; */

  }

  #timer {
    position: absolute;
    bottom: 10px;
    left: 10px;
    display: flex;
    gap: 5px;
    /* background: red; */
    font-weight: normal;
    font-size: 40px;
    font-family: consolas, 'Courier New', Courier, monospace;
    padding-right: 15px;
    border-right: solid 2px #333;
  }

  #progress {
    position: absolute;
    bottom: 0;
    height: 5px;
    background: blue;
    width: 37%;
  }
</style>
<header>
  <nav>
    <ul>
      <?php
      $rnav = [
        1 => [
          'nama' => 'Kenalan',
          'judul' => 'Siapa nih yg lagi bicara?',
        ],
        2 => [
          'nama' => 'Presensi',
          'judul' => 'Semangat Pagi!! Siapa yang tidak hadir ??',
        ],
        3 => [
          'nama' => 'Apersepsi',
          'judul' => 'ZZZ',
        ],
        4 => [
          'nama' => 'Judul',
          'judul' => 'Apa yang akan kita bahas?',
          'jenis' => 'materi',
        ],
        5 => [
          'nama' => 'Tujuan',
          'judul' => 'Tujuan dan Manfaat',
          'jenis' => 'materi',
        ],
        6 => [
          'nama' => 'Komponen UI',
          'judul' => 'Apa saja Komponen UI untuk Website?',
          'jenis' => 'materi',
        ],
        7 => [
          'nama' => 'Styling UI',
          'judul' => 'Bagaimana cara menambahkan Style pada UI?',
          'jenis' => 'materi',
        ],
        8 => [
          'nama' => 'Testing UI',
          'judul' => 'Bagaimana cara Testing UI yang benar?',
          'jenis' => 'materi',
        ],
        9 => [
          'nama' => 'Kesimpulan',
          'judul' => 'Kesimpulan.',
          'jenis' => 'materi',
        ],
        10 => [
          'nama' => 'Soal',
          'judul' => 'Seberapa Anda faham materi hari ini?',
        ],
        11 => [
          'nama' => 'Exam',
          'judul' => 'Exam Time !!',
        ],
        12 => [
          'nama' => 'Homework',
          'judul' => 'Practice Makes Perfect!!',
        ],
      ];

      foreach ($rnav as $no => $rv) {
        $hide = $no == $nomor_slide ? '' : 'hide';
        $nav_active = $no == $nomor_slide ? 'nav-active' : '';
        $jenis = $rv['jenis'] ?? '';
        echo "
          <li class='$nav_active li-$jenis li-nav' id=li-nav--$no>
            $no
            <span class='span-nav $hide' id='span-nav--$no'> - $rv[nama]</span>
            <span class='hide' id='judul--$no'>$rv[judul]</span>
          </li>
        ";

        $konten = "Belum ada konten untuk Slide-$no";
        $file = "slide-$no.php";
        if (file_exists($file)) include $file;
        $kontens .= "
          <div class='konten $hide' id=konten--$no>
            $konten
          </div>
        ";
      }




      ?>
    </ul>
  </nav>
  <p id=judul><?= $rnav[$nomor_slide]['judul'] ?></p>

  <div id="timer">
    <div id=mnt>00</div>
    <div>:</div>
    <div id=dtk>00</div>
  </div>

  <div id="progress"></div>


</header>

<script>
  $(function() {
    const maxTime = 1200;
    let time = maxTime;
    let persenProgres = 0;

    const timer = () => {
      let dtk = time % 60;
      dtk = dtk < 10 ? '0' + dtk : dtk;
      let mnt = Math.floor(time / 60);
      persenProgres = (Math.round(10000 * maxTime / time) / 100) - 100;

      $('#dtk').text(dtk);
      $('#mnt').text(mnt);
      $('#progress').prop('style', `width:${persenProgres}%`);
      time--;

    }

    setInterval(() => {
      timer();
    }, 1000);


    $('.li-nav').click(function() {
      let tid = $(this).prop('id');
      let rid = tid.split('--');
      let aksi = rid[0];
      let id = rid[1];
      console.log(aksi, id);

      $('.span-nav').hide();
      $('#span-nav--' + id).fadeIn();

      $('.li-nav').removeClass('nav-active');
      $('#li-nav--' + id).addClass('nav-active');

      $('#judul').hide();
      $('#judul').text($('#judul--' + id).text());
      $('#judul').fadeIn();

      $('.konten').hide();
      $('#konten--' + id).fadeIn();

      $.ajax({
        url: `set_nomor_slide.php?nomor_slide=${id}`,
        success: function(a) {
          console.log(a);

        }
      })

    })
  })
</script>