<?php
$titrePage = 'Catalogue';
$activites = require __DIR__ . '/../src/donnees/demo.php';
// Étape 1 : remplacer ce tableau de démonstration par les résultats d’une requête PDO.
require __DIR__ . '/../src/inclusions/entete.php';
?>
<main class="container py-5">
    <h1>Catalogue des activités</h1>
    <p class="text-secondary">Données de démonstration</p>
    <div class="catalogue row g-3">
        <?php foreach ($activites as $activite): ?>
            <article class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="h5"><?= htmlspecialchars($activite['titre'], ENT_QUOTES, 'UTF-8') ?></h2>
                        <p><?= htmlspecialchars($activite['description'], ENT_QUOTES, 'UTF-8') ?></p>
                        <p class="mb-0"><strong><?= date('d/m/Y à H\hi', strtotime($activite['date_activite'])) ?></strong></p>
                        <p class="mb-0"><?= htmlspecialchars($activite['lieu'], ENT_QUOTES, 'UTF-8') ?> · <?= (int) $activite['capacite'] ?> places</p>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</main>
<?php require __DIR__ . '/../src/inclusions/pied.php'; ?>
