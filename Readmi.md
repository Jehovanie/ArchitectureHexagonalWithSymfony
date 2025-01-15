Template:
https://github.com/StartBootstrap/startbootstrap-shop-homepage/tree/master

L'architecture hexagonale repose sur 3 concepts principaux :

Le cœur de l'application (Domain) : Contient toute la logique métier. Il est indépendant de toute technologie.
Les ports : Interfaces définies pour interagir avec le cœur de l'application.
Les adaptateurs : Implémentations concrètes qui permettent de connecter le cœur de l'application au monde extérieur (base de données, API, interface utilisateur...).

src/
├── Application/         # Cas d'utilisation (Use Cases)
│   └── Service/         # Services qui orchestrent la logique métier
├── Domain/              # Logique métier
│   ├── Model/           # Entités métier
│   ├── Repository/      # Interfaces des repositories
│   └── Exception/       # Exceptions spécifiques au domaine
├── Infrastructure/      # Adaptateurs techniques (base de données, API, etc.)
│   ├── Repository/      # Implémentation des repositories
│   ├── Controller/      # Adaptateurs web (API, etc.)
│   └── Service/         # Services techniques
