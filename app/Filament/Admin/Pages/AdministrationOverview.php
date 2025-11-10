<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\LatestAccessLogs;
use Awcodes\Overlook\Widgets\OverlookWidget;
use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Pages\Page;

final class AdministrationOverview extends Page
{
    protected static ?string $navigationIcon = Phosphor::BriefcaseMetalDuotone;

    protected static ?string $navigationGroup = 'Administration';

    protected static ?string $navigationLabel = 'Panel administrativo';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.admin.pages.administration-overview';

    protected function getHeaderWidgets(): array
    {
        return [
            OverlookWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            LatestAccessLogs::class,
        ];
    }
}

