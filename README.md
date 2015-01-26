# MaintenanceBundle
Bundle permettant lasculement sur une page de maintenance.

## Parametres

Il faut juste rajouter ces deux lignes dans le app/config/parameters.yml

            maintenance: true
            maintenance_limite: 16h30

Et bien sur il faut creer une vue qui se nomme app/Resources/views/maintenance.html.twig.

C'est tout, en modifiant le parametre maintenance (true/false) le site sera redirigé vers la vue automatiquement.

## A noter :

- Pensez a clear le cache une fois le mode maintenance enlevé.
- Le mode maintenance ne fonctionne pas en mode DEV ni en mode TEST

