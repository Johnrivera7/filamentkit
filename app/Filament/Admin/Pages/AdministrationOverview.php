<?php

declare(strict_types=1);

namespace App\Filament\Admin\Pages;

use App\Filament\Admin\Widgets\LatestAccessLogs;
use Awcodes\Overlook\Widgets\OverlookWidget;
use BackedEnum;
use Filafly\Icons\Phosphor\Enums\Phosphor;
use Filament\Pages\Page;
use UnitEnum;

final class AdministrationOverview extends Page
{
    protected static string|BackedEnum|null $navigationIcon = Phosphor::BriefcaseMetalDuotone;

    protected static string|UnitEnum|null $navigationGroup = 'Administration';

    protected static ?string $navigationLabel = 'Panel administrativo';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.admin.pages.administration-overview';

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

