<?php

namespace App\Command;

use App\Service\PlanetService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SyncPlanetsCommand extends Command
{
    protected static $defaultName = 'app:sync-planets';
    protected static $defaultDescription = 'Synchronise les données des planètes depuis l’API externe';

    private PlanetService $planetService;

    public function __construct(PlanetService $planetService)
    {
        parent::__construct();
        $this->planetService = $planetService;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Début de la synchronisation des planètes...</info>');

        try {
            $totalPlanets = count($this->planetService->fetchPlanets());

            $progressBar = new ProgressBar($output, $totalPlanets);
            $progressBar->start();

            $result = $this->planetService->updatePlanetsFromApi(function () use ($progressBar) {
                $progressBar->advance();
            });

            $progressBar->finish();
            $output->writeln('');
            $output->writeln('');

            $output->writeln('<comment>Résultat :</comment>');
            $output->writeln('Updates : ' . $result['updates']);
            $output->writeln('Skipped : ' . $result['skipped']);

            if (!empty($result['updated_planets'])) {
                $output->writeln('');
                $output->writeln('<info>Détails des mises à jour :</info>');

                foreach ($result['updated_planets'] as $planet) {
                    $fields = implode(', ', $planet['updated_fields']);
                    $output->writeln('- ' . $planet['name'] . ' → ' . $fields);
                }
            }

            $output->writeln('');
            $output->writeln('<info>✅ Synchronisation terminée</info>');

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->writeln('');
            $output->writeln('<error>❌ Erreur lors de la synchronisation :</error>');
            $output->writeln($e->getMessage());

            return Command::FAILURE;
        }
    }
}