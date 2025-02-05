<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<title><?= $site->title()->html() ?> | Create account</title>
		<meta name="description" content="<?= $site->description()->html() ?>">
		<meta name="keywords" content="<?= $site->keywords()->html() ?>">

		<?= css('assets/css/styles.css') ?>

	</head>

	<body class="max-w-2xl pt-12 px-4 bg-black text-white mx-auto">
		<main class="pb-1" role="main">

		<h1 class="text-center text-4xl"><?= $site->title()->html() ?></h1>
		<h2 class="text-center text-4xl text-gray-400">Sign up</h2>

			<?php if($success): ?>
			<div class="text-center text-xl mt-8">
				<p class="bg-green-500 p-4 text-black"><?= $success ?></p>
				<p class="pt-4 text-white">Go to <a class="underline" href="/panel/login">login page</a> and use your email/password to enter the panel</p>
			</div>
			<?php else: ?>

			<?php if (count($errors) > 0): ?>
			<div class="text-center text-xl mt-8 bg-red-500 text-black p-4">
				<?php foreach ($errors as $message): ?>
					<p class=""><?= kirbytext($message) ?></p>
				<?php endforeach ?>
			</div>
			<?php endif ?>

				<?php if ($site->registration_toggle()->toBool() === true): ?>

				<form method="post" class="text-lg mt-8" action="<?= $page->url() ?>">
					<input type="hidden" name="csrf" value="<?= csrf() ?>">

					<div class="w-full inline-block relative mb-6">
						<label class="block pb-1" for="email">Email <abbr title="required" class="text-red-500 no-underline">•</abbr></label>
						<input class="relative w-full text-black p-2 border-2 border-gray-400 bg-none appearance-none" type="email" id="email" name="email" value="<?= esc($data['email'] ?? '', 'attr') ?>" placeholder="your@email.com" required>
					</div>

					<div class="w-full inline-block relative mb-4">
						<label class="block pb-1" for="password">Password <abbr title="required" class="text-red-500 no-underline">•</abbr></label>
						<input class="relative w-full text-black p-2 border-2 border-gray-400 bg-none appearance-none" type="password" id="password" name="password" required>
						<small class="block text-gray-400">Minimum 8 characters</small>
					</div>

					<div class="w-full inline-block relative mb-6">
						<label class="block pb-1" for="validate">Retype your password <abbr title="required" class="text-red-500 no-underline">•</abbr></label>
						<input class="relative w-full text-black p-2 border-2 border-gray-400 bg-none appearance-none" type="password" id="validate" name="validate" required>
					</div>

					<div class="w-full inline-block relative mb-6 hidden">
						<label class="block pb-1" for="website">Website</label>
						<input class="relative w-full text-black p-2 border-2 border-gray-400 bg-none appearance-none" type="text" id="website" name="website">
					</div>
				
					<div class="grid grid-cols-2 gap-x-2 mt-8">
						<button class="px-6 py-4 border-2 border-gray" type="submit" name="register" value="Register">Create</button>
						<p class="place-self-center"><abbr title="required" class="text-red-500 no-underline">•</abbr> Required fields</p>
					</div>
				</form>

				<?php else: ?>
				<div class="text-center text-xl mt-8">
					<p class="bg-gray-500 p-4 text-black">Registration is turned off at the moment.</p>
				</div>
				<?php endif ?>

			<?php endif ?>

		</main>

	</body>
</html>