<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Game</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
	<!-- TODO: add a form for the user to play the game -->

	<div class="container-xl bg-[url('./image/bg.png')] bg-no-repeat bg-center bg-cover h-screen flex items-center justify-center">

		<div class="flex-1 max-w-md h-[400px] mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow-xl">
			<h4 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900">Translate Quiz</h4>
			<div class="flex justify-around mb-2 mt-9">
				<p class="text-xl font-bold tracking-tight text-gray-900">
					Hello: <?php if (isset($_SESSION['name'])) {
								echo $_SESSION['name'];
							} ?>
				</p>
				<p class=" text-md font-bold tracking-tight text-gray-900">
					Score: <?php if (isset($_SESSION['score'])) {
								echo $_SESSION['score'];
							} ?></p>
			</div>
			<p class="mb-2 mt-9 text-xl font-bold tracking-tight text-gray-900 text-center capitalize ">
				Word: <?php if (isset($_SESSION['word'])) {
							echo $_SESSION['word']; // French word
							// echo $_SESSION['word'][1]; // English word
						} ?></p>
			<form class="max-w-sm mx-auto mt-5" method="post" action="">
				<div class="mb-5">
					<input type="text" name="input_word" id="input_word" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="your answer" required />
				</div>
				<div class="flex justify-around">
					<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
					<a href="index.php?reset" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Reset</a>
				</div>
				<?php
				if ($_SESSION['message']) {
					echo "<p>" . $_SESSION['message'] . "</p>";
				}
				?>
			</form>
		</div>

		<?php if (!isset($_SESSION['name']) || $_SESSION['name'] == '') { ?>

			<div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
				<div class="relative p-4 w-full max-w-md max-h-full">
					<div class="relative bg-white rounded-lg shadow">
						<button type="button" id="model_close" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
							<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
							</svg>
							<span class="sr-only">Close modal</span>
						</button>
						<div class="p-4 md:p-5 text-center">
							<img src="./image/2791247.jpg" alt="welcome" class="mx-auto mb-4 text-gray-400 w-96 min-h-96">
							<h3 class="mb-3 text-lg font-normal text-gray-500">To Start</h3>
							<form action="" method="post" id="name_form">
								<input type="text" name="name" placeholder="Enter your name.." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
								<input type="submit" class="text-white mt-2 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" value="	Start ">
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>



		<?php if (isset($_SESSION['score']) && $_SESSION['score'] == 10) { ?>
			<div id="popup-modal" tabindex="-1" class="flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-100 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
				<div class="relative p-4 w-full max-w-md max-h-full">
					<div class="relative bg-white rounded-lg shadow">
						<button type="button" id="model_close" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
							<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
							</svg>
							<span class="sr-only">Close modal</span>
						</button>
						<div class="p-4 md:p-5 text-center">
							<img src="https://media.tenor.com/fAw8OmhI1WYAAAAi/game-over-game.gif" alt="">
							<h3 class="my-5 text-xl font-bold text-gray-500">Your Score: <?php echo $_SESSION['score'] ?></h3>
							<a href="index.php?reset" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center text-lg">Re-start</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

<script>
	document.getElementById('model_close').addEventListener('click', () => {
		document.getElementById('popup-modal').classList.add('hidden');
		document.getElementById('popup-modal').classList.remove('flex');
	});

	document.getElementById('name_form').addEventListener('submit', (e) => {
		e.preventDefault(); // Prevent the default form submission

		// Reference the popup modal and form
		const popupModal = document.getElementById('popup-modal');
		const form = document.getElementById('name_form');

		// Hide the popup modal by adding 'hidden' class and removing 'flex' class
		popupModal.classList.add('hidden');
		popupModal.classList.remove('flex');

		// Use a small timeout to ensure style changes are applied before submission
		setTimeout(() => {
			// Call the native submit method safely
			HTMLFormElement.prototype.submit.call(form);
		}, 0);
	});
</script>

<!-- <script>
	fetch('', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: 'update_movies=1'
		})
		.then(response => response.json())
		.then(data => {


		})
		.catch(error => {
			console.error('Error:', error);
		});
</script> -->

</html>