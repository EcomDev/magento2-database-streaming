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

use PDOStatement;

interface CommandResult
{
    public function affectedRows(): int;

    public function lastInsertId(): ?int;
}
