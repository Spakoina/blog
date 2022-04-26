<?php

function studly(string $value): string {
    return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
}
