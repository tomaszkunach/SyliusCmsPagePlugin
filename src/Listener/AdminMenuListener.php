<?php

/*
 * This file is part of Monsieur Biz' Cms Page plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusCmsPagePlugin\Listener;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItem(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        if (!$content = $menu->getChild('monsieurbiz_cms')) {
            $content = $menu
                ->addChild('monsieurbiz_cms')
                ->setLabel('monsieurbiz_cms_page.ui.cms_content')
                ->setLabelAttribute('icon', 'tabler:file')
            ;
        }

        $content->addChild('monsieurbiz_cms_page', ['route' => 'monsieurbiz_cms_page_admin_page_index'])
            ->setLabel('monsieurbiz_cms_page.ui.pages')
            ->setLabelAttribute('icon', 'tabler:file')
        ;
    }
}
