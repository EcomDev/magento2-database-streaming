<?php

/**
 * Copyright (c) 2026 EcomDev B.V.
 *
 * This file is dual-licensed under:
 * 1. GNU General Public License v3.0 (GPL-3.0-or-later) - see LICENSE
 * 2. Commercial License - see COMMERCIAL-LICENSE.md
 *
 * SPDX-License-Identifier: GPL-3.0-or-later OR LicenseRef-Commercial
 */

declare(strict_types=1);

namespace EcomDev\DatabaseStreaming\SqlGenerator;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InsertOnDuplicateTest extends TestCase
{
    private InsertOnDuplicate $insertOnDuplicate;

    public function setUp(): void
    {
        $this->insertOnDuplicate = new InsertOnDuplicate();
    }

    #[Test]
    public function generatesSimpleInsert()
    {
        $this->assertEquals(
            'INSERT INTO `catalog_product_entity` (`sku`) VALUES (?),(?)',
            $this->insertOnDuplicate->generate(
                'catalog_product_entity',
                ['sku'],
                2
            )
        );
    }

    #[Test]
    public function generatesInsertOnDuplicate()
    {
        $this->assertEquals(
            'INSERT INTO `catalog_product_entity` (`sku`,`type_id`)'
            . ' VALUES (?,?),(?,?),(?,?),(?,?) AS `new` ON DUPLICATE KEY UPDATE `type_id` = `new`.`type_id`',
            $this->insertOnDuplicate->generate(
                'catalog_product_entity',
                ['sku', 'type_id'],
                4,
                ['type_id']
            )
        );
    }
}
