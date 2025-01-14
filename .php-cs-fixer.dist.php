<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__) // Répertoire du code source
    ->exclude('var') // Exclut le répertoire var
    ->exclude('vendor')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new Config();

return $config
    ->setRiskyAllowed(true) // Permet certaines règles dites "risquées"
    ->setRules([
        '@Symfony' => true, // Suit les standards Symfony
        '@PSR12' => true, // Suit également PSR-12
        'array_syntax' => ['syntax' => 'short'], // Utilise la syntaxe courte des tableaux
        'concat_space' => ['spacing' => 'one'], // Ajoute un espace autour de l'opérateur de concaténation
        'declare_strict_types' => true, // Active strict_types pour un code plus sûr
        'ordered_imports' => ['sort_algorithm' => 'alpha'], // Trie les imports par ordre alphabétique
        'phpdoc_align' => ['align' => 'left'], // Aligne la PHPDoc
        'phpdoc_summary' => false, // Désactive la nécessité d'avoir un résumé dans la PHPDoc
        'yoda_style' => false, // Désactive le style Yoda
        'no_unused_imports' => true, // Supprime les imports inutilisés
        'single_quote' => true, // Utilise des guillemets simples par défaut
        'trailing_comma_in_multiline' => ['elements' => ['arrays']], // Ajoute une virgule finale pour les tableaux multi-lignes
    ])
    ->setFinder($finder);
