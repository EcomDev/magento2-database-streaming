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

class InsertOnDuplicate
{
    /**
     * Generates INSERT ... ON DUPLICATE KEY UPDATE statement
     * It can be used in prepared statement generation
     *
     * @param list<string> $columns
     * @param list<string> $onUpdate
     */
    public function generate(string $tableName, array $columns, int $rowCount, array $onUpdate = []): string
    {
        $sqlOnUpdate = '';

        if ($onUpdate) {
            $sqlOnUpdate = sprintf(
                ' AS `new` ON DUPLICATE KEY UPDATE %s',
                implode(
                    ',',
                    array_map(static fn($column) => "`$column` = `new`.`$column`", $onUpdate)
                )
            );
        }

        $rowLine = rtrim(str_repeat('?,', count($columns)), ',');
        $rowLines = str_repeat(
            "($rowLine),",
            $rowCount
        );

        $sql = sprintf(
            'INSERT INTO `%s` (%s) VALUES %s%s',
            $tableName,
            implode(',', array_map(static fn($column) => "`$column`", $columns)),
            rtrim(
                $rowLines,
                ','
            ),
            $sqlOnUpdate
        );

        return $sql;
    }
}
