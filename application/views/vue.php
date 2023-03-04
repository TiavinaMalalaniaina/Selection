<h1>Bonjour <?php echo $pseudo; ?></h1>
<p>Votre email est <?php echo $email; ?></p>
<p>
    <?php if($en_ligne): ?>
        Vous etes en ligne
    <?php else: ?>
        Vous n'etes pas en ligne
    <?php endif; ?>
</p>