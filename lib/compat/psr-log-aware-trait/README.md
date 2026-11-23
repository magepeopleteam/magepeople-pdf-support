# mpdf/psr-log-aware-trait (bundled copy)

This folder replaces the Composer package `mpdf/psr-log-aware-trait` (see
`"replace"` and `"autoload"` in `../../composer.json`). The two source files are
the package's v3.0.0 files, unchanged (MIT licence, authors Mark Dorison and
Kristofer Widholm).

Why it is bundled instead of installed:

- To run on PHP 7.4 this plugin ships `psr/log` 1.1.4 (`psr/log` 2 and 3 use PHP 8
  union types and cannot even be parsed by PHP 7.4).
- With `psr/log` 1.x, Composer would install the trait's v2.0.0, whose
  `setLogger()` has no `: void` return type. WordPress loads `Psr\Log\*` only once
  per request, from whichever plugin's autoloader answers first. When another
  plugin ships `psr/log` 3, its `LoggerAwareInterface::setLogger(): void` would be
  incompatible with that v2 trait, and mPDF would fail with a fatal error.
- The v3 trait declares `setLogger(LoggerInterface $logger): void`. That is valid
  on PHP 7.1+ and compatible with `psr/log` 1, 2 and 3, so mPDF works whichever
  `psr/log` version a site ends up loading.

Do not remove this folder or the `"replace"` entry when updating dependencies.
