<main id="main" class="main">

<div class="pagetitle">
  <h1>Usuario</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">
          <button id="prenderCamara" class="btn btn-primary">Prender Cámara</button>
          <button id="apagarCamara" class="btn btn-danger" style="display:none;">Apagar Cámara</button>
      </div>
      <div class="row mt-3 justify-content-center">
          <video id="video" width="640" height="480" autoplay style="border: 1px solid #ddd;"></video>
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>
</main><!-- End #main -->
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const video = document.getElementById('video');
        const prenderCamaraButton = document.getElementById('prenderCamara');
        const apagarCamaraButton = document.getElementById('apagarCamara');
        let mediaStream;

        prenderCamaraButton.addEventListener('click', prenderCamara);
        apagarCamaraButton.addEventListener('click', apagarCamara);

        function prenderCamara() {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: true })
                    .then(function (stream) {
                        video.srcObject = stream;
                        mediaStream = stream;

                        prenderCamaraButton.style.display = 'none';
                        apagarCamaraButton.style.display = 'inline';

                        // Registro en consola
                        console.log('Cámara encendida - Fecha y hora:', obtenerFechaYHora());
                    })
                    .catch(handleError);
            } else {
                console.error('La API de MediaDevices no es compatible con este navegador.');
            }
        }

        function apagarCamara() {
            if (mediaStream) {
                const tracks = mediaStream.getTracks();
                tracks.forEach(track => track.stop());
                video.srcObject = null;

                prenderCamaraButton.style.display = 'inline';
                apagarCamaraButton.style.display = 'none';

                // Registro en consola
                console.log('Cámara apagada - Fecha y hora:', obtenerFechaYHora());
            }
        }

        function handleError(error) {
            console.error('Error al acceder a la cámara:', error);
        }

        function obtenerFechaYHora() {
            const fechaHoraActual = new Date();
            return fechaHoraActual.toLocaleString();
        }
    });
</script>