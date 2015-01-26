# MaintenanceBundle
Bundle permettant le basculement sur une page de maintenance.

## Parametres

Il faut juste rajouter ces deux parametres dans le app/config/parameters.yml

            maintenance: true
            maintenance_limite: 17h45
            
- Le premier défini à ```TRUE``` signifie que le mode maintenance est activé.
- Le deuxieme est la date a laquelle le site 'devrait' a nouveau etre disponible.

Et bien sur il faut creer une vue qui se nomme app/Resources/views/maintenance.html.twig.

C'est tout, en modifiant le parametre maintenance (true/false) le site sera redirigé vers la vue automatiquement.

## A noter :

- Pensez a clear le cache une fois le mode maintenance enlevé.
- Le mode maintenance ne fonctionne pas en mode DEV ni en mode TEST

