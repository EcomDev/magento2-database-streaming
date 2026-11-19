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

namespace EcomDev\DatabaseStreaming;

/**
 * Represents the result of a database query
 */
interface QueryResult
{
    /**
     * Fetches a row from the result set as a list
     *
     * @return list<scalar>|false
     */
    public function fetchRow(): array|false;

    /**
     * Fetches a row from the result set as an associative array
     *
     * @return array<string,scalar>|false
     */
    public function fetchAssoc(): array|false;

    /**
     * Returns a single column from the result set
     *
     * @param int $column
     *
     * @return scalar|null
     */
    public function fetch(int $column): mixed;
}
