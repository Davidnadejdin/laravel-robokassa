<?

namespace Davidnadejdin\LaravelRobokassa;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Idma\Robokassa\Payment createPayment(mixed $invoiceId, mixed $amount, string $description)
 * @method static bool validateResult(array $data, mixed $sum)
 * @method static bool validateSuccess(array $data, mixed $sum)
 *
 * @see \Davidnadejdin\LaravelRobokassa\LaravelRobokassaClass
 */
class Robokassa extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelrobokassa';
    }
}