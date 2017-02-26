<?php require('getPassword.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Password Generatore</title>
	<link rel="stylesheet" href="a2.css" type="text/css">
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<meta charset='utf-8'>

</head>
<body>
	<div class="container">
		<h1>Password Generator</h1>
		<div class='form'>
			<form method='GET' action='index.php'>
				<div class='NumOfWords'>
					<label>Number Of Characters (required)</label>
					<input type='text' name='numOfWords' required  id='NumOfWords'>
				</div>

				<div class='checkbox'>
					<h3>Main criteria</h3>
					<input type='checkbox' name='includeNumer'>
					<label>Include Number</label><br>

					<input type='checkbox' name='includeSymbols'>
					<label>Include Symboles</label><br>

					<input type='checkbox' name='excludeSimilar'>
					<label>Exclude Similar Characters e.g. (i, l, 1, L, o, 0, O)</label><br>

					<input type='checkbox' name='excludeAmbiguous'>
					<label>Exclude Ambiguous Characters e.g. ({ } [ ] ( ) / \ ' " ` ~ , ; : . )</label><br>
				</div>

				<div class="radio">
					<h3>Letter type </h3>
					<label><input type="radio" name="case" value="Lower">Lower case</label>
					<label><input type="radio" name="case" value="Upper">Upper case</label>
					<label><input type="radio" name="case" value="Mixed">Mixed</label>
				</div>

				<input type='submit' id='btn'>
				<br>
			</form>
		</div>
	</div>
			<?php if($errors): ?>
				<div class='alert alert-danger'>
					<ul>
						<?php foreach($errors as $error): ?>
							<li><?=$error?></li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php elseif($form->isSubmitted()): ?>
				<div class='alert alert-info'>Number of words : <?=$form->sanitize($length)?></div>
							<div class="result">
									<h2><?=$createdPassword?></h2>
							</div>
			<?php endif; ?>
	</body>
</html>
