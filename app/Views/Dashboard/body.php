<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>INICIO</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link href="<?= base_url()?>/public/assets/css/home.css" rel="stylesheet">
	</head>
	<body class="is-preload">
		<div id="wrapper">
			<div id="bg"></div>
			<!-- <div id="overlay"></div> -->
			<div id="main">
				<!-- Header -->
					<header id="header">
						<h1>SISTEMA PARA EL CONTROL DE ASISTENCIAS</h1>
						<p>Administra &nbsp;&bull;&nbsp; Registra &nbsp;&bull;&nbsp; Optimiza</p>
                        <nav>
                            <ul>
                                <li><a href="#"><span class="label">link 1</span></a></li>
                                <li><a href="#"><span class="label">link 2</span></a></li>
                                <li><a href="#"><span class="label">link 3</span></a></li>
                            </ul>
                        </nav>
					</header>
				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">&copy;PRACTICAS 2024</span>
					</footer>
			</div>
		</div>
		<script>
			window.onload = function() { document.body.classList.remove('is-preload'); }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>