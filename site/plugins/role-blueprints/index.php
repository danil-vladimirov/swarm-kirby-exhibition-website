<?php

use Kirby\Cms\App as Kirby;
use Kirby\Data\Data;

function swarmPortfolioMode(): bool
{
    return site()->portfolio_mode()->toBool();
}

Kirby::plugin('custom/programmable-blueprints', [
    'blueprints' => [
        'site' => function () {
            if (($user = kirby()->user()) && $user->isAdmin()) {
                $blueprint = Data::read(__DIR__ . '/blueprints/site.admin.yml');

                if (swarmPortfolioMode() === true) {
                    unset(
                        $blueprint['tabs']['pages']['columns'][1]['sections']['published_projects']['sortBy'],
                        $blueprint['tabs']['pages']['columns'][1]['sections']['drafts_projects']['sortBy']
                    );
                }

                return $blueprint;
            } else {
                return Data::read(__DIR__ . '/blueprints/site.user.yml');
            }
        },
        'pages/project' => function () {
            $blueprint = Data::read(__DIR__ . '/blueprints/pages.project.yml');

            if (swarmPortfolioMode() === true) {
                unset(
                    $blueprint['num'],
                    $blueprint['tabs']['content']['columns']['main']['sections']['info']['fields']['name'],
                    $blueprint['tabs']['content']['columns']['main']['sections']['info']['fields']['surname']
                );
            }

            return $blueprint;
        },
        'pages/works' => function () {
            $blueprint = Data::read(__DIR__ . '/blueprints/pages.works.yml');

            if (swarmPortfolioMode() === true) {
                unset($blueprint['tabs']['pages']['sections']['published']['sortBy']);
            }

            return $blueprint;
        },
    ]
]);
