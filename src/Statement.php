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
 * Represents a prepared statement that can be executed
 *
 * Statements are meant to be executed multiple times with different parameters.
 * It is advised to keep the statement open for multiple executions when possible.
 */
interface Statement
{
    /**
     * Executes command statement
     *
     * @param list<scalar> $parameters
     */
    public function executeCommand(array $parameters): CommandResult;

    /**
     * Executes query statement and returns result set
     *
     * @param list<scalar> $parameters
     */
    public function executeQuery(array $parameters): QueryResult;
}
