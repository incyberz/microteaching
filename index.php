<script>
  location.replace("tmp/");
  return;
</script>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Microteaching 20 Menit</title>
  <!-- <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" /> -->
  <link
    href="../assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <style>
    .stage-active {
      font-weight: bold;
      color: #fff;
      background-color: #0d6efd;
      border-radius: 5px;
      padding: 4px 8px;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-4">
    <h3 class="text-center mb-4">Simulasi Microteaching 20 Menit</h3>

    <div class="card shadow">
      <div class="card-body text-center">
        <h1 id="timer" class="display-4">00:00</h1>
        <p>
          Posisi Saat Ini:
          <span id="current-stage" class="stage-active">Belum Dimulai</span>
        </p>
        <p id="stage-description">
          Klik tombol mulai untuk memulai simulasi.
        </p>
        <button id="startBtn" class="btn btn-success">▶️ Mulai</button>
        <button id="resetBtn" class="btn btn-secondary ms-2">🔁 Reset</button>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/jquery/jquery-3.7.1.min.js"></script>
  <script>
    $(function() {
      let totalSeconds = 0;
      let timerInterval;

      const stages = [{
          start: 0,
          end: 180,
          name: "Appersepsi",
          desc: "Berikan pertanyaan pemantik, sambungkan dengan pengetahuan awal peserta.",
        },
        {
          start: 181,
          end: 600,
          name: "Penjelasan Materi",
          desc: "Jelaskan tujuan, konsep dasar UI, struktur HTML & CSS sederhana.",
        },
        {
          start: 601,
          end: 1020,
          name: "Praktikum",
          desc: "Arahkan peserta membuat halaman HTML sesuai instruksi, pantau prosesnya.",
        },
        {
          start: 1021,
          end: 1200,
          name: "Evaluasi",
          desc: "Berikan pertanyaan lisan dan instruksi kirim screenshot ke grup.",
        },
      ];

      function formatTime(seconds) {
        const min = String(Math.floor(seconds / 60)).padStart(2, "0");
        const sec = String(seconds % 60).padStart(2, "0");
        return `${min}:${sec}`;
      }

      function getCurrentStage(seconds) {
        for (let s of stages) {
          if (seconds >= s.start && seconds <= s.end) return s;
        }
        return {
          name: "Selesai",
          desc: "Microteaching telah berakhir."
        };
      }

      function updateDisplay() {
        $("#timer").text(formatTime(totalSeconds));
        const stage = getCurrentStage(totalSeconds);
        $("#current-stage").text(stage.name);
        $("#stage-description").text(stage.desc);
      }

      $("#startBtn").click(function() {
        if (timerInterval) return; // prevent multiple intervals
        timerInterval = setInterval(() => {
          totalSeconds++;
          updateDisplay();
          if (totalSeconds >= 1200) clearInterval(timerInterval);
        }, 1000);
      });

      $("#resetBtn").click(function() {
        clearInterval(timerInterval);
        timerInterval = null;
        totalSeconds = 0;
        $("#timer").text("00:00");
        $("#current-stage").text("Belum Dimulai");
        $("#stage-description").text(
          "Klik tombol mulai untuk memulai simulasi."
        );
      });
    });
  </script>
</body>

</html>