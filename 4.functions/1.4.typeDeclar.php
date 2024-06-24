<?php

declare(strict_types=1);

function getSum(int $x, int $y):int { // if not returning anything then use void similar to typescript
    return $x + $y;
};

// echo getsum(1,2); // fine
// echo getsum(1,"2"); // error

