<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bootstrap Example</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style>
		.btn-group {
			margin-bottom: 10px;
		}

		.card {
			margin-bottom: 50px;
		}
	</style>
</head>
<body>
	<!-- Навигационное меню -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#">Logo</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Jumbotron -->
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-4">Welcome to our website</h1>
			<p class="lead">This is a simple example of a Jumbotron in Bootstrap.</p>
			<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
		</div>
	</div>

	<!-- Контент страницы -->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2>Column 1</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies libero ac turpis auctor, et interdum massa efficitur. Fusce sollicitudin, mauris a faucibus ultrices, nisl velit faucibus enim, at varius tellus neque eu orci. </p>
			</div>
			<div class="col-md-6">
				<h2>Column 2</h2>
				<p>Phasellus eu felis at diam commodo semper. Mauris cursus erat non hendrerit consectetur. Integer ut tristique lacus. Fusce eget mi in felis finibus elementum et eu odio. </p>
			</div>
		</div>
	</div>

	<!-- Карточки -->
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img src="image1.jpg" class="card-img-top" alt="Card Image 1">
					<div class="card-body">
						<h5 class="card-title">Card 1</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img src="image2.jpg" class="card-img-top" alt="Card Image 2">
					<div class="card-body">
						<h5 class="card-title">Card 2</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
					<img src="image3.jpg" class="card-img-top" alt="Card Image 3">
					<div class="card-body">
						<h5 class="card-title">Card 3</h5>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<a href="#" class="btn btn-primary">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Модальное окно -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Заголовок модального окна -->
				<div class="modal-header">
					<h5 class="modal-title">Modal Title</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Тело модального окна -->
				<div class="modal-body">
					<p>This is the modal body text.</p>
				</div>
				<!-- Подвал модального окна -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save Changes</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Кнопки -->
	<div class="container">     
		<div class="row">
			<!-- Кнопка для открытия модального окна -->
			<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#myModal">Open Modal</button>
			<button type="button" class="btn btn-secondary mr-2">Secondary Button</button>
			<button type="button" class="btn btn-success mr-2">Success Button</button>
			<button type="button" class="btn btn-danger mr-2">Danger Button</button>
			<button type="button" class="btn btn-dark">Dark Button</button>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
