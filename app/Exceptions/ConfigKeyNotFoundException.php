<?PHP

namespace app\Exceptions;

class ConfigKeyNotFoundException extends \Exception
{
    public function __construct(string $message, int $statusCode = 500, $previous = null)
    {
        parent::__construct($message, $statusCode, $previous);
    }
}
