<?php

namespace Memorasrl\Anvil\Traits;

use App\Enums\TokenType;
use InvalidArgumentException;

trait CanIssueToken {
    /**
     * Issue a token of a given type.
     *
     * @throws InvalidArgumentException
     */
    public function issueToken(TokenType $type): string {
        // retrieve token type configuration
        $token = config("api.tokens.{$type->value}");

        // check if the token type exists
        if (! $token) {
            throw new InvalidArgumentException('The given token type does not exist. Configure it in config/api.php if you intend to use it.');
        }

        // issue the token with custom expiration
        return $this->createToken($token['name'], $token['abilities'], now()->addMinutes($token['expiration']))
            ->plainTextToken;
    }
}
